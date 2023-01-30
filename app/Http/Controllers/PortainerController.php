<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PortainerController extends Controller
{
    public function createWPContainer(User $user)
    {
        $credentials = $this->createMySQLDatabase();
        if ($credentials) {
            $jwt = $this->getToken();
            $name = Str::lower(Str::random(8));
            $url = $name . ".kubectl.bluudigital.com";
            $cont = Http::withToken($jwt)->post(env('PORTAINER_URL') . '/api/endpoints/2/docker/containers/create?name=' . $name, [
                'Image' => 'wordpress',
                'Env' => [
                    "WORDPRESS_CONFIG_EXTRA=define('FORCE_SSL_ADMIN', true);",
                    "WORDPRESS_DB_HOST=65.108.95.193:6666",
                    "WORDPRESS_DB_USER=" . $credentials[0],
                    "WORDPRESS_DB_PASSWORD=" . $credentials[1],
                    "WORDPRESS_DB_NAME=" . $credentials[2],
                    "VIRTUAL_HOST=" . $url,
                    "LETSENCRYPT_HOST=" . $url
                ],
            ]);
            $cont_body = json_decode($cont->body());
            echo $cont_body;
            if($cont_body->Id !== null){
                Http::withToken($jwt)->post(env('PORTAINER_URL') . '/api/endpoints/2/docker/containers/' . $cont_body->Id . '/start');
                $this->installCli($cont_body->Id);
                $this->installWoo($cont_body->Id, $url);
            } else {
                // retry
            }


            // Save site: url, container_id, credentials
            $site = new Site();
            $site->fill([
                'name' => $name,
                'container_id' => $cont_body->Id,
                'db_user' => $credentials[0],
                'db_password' => $credentials[1],
                'db_name' => $credentials[2],
                'user_id' => $user->id
            ]);
            $site->saveQuietly();

            $user->site_url = "https://" . $url . "/wp-json/rimplenet/v1";
            $user->saveQuietly();

            return true;
        } else {
            return false;
        }
    }

    private function getToken()
    {
        // Get Authorization Header
        $jwt = Cache::get('PORTAINER_JWT', function () {
            $response = Http::post(env('PORTAINER_URL') . '/api/auth', [
                'Username' => env('PORTAINER_USERNAME'),
                'Password' => env('PORTAINER_PASSWORD')
            ]);

            // // TODO: Check for error
            $body = json_decode($response->body());

            Cache::put('PORTAINER_JWT', $body->jwt, 60 * 60 * 8);
        });

        return $jwt;
    }

    private function createMySQLDatabase()
    {
        try {
            $db_name = "DB_" . rand() . "_" . time();
            $host = '65.108.95.193:6666';
            $username = "root";
            $password = "2fb31dbf90d427b52615";

            $conn = mysqli_connect($host, $username, $password);
            if (!$conn) {
                return false;
            }

            $new_user = "U_" . Str::random(12);
            $new_password = Str::random(20);
            $user_sql = "CREATE USER '" . $new_user . "' IDENTIFIED BY '" . $new_password . "'";
            $exec_query = mysqli_query($conn, $user_sql);
            if (!$exec_query) {
                return false;
            }

            $sql = "CREATE Database IF NOT EXISTS " . $db_name;
            $exec_query = mysqli_query($conn, $sql);
            if (!$exec_query) {
                // dd("Could not create database: " . mysqli_error($conn));
                return false;
            }

            $grant_sql = "GRANT ALL ON " . $db_name . ".* TO '" . $new_user . "'";
            $exec_query = mysqli_query($conn, $grant_sql);
            if (!$exec_query) {
                return false;
            }

            return [
                $new_user,
                $new_password,
                $db_name
            ];
        } catch (\Exception $e) {
            return false;
        }
    }

    private function installWoo($id, $url)
    {
        try {
            $jwt = $this->getToken();
            $cont = Http::withToken($jwt)->post(env('PORTAINER_URL') . '/api/endpoints/2/docker/containers/' . $id . '/exec', [
                'Cmd' => ["sh", "-c", "
                    wp core install --url=https://".$url." --title=Rimplenet --admin_name=admin --admin_password=admin --admin_email=you@domain.com
                    wp plugin delete hello
                    wp plugin delete akismet
                    wp plugin install woocommerce --activate
                    wp plugin install ".env('RIMPLENET_PLUGIN_URL')." --activate
                "],
                'User' => 'www-data',
            ]);
            $decoded_cont_body = json_decode($cont->body());
            if ($decoded_cont_body->Id) {
                Http::withToken($jwt)->post(env('PORTAINER_URL') . '/api/endpoints/2/docker/exec/' . $decoded_cont_body->Id . '/start', [
                    "Detach" => false,
                    "Tty" => false
                ]);
                // $stat = Http::withToken($jwt)->get(env('PORTAINER_URL') . '/api/endpoints/2/docker/exec/' . $decoded_cont_body->Id . '/json');
                // dump(json_decode($stat->body()));
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    private function installCli($id)
    {
        try {
            $jwt = $this->getToken();
            $cont = Http::withToken($jwt)->post(env('PORTAINER_URL') . '/api/endpoints/2/docker/containers/' . $id . '/exec', [
                "AttachStdin" => false,
                "AttachStdout" => true,
                "AttachStderr" => true,
                "DetachKeys" => "ctrl-p,ctrl-q",
                "Tty" => false,
                'Cmd' => ["sh", "-c", "
                    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
                    chmod +x wp-cli.phar
                    mv wp-cli.phar /usr/local/bin/wp
                "],
                'User' => "root"
            ]);
            $decoded_cont_body = json_decode($cont->body());
            if ($decoded_cont_body->Id) {
                Http::withToken($jwt)->post(env('PORTAINER_URL') . '/api/endpoints/2/docker/exec/' . $decoded_cont_body->Id . '/start', [
                    "Detach" => false,
                    "Tty" => false
                ]);
                // $stat = Http::withToken($jwt)->get(env('PORTAINER_URL') . '/api/endpoints/2/docker/exec/' . $decoded_cont_body->Id . '/json');
                // dump(json_decode($stat->body()));
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}

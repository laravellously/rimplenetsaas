<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PortainerController extends Controller
{
    public function __construct()
    {
        // Get Authorization Header
        Cache::get('PORTAINER_JWT', function () {
            $response = Http::post(env('PORTAINER_URL') . '/api/auth', [
                'Username' => env('PORTAINER_USERNAME'),
                'Password' => env('PORTAINER_PASSWORD')
            ]);

            // // TODO: Check for error
            $body = json_decode($response->body());

            Cache::forever('PORTAINER_JWT', $body->jwt);
        });
    }

    public function create()
    {
        $jwt = Cache::get('PORTAINER_JWT');
        $name = Str::random(8);
        $cont = Http::withToken($jwt)->post(env('PORTAINER_URL').'/api/endpoints/1/docker/containers/create', [
            'name' => $name,
            'Image' => 'wordpress',
            'Env' => [
                "WORDPRESS_CONFIG_EXTRA=define('FORCE_SSL_ADMIN', true);",
                "WORDPRESS_DB_HOST=db:3306",
                "WORDPRESS_DB_USER=wordpress",
                "WORDPRESS_DB_PASSWORD=wordpress",
                "WORDPRESS_DB_NAME=".$name,
                "VIRTUAL_HOST=".$name.".kubectl.bluudigital.com",
                "LETSENCRYPT_HOST=".$name.".kubectl.bluudigital.com"
            ]
        ]);
        $cont_body = json_decode($cont->body());
        return true;
    }

    public function status($id){
        //
    }
}

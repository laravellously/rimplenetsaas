1. Wallets
2. Users
3. Tansactions
4. API
5. Count requests

// app\Listeners\RouterMatchedListener.php
namespace App\Listeners;

use Cache;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Log;

class RouterMatchedListener
{
    /**
     * Handle the event.
     *
     * @param  router.matched  $event
     * @return void
     */
    public function handle(Route $route)
    {
        $uri = md5($route->getUri());
        if( ! Cache::has($uri)) {
            Cache::forever($uri, 1);
        } else {
            Cache::increment($uri);
        }
    }
}

Then you would register that Event Listener in app\Providers\EventServiceProvider:
    protected $listen = [
        'router.matched' => [
            'App\Listeners\RouterMatchedListener',
        ],
    ];

Then, when you need to get the visits for a particular route, you just call this:
$visits = Cache::get(md5(Request::path()));

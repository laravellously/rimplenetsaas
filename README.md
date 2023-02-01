1. Wallets: Create, Read, Delete **DONE
2. Users: Create, Read, Update, Delete, (Login) **DONE
3. Tansactions: Credit, Debit, Transfer **DONE
4. API
5. API Docs
6. Count requests

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


***TODO***
1. Withdrawals
2. Woocommerce
3. Wallet Balance
4. Investment Plan
5. MLM Matrix


***HOW-TO***
1. Get Access Token: POST /api/token?key=API_KEY_HERE or POST /api/login?email=admin@admin.com&password=password
2. If need be, refresh token: POST /api/refresh
3. Endpoints =>
    Register Users: POST /api/user-register
    Login Users: POST /api/user-login
    Update Users Profile: POST /api/user-profile-update
    Get User Detail: GET /api/user-profile
    
    Create Wallet: POST /api/create-wallet
    Create Credit: POST /api/create-credit
    Create Debit: POST /api/create-debit
    Create Transfer: POST /api/create-transfer

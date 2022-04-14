<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);

        
// $client = new \GuzzleHttp\Client();
// $response = $client->request('GET', 'https://api.cashfree.com/pg/orders/235', [
//   'headers' => [
//     'Accept' => 'application/json',
//     'x-api-version' => '2022-01-01',
//     'x-client-id' => '160598c8dac03e4eb0df1bf8f6895061',
//     'x-client-secret' => 'a174bdc9c27523fdcc5df8929c07fdc093dddf1a',
//   ],
// ]);

// $data = json_decode($response->getBody());
// echo $data->order_status;
// exit;


          // $expire_date_time=date('Y-m-d H:i:s', strtotime("+1 days"));
          // dd( $expire_date_time);
        // dd(url('/'));
         //dd(substr(exec('getmac'), 0, 17));

         if(url()->current()=="http://localhost/card/login"  ||  url()->current()=="http://localhost/card/register"){
            $url= url('/');
            ?>
            <script>
                window.location='<?php echo $url  ?>'
            </script>

            <?php
         }
    }
}

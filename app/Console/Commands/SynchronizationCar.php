<?php

namespace App\Console\Commands;

use http\Client;
use Illuminate\Console\Command;

class SynchronizationCar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'car:synchronization';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'synchronization of cars';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // guzzle -> site
        //
    }

    public function clientMakeCars()
    {
        $client = new Client([
            // Base URL is used with relative request
           'base_uri' => 'http://api.coindesk.com/v1/bpi/',
           // You can set any of default request options.
           'timeout' =>  2.0
        ]);

        $response = $client->get('currentprice/BTC.json');
        return json_decode($response->getBody());
    }
}

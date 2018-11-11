<?php

namespace App\Providers;

use App\Events\ImportFile;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Queue::after(function (JobProcessed $event) {
            $queue = DB::table(config('queue.connections.database.table'))->first();
            if(!$queue){
                event(new ImportFile());
                Log::notice("not empty");
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

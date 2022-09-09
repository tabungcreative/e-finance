<?php

namespace App\Providers;

use App\Services\Impl\PembayaranServiceImpl;
use App\Services\PembayaranService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PembayaranProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        PembayaranService::class => PembayaranServiceImpl::class
    ];

    public function provides(): array
    {
        return [PembayaranService::class];
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

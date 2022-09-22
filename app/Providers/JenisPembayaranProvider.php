<?php

namespace App\Providers;

use App\Services\Impl\JenisPembayaranServiceImpl;
use App\Services\JenisPembayaranService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class JenisPembayaranProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        JenisPembayaranService::class => JenisPembayaranServiceImpl::class
    ];

    public function provides(): array
    {
        return [JenisPembayaranService::class];
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

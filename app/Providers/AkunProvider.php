<?php

namespace App\Providers;

use App\Services\AkunService;
use App\Services\Impl\AkunServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AkunProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        AkunService::class => AkunServiceImpl::class
    ];

    public function provides(): array
    {
        return [AkunService::class];
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

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\AdminLayout; // Adjust namespace if needed
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\ApprovalMiddleware;
use Illuminate\Routing\Router;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Router $router): void
    {
        $router->aliasMiddleware('approval', ApprovalMiddleware::class);
        $router->aliasMiddleware('role', RoleMiddleware::class);
    }
}

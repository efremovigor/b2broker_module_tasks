<?php

namespace Tasks;

use Illuminate\Support\Facades\Route;

class TaskRouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
//        var_dump(base_path('vendor/b2broker_module_tasks/routes/web.php'));
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('vendor/b2broker_module_tasks/routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
//        var_dump(base_path('vendor/b2broker_module_tasks/routes/api.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('vendor/b2broker_module_tasks/routes/api.php'));
    }
}

<?php

use Tasks\Routes;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

foreach (Routes::getApiRoutes() as $method => $list) {
    foreach ($list as $url => $action) {
        Route::$method($url, $action);
    }
}

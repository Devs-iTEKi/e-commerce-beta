<?php

use App\Admin\Controllers\CategoriaController;
use App\Admin\Controllers\MarcaController;
use App\Admin\Controllers\ProductoController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use OpenAdmin\Admin\Facades\Admin;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('marcas', MarcaController::class);
    $router->resource('categorias', CategoriaController::class);
    $router->resource('productos', ProductoController::class);

});

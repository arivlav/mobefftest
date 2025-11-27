<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    TaskController
};

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')
    ->group(
        function () {
            Route::prefix('/tasks')
                ->controller(TaskController::class)
                ->group(
                    function () {
                        Route::post('/', 'store')
                            ->name('api.tasks.store');
                        Route::get('/', 'index')
                            ->name('api.tasks');
                        Route::prefix('/{id}')
                            ->group(
                                function () {
                                    Route::get('', 'show')
                                        ->name('api.tasks.show');
                                    Route::put('', 'update')
                                        ->name('api.tasks.update');
                                    Route::delete('', 'delete')
                                        ->name('api.tasks.delete');
                                }
                            );
                    }
                );
        }
    );

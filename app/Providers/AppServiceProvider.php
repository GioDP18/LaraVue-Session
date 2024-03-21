<?php

namespace App\Providers;

use App\Http\Implementations\AuthorServiceImpl;
use App\Http\Implementations\AuthServiceImpl;
use App\Http\Implementations\BookServiceImpl;
use App\Http\Services\AuthorService;
use App\Http\Services\AuthService;
use App\Http\Services\BookService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        AuthService::class => AuthServiceImpl::class,
        AuthorService::class => AuthorServiceImpl::class,
        BookService::class => BookServiceImpl::class,
    ];
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
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Models\Blog;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use View;
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
    public function boot(): void
    {
        //
        Paginator::useBootstrap();
        // if i sent data from here and use * ican receive the data from any where in my projects
        View::composer('*', function ($view) {
            $footerRecentblogs = Blog::query()
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();

            $categories = Category::all();

            $view->with(compact('footerRecentblogs', 'categories'));
        });
    }
}

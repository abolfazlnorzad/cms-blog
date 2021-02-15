<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
            $categories = Category::with('childs')->where('category_id',null)->get();

        View::composer('layouts.app', function ($view) use ($categories) {
            $view->with('categories',$categories);
        });
    }
}

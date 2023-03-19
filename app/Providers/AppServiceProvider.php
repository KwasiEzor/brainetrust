<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot():void
    {
        //Bootstrap pagination
        Paginator::useBootstrapFour();

        //Password default validation
        Password::defaults(function(){
            return Password::min(8)
                ->letters()
                ->numbers()
                ->symbols()
                ->mixedCase()
                ->uncompromised();
        });

        // Send Roles and Permissions data to the admin users view
        view()->composer('admin.users.show',function($view){
            $view->with([
                'roles'=>Role::all(),
                'permissions'=>Permission::all(),
            ]);
        });
        view()->composer('admin.posts.create',function($view){
            $view->with([
                    'categories'=>Category::all(),
                    'users'=>User::all(),
                    'tags'=>Tag::all(),
                ]);
        });
    }
}

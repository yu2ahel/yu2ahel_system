<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user){
            return $user->hasRole('admin') ? true : null ;
        });
        Gate::define('show user type', function ($user) {
            return ($user->permiisionsOwner('show user type') ? true : abort(403)) ;
        });
        Gate::define('show department', function ($user) {
            return ($user->permiisionsOwner('show department') ? true : abort(403)) ;
        });
        Gate::define('show branches', function ($user) {
            return ($user->permiisionsOwner('show branches') ? true : abort(403)) ;
        });
        Gate::define('show service', function ($user) {
            return ($user->permiisionsOwner('show service') ? true : abort(403)) ;
        });
        Gate::define('show rooms', function ($user) {
            return ($user->permiisionsOwner('show rooms') ? true : abort(403)) ;
        });
        Gate::define('show providers', function ($user) {
            return ($user->permiisionsOwner('show providers') ? true : abort(403)) ;
        });
        Gate::define('show users', function ($user) {
            return ($user->permiisionsOwner('show users') ? true : abort(403)) ;
        });
        Gate::define('show user group', function ($user) {
            return ($user->permiisionsOwner('show user group') ? true : abort(403)) ;
        });

    }
}

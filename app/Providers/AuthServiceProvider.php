<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //правила для обновления
        Gate::define('isAdmin', function (User $user) {
            if($user->permission()->value('name') == 'admin')
                return TRUE;
            else
                return FALSE;
        });

        Gate::define('isSotr', function (User $user) {
            if($user->permission()->value('name') == 'sotr')
                return TRUE;
            else
                return FALSE;
        });

        Gate::define('isStud', function (User $user) {
            if($user->permission()->value('name') == 'stud')
                return TRUE;
            else
                return FALSE;
        });


    }
}

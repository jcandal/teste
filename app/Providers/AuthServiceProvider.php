<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Claim;
use App\Models\User;

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

        $claims = Claim::with('roles')->get();

        foreach ($claims as $claim) {
            Gate::define($claim->name, function(User $user) use ($claim) {
                return $user->hasClaim($claim);
            });
        }

        Gate::define('user-admin', function (User $user) {
            if ($user->hasAnyRoles('admin'))
              return true;
        });

        Gate::before(function(User $user, $ability) {
            if ($user->hasAnyRoles('admin'))
              return true;
        });
    }
}

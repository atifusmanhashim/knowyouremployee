<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Client;
use Laravel\Passport\Passport;
use App\Models\User;
use App\Models\AdminUser;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Passport::ignoreRoutes();
        // Customize Passport for multiple authentication models
        Passport::useClientModel(clientModel: Client::class);
        Passport::tokensCan([
            'user' => 'Access as a User',
            'admin' => 'Access as an Admin User',
        ]);
    }
}

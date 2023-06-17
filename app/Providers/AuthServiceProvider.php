<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Projet;
use App\Policies\ProjetPolicy;
use App\Models\Residence;
use App\Policies\ResidencePolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
       // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // 'App\Models\Projet' => 'App\Policies\ProjetPolicy',
        Projet::class => ProjetPolicy::class,
        Residence::class => ResidencePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

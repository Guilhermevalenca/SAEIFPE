<?php

namespace App\Providers;

use App\Models\Form;
use App\Models\PostsIfpe;
use App\Models\User;
use App\Policies\FormPolicy;
use App\Policies\FormResponsePolicy;
use App\Policies\PostsIfpePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Form::class => FormPolicy::class,
        PostsIfpe::class => PostsIfpePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}

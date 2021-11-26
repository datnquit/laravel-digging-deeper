<?php

namespace App\Providers;

use App\Models\Comment;
use App\Policies\CommentPolicy;
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
         Comment::class => CommentPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-comment', function ($user, $user_id) {
            return $user->id == $user_id;
        });
        Gate::before(function ($user, $ability) {
//            if ($user->isSuperAdmin()) {
            if (false) {
                return true;
            } else {
                return null;
            }
        });
//        Gate::after(function ($user, $ability, $result, $arguments) {
//
//        });
//        Gate::define('update-comment', [CommentPolicy::class, 'update']);

        Gate::resource('comments', 'CommentPolicy');
//        Gate::define('comments.view', 'CommentPolicy@view');
//        Gate::define('comments.create', 'CommentPolicy@create');
//        Gate::define('comments.update', 'CommentPolicy@update');
//        Gate::define('comments.delete', 'CommentPolicy@delete');
    }
}

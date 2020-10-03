<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['home', 'mail.sent', 'mail.read', 'mail.drafts', 'mail.trash', 'mail.create', 'contact.index', 'contact.create', 'profile', 'report'], 'App\Http\ViewComposers\UserEmailComposer');
       
    }
}

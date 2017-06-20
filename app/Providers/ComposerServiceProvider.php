<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            [
                'campaign.campaigns',
                'event.index',
                'event.detail',
                'campaign.detail',
                'campaign.list_contribution_confirmed',
                'campaign.list_contribution_unconfirmed',
                'user.detail',
                'user.follower',
                'user.following',
                'user.campaigns',
                'user.event',
                'user.blog',
                'user.campaign_detail',
            ],
            'App\Http\ViewComposers\CategoryComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

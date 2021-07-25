<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Models\User;
use App\Models\Listing;
use App\Models\Category;
use App\Models\Location;
use App\Observers\UserObserver;
use App\Observers\ListingObserver;
use App\Observers\CategoryObserver;
use App\Observers\LocationObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Listing::observe(ListingObserver::class);
        Category::observe(CategoryObserver::class);
        Location::observe(LocationObserver::class);
    }
}

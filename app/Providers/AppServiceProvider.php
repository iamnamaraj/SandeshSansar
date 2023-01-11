<?php

namespace App\Providers;


// use App\Models\SidebarAd;
use App\Models\SidebarAd;
use App\Models\TopAdvertisement;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $top_ad_data = TopAdvertisement::where('id', 1)->first();
        $top_sidebar_ad = SidebarAd::where('sidebar_ad_location', 'Top')->get();
        $bottom_sidebar_ad = SidebarAd::where('sidebar_ad_location', 'Bottom')->get();

        view()->share('global_top_ad_data', $top_ad_data);
        view()->share('global_top_sidebar_ad', $top_sidebar_ad);
        view()->share('global_bottom_sidebar_ad',  $bottom_sidebar_ad);
    }
}

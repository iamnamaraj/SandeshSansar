<?php

namespace App\Providers;


// use App\Models\SidebarAd;

use App\Models\Page;
use App\Models\Post;
use App\Models\Category;
use App\Models\SidebarAd;
use App\Models\LiveChannel;
use App\Models\OnlinePoll;
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

        $categories = Category::with('rSubCategory')->where('status', 'Show')->orderBy('order', 'asc')->get();
        $top_ad_data = TopAdvertisement::where('id', 1)->first();
        $top_sidebar_ad = SidebarAd::where('sidebar_ad_location', 'Top')->get();
        $bottom_sidebar_ad = SidebarAd::where('sidebar_ad_location', 'Bottom')->get();
        $page_data = Page::where('id', 1)->first();
        $lives = LiveChannel::get();
        $recent_news = Post::with('rSubCategory')->orderBy('id', 'desc')->get();
        $popular_news = Post::with('rSubCategory')->orderBy('visitor', 'desc')->get();
        $poll_data = OnlinePoll::orderBy('id', 'desc')->first();


        view()->share('global_top_ad_data', $top_ad_data);
        view()->share('global_top_sidebar_ad', $top_sidebar_ad);
        view()->share('global_bottom_sidebar_ad',  $bottom_sidebar_ad);
        view()->share('global_bottom_sidebar_ad',  $bottom_sidebar_ad);
        view()->share('global_categories', $categories);
        view()->share('global_page_data', $page_data);
        view()->share('global_live_data', $lives);
        view()->share('global_recent_news', $recent_news);
        view()->share('global_popular_news', $popular_news);
        view()->share('global_poll_data', $poll_data);
    }
}

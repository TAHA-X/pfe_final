<?php

namespace App\Providers;
use App\Models\Setting;
use App\Models\SettingHomePage;
use App\Models\AppartmentImg;
use Illuminate\Support\ServiceProvider;
use App\Models\SettingProjetsPage;

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
        $settings = Setting::first();
        $settings_home_page = SettingHomePage::first();
        $appartements_img_home_page = AppartmentImg::all();
        $SettingProjetsPage = SettingProjetsPage::all();
        View()->share([
            "settings"=>$settings,
            "settings_home_page"=>$settings_home_page,
            "appartements_img_home_page"=>$appartements_img_home_page,
            "SettingProjetsPage"=>$SettingProjetsPage
        ]);
    }
}

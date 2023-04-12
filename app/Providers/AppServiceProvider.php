<?php

namespace App\Providers;

use App\Models\Pengaturan;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $verticalMenuJson = file_get_contents(base_path('resources/json/mastermenu.json'));
        $verticalMenuData = json_decode($verticalMenuJson);

            // Share all menuData to all the views
        view()->share('menuData', [$verticalMenuData]);

        view()->composer(['pages.penjualan.laporan','pages.penjualan.print'],
        function ($view) {
            $view->with('pengaturanall',
                Pengaturan::latest()->select(['headerlap1','headerlap2','alamat1','alamat2'])->first());
        });

    }
}

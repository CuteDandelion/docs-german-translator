<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PdfConverterService;
use Spatie\PdfToImage\Pdf as PdfToImage;

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
        //
    }
}

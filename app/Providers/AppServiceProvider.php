<?php

namespace App\Providers;

use App\Models\News;
use App\Repositories\NewsRepository;
use App\Repositories\NewsRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(NewsRepositoryInterface::class, function (Application $application) {
            return new NewsRepository(new News());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

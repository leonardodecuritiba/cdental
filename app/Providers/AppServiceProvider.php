<?php

namespace App\Providers;

use App\Observers\Financials\BudgetObserver;
use App\Orcamento;
use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;
use Illuminate\Support\Facades\Schema;
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
        $this->app->singleton( FakerGenerator::class, function () {
            return FakerFactory::create( 'pt_BR' );
        } );
        Schema::defaultStringLength( 191 );
        Orcamento::observe( BudgetObserver::class );
    }
}

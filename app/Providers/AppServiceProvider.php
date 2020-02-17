<?php

namespace App\Providers;

use App\Models\HumanResources\Patients\PatientImage;
use App\Observers\Financials\BudgetObserver;
use App\Observers\HumanResources\Patients\PatientDocumentObserver;
use App\Observers\HumanResources\Patients\PatientImageObserver;
use App\Orcamento;
use App\Models\HumanResources\Patients\PatientDocument;
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
        PatientDocument::observe( PatientDocumentObserver::class );
        PatientImage::observe( PatientImageObserver::class );
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProviders extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        config([
			'laravellocalization.supportedLocales' => [
				'en'  => array( 'name' => 'English', 'script' => 'Latn', 'native' => 'English' ),
                'ar'  => array( 'name' => 'Arabic', 'script' => 'Arab', 'native' => 'Arabic'),
                'fr'  => array( 'name' => 'French', 'script' => 'Latn', 'native' => 'English' ),
			],

			'laravellocalization.useAcceptLanguageHeader' => true,

			'laravellocalization.hideDefaultLocaleInURL' => true
		]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

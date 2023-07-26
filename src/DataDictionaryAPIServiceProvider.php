<?php

namespace Ecoding\DataDictionaryAPI;

use Ecoding\DataDictionaryAPI\DataDictionaryAI;
use Illuminate\Support\ServiceProvider;

class DataDictionaryAPIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/data_dictionary_ai.php', 'data_dictionary_ai');
        $this->app->singleton('DataDictionaryAI', function ($app) {
            $baseURL = config('data_dictionary_ai.base_url');
            return new DataDictionaryAI($baseURL);
        });
    }

    public function provides()
    {
        return ['DataDictionaryAI'];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    protected function bootForConsole()
    {
        $this->publishes([
            __DIR__.'/../config/data_dictionary_ai.php' => config_path('data_dictionary_ai.php'),
        ], 'data_dictionary_ai.config');
    }
}
<?php

namespace Modules\Client\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Validator;

class ClientServiceProvider extends ServiceProvider 
{ 
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        Validator::extend('cpf_cnpj', function ($attribute, $value, $parameters, $validator) {
            $value = preg_replace('/[^0-9]/', '', (string) $value);

            if (strlen($value) == 14){
                $cnpj = $value;
                for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
                {
                    $soma += $cnpj{$i} * $j;
                    $j = ($j == 2) ? 9 : $j - 1;
                }
                $resto = $soma % 11;
                if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
                    return false;

                for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
                {
                    $soma += $cnpj{$i} * $j;
                    $j = ($j == 2) ? 9 : $j - 1;
                }

                $resto = $soma % 11;
                return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);

            } else if (strlen($value) == 11){
                $cpf = $value;

                for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--){
                    $soma += $cpf{$i} * $j;
                }

                $resto = $soma % 11;
                if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto)){
                    return false;
                }

                for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--){
                    $soma += $cpf{$i} * $j;
                }

                $resto = $soma % 11;
                return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);

            } else {
                return false;
            }


    // Valida segundo dígito verificador

            return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
            return false;
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(ViewComposerServiceProvider::class);
        $this->app->register(ObserverServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
    }


    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/client');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/client';
        }, \Config::get('view.paths')), [$sourcePath]), 'client');
    }


        /**
     * Register an additional directory of factories.
     *
     * @return void
     */
        public function registerFactories()
        {
            if (! app()->environment('production') && $this->app->runningInConsole()) {
                app(Factory::class)->load(__DIR__ . '/../Database/factories');
            }
        }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}

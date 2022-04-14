<?php


namespace Ashkan\FormBuilder;

use Ashkan\FormBuilder\Repositories\FormBuilderRepository;
use Illuminate\Support\ServiceProvider;

class FormBuilderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('forms' , function (){
            return new FormBuilderRepository();
        });

        ## Load Configs ##
        $this->mergeConfigFrom(__DIR__ . '/config/form_builder.php', 'form_builder');
    }
}

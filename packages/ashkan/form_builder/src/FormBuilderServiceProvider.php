<?php


namespace Ashkan\FormBuilder;

use Ashkan\FormBuilder\Console\Commands\CreateFormCommand;
use Ashkan\FormBuilder\Repositories\FormBuilderRepository;
use Illuminate\Support\ServiceProvider;

class FormBuilderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('forms' , function (){
            return new FormBuilderRepository();
        });

        ## FormBuilder Class Command ##
        $this->commands([
            CreateFormCommand::class
        ]);

        ## Load Configs ##
        $this->mergeConfigFrom(__DIR__ . '/config/form_builder.php', 'form_builder');
    }
}

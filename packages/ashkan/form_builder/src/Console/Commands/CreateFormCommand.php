<?php

namespace Ashkan\FormBuilder\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CreateFormCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'form:create {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default superuser';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function getNamespace()
    {
        return 'App\Forms';
    }

    private function getFormRoot()
    {
        return base_path('/app/Forms/');
    }

    private function GetModelColumns($model)
    {
        return ;
    }

    private function CreateFieldsArray($model)
    {
        $fields = DB::select('describe ' . $model->getTable());

        $data = [];
        foreach ($fields as $f){
            $data[$f->Field] = [
                'type' => $f->Type,
                'null' => $f->Null == 'YES' ? true : false,
                'default' => $f->Default ? $f->Default : null,
            ];
        }

        return $data;
    }

    private function CreateTemplate($name, $types)
    {
        $namespace = $this->getNamespace();

        $template = vsprintf("<?php

namespace $namespace;

class $name extends Form
{
    public function form_builder()
    {
        return [%s];
    }
}

        ", implode('\n', $types));

        return $template;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $model_name = $this->option('model');
        $file_name = $this->getFormRoot() . $model_name . 'Form' . '.php';

        $table_name = "App\\Models\\" . $model_name;
        $files_data = $this->CreateFieldsArray(new $table_name());

        $contents = $this->CreateTemplate($model_name, $files_data);

        if (file_exists($file_name)) {
            File::delete($file_name);
        }

        file_put_contents($file_name, $contents);

        $this->info($model_name . 'Form' . '.php' . ' created in app/Forms folder...');
        return 0;
    }
}

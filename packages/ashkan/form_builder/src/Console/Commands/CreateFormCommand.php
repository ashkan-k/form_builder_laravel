<?php

namespace Ashkan\FormBuilder\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
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

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $model_name = $this->option('model');
        $file_name = base_path('/app/Forms/') . $model_name . 'Form' . '.php';
        $contents = "
<?php

namespace App\Forms;

class SongForm extends Form
{
    public function form_builder()
    {

    }
}";

        if (file_exists($file_name)){
            File::delete($file_name);
        }

        File::put($file_name, $contents);

        $this->info($model_name . 'Form' . '.php' . ' created in app/Forms folder...');
        return 0;
    }
}

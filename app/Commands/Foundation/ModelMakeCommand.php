<?php

namespace App\Commands\Foundation;

use Illuminate\Support\Str;
// use InvalidArgumentException;
use Illuminate\Foundation\Console\ModelMakeCommand as ModelMake;
// use Symfony\Component\Console\Input\InputOption;
use App\Commands\Helpers\PackageDetail;

class ModelMakeCommand extends ModelMake
{
    use PackageDetail;
    
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Eloquent model class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $content = $this->getComposer();
        $path    = getcwd() . $this->devPath();
        $path    = $content->type === 'project' ? $path . 'app/Models/' : $path . 'src/Models/';

        return $path . str_replace('\\', '/', $name) . '.php';
    }


    /**
     * Create a controller for the model.
     *
     * @return void
     */
    protected function createController()
    {
        $controller = Str::studly(class_basename($this->argument('name')));

        $modelName = $this->rootNamespace() . 'Models\\' . $this->getNameInput();

        $this->call('make:controller', array_filter([
            'name' => "{$controller}Controller",
            '--model' => $this->option('resource') || $this->option('api') ? $modelName : null,
            '--api' => $this->option('api'),
            '--requests' => $this->option('requests') || $this->option('all'),
        ]));
    }

    /**
    * Build the class with the given name.
    *
    * @param  string  $name
    * @return string
    * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
    */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        $stub = $this->replaceModelNamespace($stub);

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    public function replaceModelNamespace($stub)
    {

        $model = $this->getNameInput();
        $model = str_replace('/', '\\', $model);
        $namespace = $this->rootNamespace() . 'Models';
        $subNamespace = str_replace(class_basename($model), '', $model);
        if (strlen($subNamespace)) {
            $subNamespace = rtrim($subNamespace,'\\');
            $namespace = $namespace . '\\' . $subNamespace;
        }
        return str_replace('{{ namespace }}', $namespace, $stub);
    }
}

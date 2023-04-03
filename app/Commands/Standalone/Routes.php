<?php

namespace App\Commands\Standalone;

use Illuminate\Support\Str;
use App\Commands\Helpers\MakeFile;
use LaravelZero\Framework\Commands\Command;

class Routes extends MakeFile
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'create:routes';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create routes file';

    public function getStub()
    {
        return __DIR__ . '/stubs/Routes.stub';
    }

    public function getFilename()
    {
        return 'web.php';
    }

    public function getPath()
    {
        return cache()->get('package_path') . '/routes';
    }
}

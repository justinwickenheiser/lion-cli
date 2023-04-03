<?php

namespace App\Commands\Standalone;

use Illuminate\Support\Str;
use App\Commands\Helpers\MakeDir;

class DirResourcesViews extends MakeDir
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'create:directory:resourcesviews';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create directory resources/views';

    public function getPath()
    {
        return cache()->get('package_path') . '/resources/views';
    }
}

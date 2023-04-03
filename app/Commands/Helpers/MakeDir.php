<?php

namespace App\Commands\Helpers;

use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use LaravelZero\Framework\Commands\Command;

abstract class MakeDir extends Command
{
	abstract public function getPath();

	protected $filesystem;

	public function __construct(Filesystem $filesystem)
	{
		parent::__construct();
		$this->filesystem = $filesystem;
	}

	/**
		 * Execute the console command.
		 *
		 * @return mixed
		 */
	public function handle()
	{
		$this->makeDir();
	}

	/**
	 * @return bool
	 */
	protected function makeDir()
	{
		if (!$this->filesystem->isDirectory($this->getPath())) {
			return $this->filesystem->makeDirectory($this->getPath(), 0755, true);
		}
	}

}
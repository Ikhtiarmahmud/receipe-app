<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CreateServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {className}';

    /**
     * @var Filesystem
     */
    protected $files;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a New Service';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->files = $filesystem;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $className = $this->argument('className');

        if ($this->confirm('Do you wish to create ' . $className . 'file?')) {
            $file = $className . '.php';
            $path = app_path();

            $file = $path . "/Services/$file";
            $composerDir = $path . "/Services";
            $contents = $this->getContents($className);

            if ($this->files->isDirectory($composerDir)) {
                if ($this->files->isFile($file)) {
                    return $this->error($className . ' File Already exists!');
                }

                if (!$this->files->put($file, $contents)) {
                    return $this->error('Something went wrong!');
                }

                $this->info("$className generated!");
            } else {
                $this->files->makeDirectory($composerDir, 0777, true, true);

                if (!$this->files->put($file, $contents)) {
                    return $this->error('Something went wrong!');
                }
                $this->info("$className generated!");
            }
        }
    }

    public function getContents($className): string
    {
        return
            '<?php' . PHP_EOL
            . 'namespace App\Services;' . PHP_EOL
            . PHP_EOL
            . 'use App\Traits\CrudTrait;' . PHP_EOL
            . PHP_EOL
            . 'class ' . $className . PHP_EOL
            . '{' . PHP_EOL
            . '    use CrudTrait;' . PHP_EOL
            . PHP_EOL
            . '    public function __construct()' . PHP_EOL
            . '    {' . PHP_EOL
            . '        //' . PHP_EOL
            . '    }' . PHP_EOL
            . '}';
    }
}

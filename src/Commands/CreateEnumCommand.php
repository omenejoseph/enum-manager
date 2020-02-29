<?php


namespace OmeneJoseph\EnumManager\Commands;


use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Composer;
use Illuminate\Support\Str;

class CreateEnumCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:enum {title}';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:enum {title}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an Emum class';

    /**
     * @var \Illuminate\Support\Composer
     */
    protected $composer;

    /**
     * @var \Illuminate\Filesystem\Filesystem  $files
     */
    protected $files;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $directory;

    /**
     * Create a new soa validation class.
     * @param Filesystem $files
     * @param Composer $composer
     * @return void
     */
    public function __construct(Composer $composer, Filesystem $files)
    {
        parent::__construct();

        $this->composer = $composer;

        $this->files = $files;
        $this->title = Str::studly($this->argument('title'));
        $this->directory = app_path('Enums');
    }

    /**
     * Execute the console command.
     * @throws FileNotFoundException
     * @return void
     */
    public function handle()
    {

        $data = $this->getStub();
        $this->createDirectory();
        $enum_path = $this->getMyEnumPath();
        $this->files->put($enum_path, $data);

        $this->info($this->title .  " class created");

        $this->info('Dumping Autoload, Please wait...!');

        $this->composer->dumpAutoloads();

        $this->info('Process Completed...!');
    }

    /**
     * replaces the dynamic data in the stub with data passed as argument to the crete
     * enum command
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function getStub()
    {
        $stub = $this->files->get(__DIR__ . "/stubs/EnumManger.stub");
        return str_replace("{{CLASS_NAME}}", $this->title, $stub);
    }

    /**
     * Checks for existence of "Enums" directory in the project's root folder and creates
     * it if it does not exist
     * @return void
     */
    private function createDirectory() : void
    {
         (! $this->files->exists($this->directory)) ?
            $this->files->makeDirectory(
                $this->directory)
         : null;
    }

    /**
     * Creates a dynamic path based on the argument of title passed
     * to the command
     * @return string
     */
    private function getMyEnumPath()
    {
        return $this->directory . '/' . $this->title . '.php';
    }
}
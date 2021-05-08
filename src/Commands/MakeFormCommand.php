<?php

namespace Bastinald\LaravelLivewireForms\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Livewire\Commands\ComponentParser;

class MakeFormCommand extends Command
{
    protected $signature = 'make:form {name}';

    public function handle()
    {
        $filesystem = new Filesystem;
        $parser = new ComponentParser(
            config('livewire.class_namespace'),
            config('livewire.view_path'),
            $this->argument('name')
        );
        $template = preg_replace_array(
            ['/\[namespace\]/', '/\[class\]/', '/\[quote\]/'],
            [$parser->classNamespace(), $parser->className(), $parser->wisdomOfTheTao()],
            $filesystem->get(__DIR__ . '/../../stubs/form.stub')
        );

        if ($filesystem->exists($parser->classPath())) {
            $this->error('Form component already exists!');

            return;
        }

        $filesystem->ensureDirectoryExists(dirname($parser->classPath()));
        $filesystem->put($parser->classPath(), $template);

        $this->info('Form component made!');
    }
}

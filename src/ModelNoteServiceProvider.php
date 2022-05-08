<?php

namespace Fahedaljghine\ModelNote;

use Illuminate\Support\ServiceProvider;
use Fahedaljghine\ModelNote\Exceptions\InvalidNoteModel;

class ModelNoteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations/');
        }

        if (! class_exists('CreateNotesTable')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__.'/../database/migrations/create_notes_table.php.stub' => database_path('migrations/'.$timestamp.'_create_notes_table.php'),
            ], 'migrations');
        }

        $this->publishes([
            __DIR__.'/../config/model-note.php' => config_path('model-note.php'),
        ], 'config');

        $this->guardAgainstInvalidNoteModel();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/model-note.php', 'model-note');
    }

    public function guardAgainstInvalidNoteModel()
    {
        $modelClassName = config('model-note.note_model');

        if (! is_a($modelClassName, Note::class, true)) {
            throw InvalidNoteModel::create($modelClassName);
        }
    }
}

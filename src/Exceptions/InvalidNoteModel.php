<?php

namespace Fahedaljghine\ModelNote\Exceptions;

use Exception;

class InvalidNoteModel extends Exception
{
    public static function create(string $model): self
    {
        return new self("The model `{$model}` is invalid. A valid model must extend the model \Fahedaljghine\ModelNote\Note.");
    }
}

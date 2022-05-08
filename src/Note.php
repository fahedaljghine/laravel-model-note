<?php

namespace Fahedaljghine\ModelNote;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Note extends Model
{
    protected $guarded = [];

    protected $table = 'notes';

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function __toString(): string
    {
        return $this->name;
    }
}

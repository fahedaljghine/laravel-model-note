<?php

return [

    /*
     * The class name of the status model that holds all statuses.
     *
     * The model must be or extend `Fahedaljghine\ModelNote\Note`.
     */
    'note_model' => Fahedaljghine\ModelNote\Note::class,

    /*
     * The name of the column which holds the ID of the model related to the statuses.
     *
     * You can change this value if you have set a different name in the migration for the statuses table.
     */
    'model_primary_key_attribute' => 'model_id',
];

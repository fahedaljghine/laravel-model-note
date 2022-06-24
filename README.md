# Add notes to Eloquent models

This package provides a `HasNotes` trait that, once installed on a model, allows you to do things like this:

```php
// add a note
$model->addNote('needs manager approve');

// add another note
$model->addNote('manager approved');

// get the current status
$model->notes(); // returns a collection of \Fahedaljghine\ModelNotes\Note

// get the last note
$lastNote = $model->lastNote(); // returns an instance of \Fahedaljghine\ModelNotes\Note

```

## Contact Me

You can check all of my information
by [Checking my website](https://fahedaljghine.com/).

## Installation

You can install the package via composer:

```bash
composer require fahedaljghine/laravel-model-note
```

You must publish the migration with:

```bash
php artisan vendor:publish --provider="Fahedaljghine\ModelNote\ModelNoteServiceProvider" --tag="migrations"
```

Migrate the `notes` table:

```bash
php artisan migrate
```

Optionally you can publish the config-file with:

```bash
php artisan vendor:publish --provider="Fahedaljghine\ModelNote\ModelNoteServiceProvider" --tag="config"
```

This is the contents of the file which will be published at `config/model-note.php`

```php
return [

    /*
     * The class name of the notes model that holds all notes.
     *
     * The model must be or extend `Fahedaljghine\ModelNote\Note`.
     */
    'note_model' => Fahedaljghine\ModelNote\Note::class,

    /*
     * The name of the column which holds the ID of the model related to the notes.
     *
     * You can change this value if you have set a different name in the migration for the notes table.
     */
    'model_primary_key_attribute' => 'model_id',

];
```

## Usage

Add the `HasNotes` trait to a model you like to use notes on.

```php
use Fahedaljghine\ModelNote\HasNotes;

class YourEloquentModel extends Model
{
    use HasNotes;
}
```

### Add a new note

You can add a new note like this:

```php
$model->addNote('whatever you like');
```

### Add a private note

You can add a new private note which can be seen only be you like this:

```php
$model->addNote('whatever you like' , true);

//or alternatively
$model->addPrivateNote('whatever you like');

```

### Add a note with tag

Sometimes you will need to tag your note with some tag which can be done like this:

```php
$model->addNote('whatever you like' , false , "tag1");

//or for the private note
$model->addPrivateNote('whatever you like' , "tag2");

```

### Retrieving notes

You can get the last note of model:

```php
$model->note; // returns the text of the last note

$model->note(); // returns the last instance of `Fahedaljghine\ModelNote\Note`

//or alternatively
$model->lastNote(); // returns the last instance of `Fahedaljghine\ModelNote\Note`
```

All associated notes of a model can be retrieved like this:

```php
$all_notes = $model->notes;

//or alternatively
$all_notes = $model->notes();
```

All associated notes of a model with specific tag or tags can be retrieved like this:

```php

//last note of specific tag
$last_note = $model->lastNote("tag1"); 

//specific tag
$all_notes = $model->allNotes("tag1");

//specific tags
$all_notes = $model->allNotes("tag1" , "tag2");
```

All associated private notes of a model with specific tag or tags can be retrieved like this:

```php
//specific tag
$all_notes = $model->privateNotes("tag1");

//specific tags
$all_notes = $model->privateNotes("tag1" , "tag2");
```

### Delete a note from model

You can delete any note that has been added on the model by id at any time by using the `deleteNote` method:

```php
//specific id
$model->deleteNote(1);

//specific ides
$model->deleteNote(1, 2, 3);

```

You can delete any note that has been added on the model by tag at any time by using the `deleteNote` method:

```php
//specific tag
$model->deleteNoteByTag("tag1");

//specific tags
$model->deleteNoteByTag("tag1", "tag2", "tag3");

```

### Delete all notes from model

You can delete all notes that had been added on the model at any time by using the `deleteAllNotes` method:

Delete all notes from model:

```php
$model->deleteAllNotes();
```

### Custom model and migration

You can change the model used by specifying a class name in the `note_model` key of the `model-note` config file.

You can change the column name used in the notes table (`model_id` by default) when using a custom migration where you
changed
that. In that case, simply change the `model_primary_key_attribute` key of the `model-note` config file.


### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Dontae
 - [Paypal](https://www.paypal.com/donate/?hosted_button_id=MSKWTL27YPFDW)
 
## Contributing

You are welcome to contribute

## Credits

- [Fahed Aljghine](https://github.com/fahedaljghine)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

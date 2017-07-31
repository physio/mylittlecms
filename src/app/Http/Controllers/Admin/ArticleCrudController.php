<?php

namespace Physio\MyLittleCMS\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Physio\MyLittleCMS\Http\Requests\ArticleRequest as StoreRequest;
use Physio\MyLittleCMS\Http\Requests\ArticleRequest as UpdateRequest;

class ArticleCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("Physio\MyLittleCMS\Models\Article");
        $this->crud->setRoute("admin/article");
        $this->crud->setEntityNameStrings('articolo', 'articoli');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->setFromDb();
        $this->crud->addColumn(['name'=> 'id', 'type'=>'select', 'entity'=>'category', 'attribute'=>'name', 'model'=>'App\Models\Category', 'label' => 'Categoria']); 
        
        $this->crud->addColumn([
            'label' => 'Categoria',
            'type' => 'select',
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "Physio\MyLittleCMS\Models\Category",
            ]);
        $this->crud->addColumn([
           'name' => 'published', // The db column name
           'label' => "Pubblicato", // Table column heading
           'type' => 'check'
           ]);

        $this->crud->removeColumns(['slug', 'content', 'image', 'date', 'category_id', 'status', 'user_id']);
        // ------ CRUD FIELDS
        $this->crud->addField([    // TEXT
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
            'placeholder' => 'Il Tuo Titolo qui',
            ]);
        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug (URL)',
            'type' => 'text',
            'hint' => 'Sarà inserito automaticamente se viene lasciato vuoto.',
                                // 'disabled' => 'disabled'
            ]);
    /*    $this->crud->addField([    // TEXT
            'name' => 'date',
            'label' => 'Date',
            'type' => 'date',
            'value' => date('Y-m-d'),
            ], 'create');*/

        $this->crud->addField([    // TEXT
            'name' => 'date',
            'label' => 'Data Pubblicazione',
            'type' => 'date_picker',
            'date_picker_options' => [
            'todayBtn' => true,
            'format' => 'dd-mm-yyyy',
            'language' => 'it'
            ], 'update');

        $this->crud->addField([    // WYSIWYG
            'name' => 'content',
            'label' => 'Contenuto',
            'type' => 'ckeditor',
            'placeholder' => 'Your textarea text here',
            ]);
        $this->crud->addField([    // Image
            'name' => 'image',
            'label' => 'Immagine',
            'type' => 'browse',
            ]);
        $this->crud->addField([    // Image
            'name' => 'user_id',
            'type' => 'hidden',
            'value' => \Auth::id(),
            ]);        
        $this->crud->addField([    // SELECT
            'label' => 'Categoria',
            'type' => 'select2',
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "Physio\MyLittleCMS\Models\Category",
            ]);

        $this->crud->addField([    // ENUM
            'name' => 'published',
            'label' => 'Pubblicato',
            'type' => 'checkbox',
            ]);
        $this->crud->addField([    // CHECKBOX
            'name' => 'featured',
            'label' => 'In Evidenza',
            'type' => 'checkbox',
            ]);

     /*   $this->crud->addField([   // Upload
                            'name' => 'photos',
                            'label' => 'Photos',
                            'type' => 'upload_multiple',
                            'upload' => true,
                            'disk' => 'uploads' // if you store files in the /public folder, please ommit this; if you store them in /storage or S3, please specify it;
                            ]);*/
        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
                            $this->crud->allowAccess('revisions');
                            $this->crud->with('revisionHistory');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
                        }

                        public function store(StoreRequest $request)
                        {
		// your additional operations before save here
                            $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
                            return $redirect_location;
                        }

                        public function update(UpdateRequest $request)
                        {
		// your additional operations before save here
                            $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
                            return $redirect_location;
                        }
                    }

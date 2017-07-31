<?php

namespace Physio\MyLittleCMS\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Physio\MyLittleCMS\Http\Requests\TeammemberRequest as StoreRequest;
use Physio\MyLittleCMS\Http\Requests\TeammemberRequest as UpdateRequest;

class TeammemberCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("Physio\MyLittleCMS\Models\Teammember");
        $this->crud->setRoute("admin/teammember");
        $this->crud->setEntityNameStrings('membro del team', 'membri del team');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->setFromDb();

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        $this->crud->addField([    
                                'name' => 'surname',
                                'label' => 'Cognome',
                                'type' => 'text',
                            ]);

        $this->crud->addField([    
                                'name' => 'name',
                                'label' => 'Nome',
                                'type' => 'text',
                            ]);

        $this->crud->addField([    
                                'name' => 'role',
                                'label' => 'Ruoli',
                                'type' => 'text',
                            ]);

        $this->crud->addField([    // WYSIWYG
                                'name' => 'cv',
                                'label' => 'Curriculum Vitae',
                                'type' => 'ckeditor',
                                'placeholder' => 'Inserisci qui il testo',
                            ]);

        $this->crud->addField([    // Image
                                'name' => 'photo',
                                'label' => 'Foto',
                                'type' => 'browse',
                            ]);

        $this->crud->addField([    // ENUM
                                'name' => 'published',
                                'label' => 'Pubblicato',
                                'type' => 'checkbox',
                            ]);

        $this->crud->addField([    // ENUM
                                'name' => 'major',
                                'label' => 'In Evidenza',
                                'type' => 'checkbox',
                            ]);

        $this->crud->addField([       // SelectMultiple = n-n relationship (with pivot table)
                                'label' => "Servizi",
                                'type' => 'select_multiple',
                                'name' => 'activities', // the method that defines the relationship in your Model
                                'entity' => 'activities', // the method that defines the relationship in your Model
                                'attribute' => 'title', // foreign key attribute that is shown to user
                                'model' => "App\Models\Activity", // foreign key model
                                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
                            ]    );   

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        $this->crud->setColumnDetails('surname', [    // ENUM
                                'name' => 'surname',
                                'label' => 'Cognome',
                            ]);

        $this->crud->setColumnDetails('name', [    // ENUM
                                'name' => 'name',
                                'label' => 'Nome',
                            ]);

        $this->crud->setColumnDetails('role', [    // ENUM
                                'name' => 'role',
                                'label' => 'Ruoli',
                            ]);

        $this->crud->setColumnDetails('published', [
                               'label' => "Pubblicato",
                               'type' => 'check',
                           ]);

        $this->crud->setColumnDetails('major', [
                               'label' => "In Evidenza",
                               'type' => 'check',
                           ]);

        $this->crud->removeColumns(['cv', 'photo']); // remove an array of columns from the stack
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
        // $this->crud->allowAccess('revisions');

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

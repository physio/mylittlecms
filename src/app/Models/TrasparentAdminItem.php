<?php

namespace Physio\MyLittleCMS\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
//use Kalnoy\Nestedset\NodeTrait;
//use \Codefocus\NestedSet\NestedSetTrait;

class TrasparentAdminItem extends Model
{
    use CrudTrait;
  //  use NestedSetTrait;
  //  use NodeTrait;


     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'trasparentAdminItems';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['title', 'parent_id', 'description', 'slug', 'lft', 'photo'];
    // protected $hidden = [];
    // protected $dates = [];

    protected $nestedSetColumns = [
    //  Which column to use for the "left" value.
    //  Default: left
    'left' => 'lft',

    //  Which column to use for the "right" value.
    //  Default: right
    'right' => 'rgt',

    //  Which column to point to the parent's PK.
    //  Null is allowed. This will remove the ability to rebuild the tree.
    //  Default: parent_id
    'parent' => 'parent_id',

    //  Which column to use for the node's "depth", or level in the tree.
    //  Null is allowed.
    //    ! When restricting the tree by depth, each node's depth will be
    //      calculated automatically. This is not recommended for large trees.
    //  Default: null
    'depth' => 'depth',

    //  When a table can hold multiple trees, we need to specify which field
    //  uniquely identifies which tree we are operating on.
    //  E.g. in the case of comments, that could be "thread_id" or "post_id".
    //  Null is allowed. NestedSetTrait will assume there is only one tree.
    //  Default: null
    'group' => null,
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function boot()
    {
        parent::boot();
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function parent()
    {
        return $this->belongsTo('Physio\MyLittleCMS\Models\TrasparentAdminItem', 'parent   _id', 'id');
    }

    public function docs()
    {
        return $this->hasMany('Physio\MyLittleCMS\Models\TrasparentAdminDocs');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->title;
    }


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($this->title, '-');
    }

    public function setLftAttribute($value)
    {
        $this->attributes['lft'] = \DB::table($this->table)->where('parent_id', $this->parent_id)->max('lft') + 1;
    }                        
}

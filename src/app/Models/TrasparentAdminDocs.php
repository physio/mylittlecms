<?php

namespace Physio\MyLittleCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class TrasparentAdminDocs extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'trasparentAdminDocs';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['title', 'protocol', 'attachment', 'trasparentAdminItem_id', 'description', 'active'];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        //'attachments' => 'array'
    ];
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
   
    public function item()
    {
        return $this->belongsTo('Physio\MyLittleCMS\Models\TrasparentAdminItem', 'trasparentAdminItem_id');
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

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
   
  /*  public function setAttachmentsAttribute($value)
    {
        $attribute_name = "attachments";
        $disk = "public";
        $destination_path = "docs/amministrazione-trasparente";

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }*/


}

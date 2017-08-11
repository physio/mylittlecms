<?php

namespace Physio\MyLittleCMS\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Physio\MyLittleCMS\Models\Day
 *
 * @property int $id
 * @property string|null $it
 * @property string|null $en
 * @method static \Illuminate\Database\Eloquent\Builder|\Physio\MyLittleCMS\Models\Day whereEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Physio\MyLittleCMS\Models\Day whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Physio\MyLittleCMS\Models\Day whereIt($value)
 * @mixin \Eloquent
 */
class Day extends Model
{

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'week_days';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $fillable = ['weekDay_id', 'start', 'stop'];
    // protected $hidden = [];
    // protected $dates = [];

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
}

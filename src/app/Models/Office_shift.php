<?php

namespace Physio\MyLittleCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

/**
 * App\Models\Office_shift
 *
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $weekDay_id
 * @property string $start
 * @property string $stop
 * @property-read \App\Models\Day $day
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office_shift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office_shift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office_shift whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office_shift whereStop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office_shift whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office_shift whereWeekDayId($value)
 * @mixin \Eloquent
 */
class Office_shift extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'office_shifts';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['weekDay_id', 'start', 'stop'];
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
    public function day()
    {
        return $this->belongsTo('Physio\MyLittleCMS\Models\Day', 'weekDay_id');
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
}

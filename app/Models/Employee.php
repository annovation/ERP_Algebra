<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable. - ne mogu se od strane usera poslati u bazi kroz formu
     *
     * @var array
     */
    protected $guarded = ['id','deleted_at','created_at','updated_at'];


    /**
     **Returns the reports to relationship

     *@return \Illuminate\Database\Eloquent\Relations\belongsTo
     *
     *
     * relacija da dobijemo za zaposlenika tko mu je nadređeni */
    public function reportsTo()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }

    /**
     *Returns the office relationship

     *@return \Illuminate\Database\Eloquent\Relations\belongsTo
     *
     * relacija da dobijemo ured u kojem radi zaposlenik */
    public function office()
    {
        return $this->belongsTo('App\Models\Office');
    }
}

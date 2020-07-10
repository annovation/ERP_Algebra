<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Office extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable. - ne mogu se od strane usera poslati u bazi kroz formu
     *
     * @var array
     */
    protected $guarded = ['id','deleted_at','created_at','updated_at'];

    /**
     * Save a new office
     *
     * @param array $data
     * @return Office
     */

    public function saveOffice($data)
    {
        return $this->create($data);
    }

    /**
     * Update office
     *
     * @param array $data
     * @return void
     */

    public function updateOffice($data)
    {
        $this->update($data);
    }

    /**
     * Delete office
     *provjera je li trashed - znači ako ima flag u bazi, tj. popunjenu kolonu deletedAt, ako ne onda se soft deletea
     *
     * @return void
     */

    public function deleteOffice()
    {
        if($this->trashed()){
            $this->forceDelete();
            return;
        }

        $this->delete();
    }

}

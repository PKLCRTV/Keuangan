<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perkiraan extends Model
{
	protected $table = 'perkiraan';

	protected $fillable = ['kode_perkiraan', 'keterangan'];

    public function kas()
    {
    	// perkiraan dimiliki banyak kas
        return $this->hasMany('App\Kas', 'perkiraan_id');
    }
}

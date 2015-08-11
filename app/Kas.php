<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    protected $table = 'kas';
    protected $fillable = ['perkiraan_id', 'tanggal', 'keterangan', 'status', 'jumlah'];

    public function perkiraan()
    {
    	// kas harus memiliki perkiraan_id
    	return $this->belongsTo('App\Perkiraan');
    }
}

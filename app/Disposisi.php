<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = 'disposisi';

    protected $primaryKey = 'id_disposisi';

    public function sm()
	{
	   return $this->belongsTo(SuratMasuk::class, 'id_sm');
	}
}

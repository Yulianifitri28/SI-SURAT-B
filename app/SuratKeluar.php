<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'suratkeluars';

    protected $primaryKey = 'id_sk';

    public function jenis()
	{
	   return $this->belongsTo(JenisSurat::class, 'id_jenis_surat');
	}
	public function us()
	{
	   return $this->belongsTo(User::class, 'id_user');
	}
}

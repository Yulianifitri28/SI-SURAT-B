<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'suratmasuks';

    protected $primaryKey = 'id_sm';

    public function jenis()
	{
	   return $this->belongsTo(JenisSurat::class, 'id_surat');
	}
	public function us()
	{
	   return $this->belongsTo(User::class, 'id_user');
	}

}

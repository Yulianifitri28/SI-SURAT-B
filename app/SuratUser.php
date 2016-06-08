<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratUser extends Model
{
    protected $table = 'surat_user';

    public $timestamps = false;

    public function sur()
	{
	   return $this->belongsTo(SuratKeluar::class, 'id_sk');
	}

	public function us()
	{
	   return $this->belongsTo(User::class, 'id_user');
	}
}

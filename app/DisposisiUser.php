<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisposisiUser extends Model
{
    protected $table = 'disposisi_user';

    public $timestamps = false;

    public function disp()
	{
	   return $this->belongsTo(Disposisi::class, 'id_disposisi');
	}
	public function us()
	{
	   return $this->belongsTo(User::class, 'id_user');
	}
}

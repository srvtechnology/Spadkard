<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add_user_card extends Model
{
    use HasFactory;
    //added_user

    protected $table = 'added_user';
	protected $guarded = [];

	public function temp_img(){
        return $this->hasOne('App\Models\TemplateModel', 'id', 'template_id');
    }
}

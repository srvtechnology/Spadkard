<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RePrintModel extends Model
{
    use HasFactory;
    //re_print_req
      protected $table = 're_print_req';
	protected $guarded = [];

	public function temp_img(){
        return $this->hasOne('App\Models\TemplateModel', 'id', 'template_id');
    }

       public function userDetails(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}

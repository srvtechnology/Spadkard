<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_to_temp extends Model
{
    use HasFactory;
     protected $table = 'user_to_template';
	protected $guarded = [];

	public function temp_img(){
        return $this->hasOne('App\Models\TemplateModel', 'id', 'template_id');
    }

    public function userDetails(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function material_details(){
        return $this->hasOne('App\Models\Material_type', 'id', 'material_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateAddedUser extends Model
{
    use HasFactory;

     protected $table = 'corporate_added_user';
	protected $guarded = [];

	  public function ProfileDetails(){
        return $this->hasOne('App\Models\ProfileModel', 'id', 'profile_id');
    }
    public function temp_img(){
        return $this->hasOne('App\Models\TemplateModel', 'id', 'template_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HtmlModel extends Model
{
    use HasFactory;

    protected $table = 'html';
	protected $guarded = [];

	 public function temp_details(){
        return $this->hasOne('App\Models\TemplateModel', 'id', 'temp_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DummyText extends Model
{
    use HasFactory;
    //dummy_text
     protected $table = 'dummy_text';
	protected $guarded = [];
}

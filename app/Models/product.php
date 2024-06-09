<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class product extends Model{

use HasFactory;

protected $table = 'product';

public $primaryKey = 'id';

protected $attributes = ['hidden'=>1,'hot'=>0,'view'=>0];

protected $dates = ['date'];

protected $fillable = ['name', 'price','promotional_price','producer_id',

'image', 'date','hot', 'view','hidden','nature', 'color', 'weight', 'description',];

}

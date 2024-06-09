<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class producer extends Model {

use HasFactory;

protected $table = 'producer';

public $primaryKey = 'id';

protected $attributes = ['hidden'=>0,'order'=>1];

protected $dates = [];

protected $fillable = ['name', 'order','hidden'];

}
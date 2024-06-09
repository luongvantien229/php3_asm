<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class comment extends Model
{

    use HasFactory;

    protected $table = 'comment';

    public $primaryKey = 'id';

    protected $attributes = [];

    protected $dates = ['date'];

    protected $fillable = ['id_sp', 'id_user', 'content', 'date', 'hidden'];
    public function User(): BelongsTo
    {

        return $this->belongsTo(User::class, 'id_user');
    }
}

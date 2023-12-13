<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'producers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
    ];
}

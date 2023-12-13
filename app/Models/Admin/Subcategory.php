<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subcategories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_category',
        'name',
        'description',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TranslatableTrait;

class Multilang extends Model
{
    use HasFactory;
    use TranslatableTrait;

    protected $table = 'multilang';

    protected $fillable = [
        'name',
        'description',
        'content',
        'type'
    ];

    public $translatable = [
        'name',
        'description',
        'content',
    ];
}

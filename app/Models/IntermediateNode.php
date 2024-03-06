<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intermediateNode extends Model
{
    use HasFactory;
    protected $fillable = [
        'left_child_id','right_child_id','hash'
    ];
}

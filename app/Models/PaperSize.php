<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaperSize extends Model
{
    use HasFactory;
    protected $table = 'paper_sizes';
    protected $guarded = [];

}

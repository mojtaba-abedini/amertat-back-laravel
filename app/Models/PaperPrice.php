<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaperPrice extends Model
{
    use HasFactory;
    protected $table = 'paper_prices';
    protected $guarded = [];
}

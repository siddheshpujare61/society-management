<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory;

    public $table = 'society';
    public $fillable = ['id', 'name', 'established_date', 'developer', 'consultant', 'agency', 'building_info','address', 'uploaded_document','status'];
}

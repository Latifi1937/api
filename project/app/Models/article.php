<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'descreption'];
}

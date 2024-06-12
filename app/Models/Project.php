<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_name',
        'project_description',
        'github_link',
        'slug',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}

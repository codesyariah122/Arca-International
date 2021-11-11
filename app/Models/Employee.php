<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $table = 'employees';
    protected $fillable = [
    	'name',
    	'honor'
    ];

    public function projects()
    {
    	return $this->belongsToMany('App\Models\Project');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $table = "projects";

    protected $fillable = [
    	'payout',
    	'percentage'
    ];

    public function employees()
    {
    	return $this->belongsToMany('App\Models\Employee');
    }
}

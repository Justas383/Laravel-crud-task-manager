<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    public $fillable = ['task_name', 'task_description', 'status_id'];
    public function status(){
        return $this->belongsTo('\App\Models\status');
    }
}

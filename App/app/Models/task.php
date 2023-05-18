<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

//    protected $casts = [
//        'Description' => 'array'
//    ];

    protected $fillable = [
        'name',
        'deadline',
        'status',
        'list_id',
        'Description'
    ];

    public function todolist(){
        return $this->belongsTo(todolist::class,'list_id');
    }


}

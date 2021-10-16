<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentMarks extends Model
{
    public function student(){
    	return $this->belongsTo(User::class, 'student_id','id');
    }
}

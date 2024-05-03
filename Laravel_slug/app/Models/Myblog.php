<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Myblog extends Model
{
    use HasFactory;
    use SoftDeletes;

    //protected $fillable = ['title','subtitle','user_id','body_content','slug'];
    protected $guarded = [];

    public function getComments(){
       return $this->hasMany(Comments::class,'myblog_id','id');
    }
}

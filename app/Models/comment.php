<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'comments';
    protected $connection = 'mysql';
    protected $guarded = ['id'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function subcomments(){
        return $this->hasMany(subComment::class,'comment_id');
    }
}

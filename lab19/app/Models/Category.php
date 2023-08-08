<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories'; 
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'creator_id'
    ];


    public function products()
    {
        
        return $this->hasMany(Product::class, 'category_id', 'id');
       
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    
}

<?php

namespace App\Models\BaseModels;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'db_products';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'SKU',
        'name',
        'brand',
        'category_id',
        'prototypes',
        'description',
        'unitName',
        'unitValue',
        'buyPrice',
        'images',
        'status' ,
        'tags',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ]; 
}

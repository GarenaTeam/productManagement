<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template_ProductModel extends Model
{
    public static function getTemplateByCategoryId($id, $columns = ['*']){
    	return Template_ProductModel::where('id', $id);
    }
}

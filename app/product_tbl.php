<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_tbl extends Model
{
    protected $table = "product_tbls";
    protected $primaryKey = 'product_id';



    public function category(){
        return $this->belongsTo('App\category_tbl','category_id','id');
    }

    public function brand(){
        return $this->belongsTo('App\manufactor_tbl','manufactor_id','id');
    }
}

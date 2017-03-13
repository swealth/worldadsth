<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillboardPic extends Model
{
    //
    protected $table = 'billboards_pics';
    protected $fillable = ['billboard_id','pic_name','pic_status'];
}

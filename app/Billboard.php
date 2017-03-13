<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billboard extends Model
{
    //
    protected $table = 'billboards';
    protected $fillable = ['user_id','title','billboardtype','billboardroad','billboardsize','billboardlight','billboardflip','billboardcost','vat','tax','light','contact','moreinfo','lat','lng','default_pic'];
}

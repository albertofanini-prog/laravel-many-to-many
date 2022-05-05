<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        //percorso, tabella, foreign key che serve, foreign key del model da cui proviene
        return $this->belongsToMany('App\Post', 'post_tag','tag_id', 'post_id');
    }
}

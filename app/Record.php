<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'profile_id' => 'required',
        'edited_at' => 'required',
        );
    
    // こちらも書くことによりProfileモデル<->Recordモデルで関連漬けができる
    public function profile() {
        return $this->belongsTo('App\Profile');
    }
    
}

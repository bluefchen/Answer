<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Question;

class Test extends Model
{
    //

    /**
     * 获取该测试的用户
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('User');        
    }

    /**
     * 返回一张试卷对应的题目
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions()
    {
        return $this->belongsToMany('Question');
    }
}

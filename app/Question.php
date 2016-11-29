<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable=['title','optionA','optionB','optionC','optionD','tags','answer','useranswer'];

    /**
     * 返回问题对应的标签
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * 返回问题对应的测试
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tests()
    {
        return $this->belongsToMany('App\Test');
    }
}

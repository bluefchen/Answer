<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Question;

class Test extends Model
{
    //

    protected $guarded=['id'];
    /**
     * 获取该测试的用户
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');        
    }

    /**
     * 返回一张试卷对应的题目
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions()
    {
        return $this->belongsToMany('App\Question');
    }

    /**
     * 根据不同方式生成题目的id
     * @param int $testType :生成方式，表示随机，1表示顺序
     * @param int $totalNumber：题目数目
     * @return array|mixed
     */
    public static function generateQuestion($testType=0,$totalNumber=5)
    {

        switch($testType){
            case 0:
                $question_all=Question::lists('answer','id')->toArray();
                $question_ids=array_rand($question_all,$totalNumber);

                break;
            case 1:
                $question_all=Question::lists('id')->toArray();
                $question_ids=array_slice($question_all,0,$totalNumber);
                break;
            default:
                $question_all=Question::lists('answer','id')->toArray();
                $question_ids=array_rand($question_all,$totalNumber);
                break;
        }
        
        $key=range(1,$totalNumber);
        return array_combine($key,$question_ids);//返回键值从1开始的关联数组

    }
}

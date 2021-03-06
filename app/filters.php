<?php
/**
 * Created by PhpStorm.
 * User: Zhousilu
 * Date: 2017/1/11
 * Time: 11:21
 */

namespace App;

//定义过滤器
Route::filter('weixin', function()
{
    // 获取到微信请求里包含的几项内容
    $signature = Input::get('signature');
    $timestamp = Input::get('timestamp');
    $nonce     = Input::get('nonce');

    // ninghao 是我在微信后台手工添加的 token 的值
    $token = 'ninghao';

    // 加工出自己的 signature
    $our_signature = array($token, $timestamp, $nonce);
    sort($our_signature, SORT_STRING);
    $our_signature = implode($our_signature);
    $our_signature = sha1($our_signature);

    // 用自己的 signature 去跟请求里的 signature 对比
    if ($our_signature != $signature) {
        return false;
    }
});
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsers extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'uname'=>'required|unique:users|regex:/^[a-zA-Z]{1}[\w]{1,17}$/',
            'pwd'=>'required|regex:/^[\w]{2,18}$/',
            'repwd'=>'required|same:pwd',
            'email'=>'required|email',
            'phone'=>'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
            'profile'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'uname.required'=>'用户名必填',
            'uname.regex'=>'用户名格式错误',
            'uname.unique'=>'用户名已存在',
            'pwd.required'=>'密码错误',
            'pwd.regex'=>'密码格式错误',
            'repwd.required'=>'再出输入密码必填',
            'repwd.same'=>'两次密码输入不一致',
            'email.required'=>'邮箱必填',
            'email.email'=>'邮箱格式错误',
            'phone.required'=>'手机号必填',
            'phone.regex'=>'手机号格式错误',
            'profile.required'=>'头像必选'
        ];
    }
}

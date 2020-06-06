<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;


class UserController extends Controller
{
    // 登录验证
    public function loginCheck(User $m_user ,Request $request){

        $this->validate(\request(),[
            'userID' => 'required|string|max:15|min:1',
            'password'  => 'required|string|max:30|min:3',
        ]);

        $userID  = (int)request('userID') ;
        $password  = request('password') ;

        $result = $m_user->where([
            [ 'id', '=' , $userID ],
            [ 'password', '=' , $password ]
        ])->exists();
        dd($result);

        if($result) $m_user->logged = $result ;
        return $result;

//        return redirect('/posts');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;


class UserController extends Controller
{
    // 登录验证
    public function loginCheck(User $m_user ,Request $request){
        $validator = Validator::make($request->all(), [
            'userID' => 'required|string|max:15|min:3',
            'password'  => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode($validator->getMessageBag()->toArray());
        }


        $uid = $request->userID ;
        $password = $request->password ;
        $validate = $m_user->where([
            ['id','=',$uid],
            ['password','=',$password],
        ])->exists();
//        if($validate) ; // 会话开启

        return json_encode([
            'validate' => $validate
        ]);
    }
}

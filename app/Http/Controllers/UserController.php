<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Http\Controllers\LoginController as Login;



class UserController extends Controller
{
    // 登录验证
    public function loginCheck(User $m_user ,Request $request,Login $login){
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

        // 会话开启
        if($validate) {
            $login->login($request);
        }

        return json_encode([
            'validate' => $validate
        ]);
    }
}

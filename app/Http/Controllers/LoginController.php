<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private function getRemoteIP($request){
       return $remoteIp = \request()->getClientIp();
    }
    public function login($request){
        $remoteIp = $this->getRemoteIP($request);
        // 清空session(目前仅允许单个用户)
        $this->clearAll($request);
        session([   md5( $remoteIp )  => 1 ]);
    }
    public function clearAll( $request){
        $request->session()->flush();
    }
    public function logOut( $request ){
        $remoteIP = $this->getRemoteIP($request);
        $request->session()->forget($remoteIP);
    }

    //  登录校验
    public function isLoggin($request) :bool {
        $remoteIp = $this->getRemoteIP($request);
        $uid = $request->session()->get(md5($remoteIp)) ;
        return  isset($uid)  ? true : false ;
    }

}

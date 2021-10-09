<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Controllers\Encryptor;

class admCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $admin = new Admin;
		$password = $admin->adminPasswordAuthentication;
        $key = $admin->adminKeyDecrypt;

        $receivedCode = $request->adminCodeAuthentication;

        if(!is_null($receivedCode) and $receivedCode !== 'undefined') {
            $receivedCode = json_decode($receivedCode);

            if(Encryptor::decrypt($receivedCode, $key) == $password) {
                return $next($request)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Credentials', true)
                ->header('Access-Control-Allow-Headers', 'Origin,Content-Type,X-Auth-Token');
            }
        }

        $response = "Impossível realizar sua requisição";
        return response()->json($response);
    }

}

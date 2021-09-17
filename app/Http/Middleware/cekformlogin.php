<?php

namespace App\Http\Middleware;

use Closure;

class cekformlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $value = $request->session()->get('login');
        $value2 = $request->session()->get('pengguna');
        if ($value[0] == 'yes'){
            if ($value2[0]['jenis_user'] == 'admin'){
                return redirect('/');
            }elseif ($value2[0]['jenis_user'] == 'terapis'){
                return redirect('/');
            }
        }
        return $next($request);
    }
}

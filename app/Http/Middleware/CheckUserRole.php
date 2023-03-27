<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role): Response
    {
//        $user_role = session('user_role');
//
//// Check if the user is already on the intended dashboard route
//        if (in_array(Route::currentRouteName(), ["user.dashboard", "blogger.dashboard", "admin.dashboard"])) {
//            return $next($request);
//        }
//
//// Check the user role and redirect them to the appropriate dashboard
//        switch ($user_role) {
//            case 'Admin':
//                return redirect()->route('admin.dashboard');
//                break;
//
//            case 'Blogger':
//                return redirect()->route('blogger.dashboard');
//                break;
//
//            case 'User':
//                return redirect()->route('user.dashboard');
//                break;
//
//            default:
//                return redirect('/login');
//                break;
//        }
//
//        return $next($request);
//
//    }


        $user_role = session('user_role');

        // Check if the user is authorized to access the route
        if ($user_role == $role) {
            return $next($request);
        }

        // Redirect the user to the appropriate dashboard
        switch ($user_role) {
            case 'Admin':
                return redirect()->route('admin.dashboard');
                break;

            case 'Blogger':
                return redirect()->route('blogger.dashboard');
                break;

            case 'User':
                return redirect()->route('user.dashboard');
                break;

            default:
                return redirect('/login');
                break;
        }


    }

//
//        if(Session::get('user_role')==='Admin'){
////            return $next($request);
//            return redirect('/admin-dashboard');
//        }
//        elseif (Session::get('user_role')==='Blogger'){
////            return $next($request);
//            return redirect('/blogger-dashboard');
//        }
//        elseif (Session::get('user_role')==='User'){
////            return $next($request);
//            return redirect('/user-dashboard');
//        }
//        else{
//            return redirect('/login');
//        }
//
//        return $next($request);
//    }

}

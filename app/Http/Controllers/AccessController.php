<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AccessController extends Controller
{
    public function adminLogin(Request $request)
    {
    	try
        {
        	$data = $request->all();
            // Check admin or not
            $user = User::where('email', $data['email'])->first();
            if (!$user || $user->role !== 'admin') {
                $notification = array(
                    'message' => 'Unauthorized access. Admins only.',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }

            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {

                $notification = array(
                         'message' => 'Successfully Logged In',
                         'alert-type' => 'success'
                        );

               return redirect()->route('dashboard')->with($notification);
            }
            $notification = array(
                'message' => 'Username or Password Invalid',
                'alert-type' => 'error'
            );

        return Redirect()->back()->with($notification);
	   } catch(Exception $e){
            // Log the error
            Log::error('Error in Login: ', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'line' => $e->getLine()
            ]);

            $notification=array(
                'message' => 'Something went wrong!!!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function Logout()
    {
    	try
    	{
            $redirectUrl = Auth::user()->role === 'user' ? '/user/login' : '/admin/login';
    		Auth::logout();
    		return redirect($redirectUrl);
    	} catch(Exception $e) {
            // Log the error
            Log::error('Error in Logout: ', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            $notification=array(
                'message' => 'Something went wrong!!!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Message;
use App\Models\Volunteer;
use Exception;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth_check');
    }
    public function Dashboard()
    {
    	try
    	{
            $volunteerCount = Volunteer::where('status', 'Active')->count();
            $messageCount = Message::count();
            $appointmentCount = Appointment::count();
    		return view('layouts.app', compact(
                'volunteerCount',
                'messageCount',
                'appointmentCount',
            ));
    	}catch(Exception $e){

                $message = $e->getMessage();

                $code = $e->getCode();

                $string = $e->__toString();
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }
}

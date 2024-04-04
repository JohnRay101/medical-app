<?php
 
namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $appointments = Appointment::where('patient_id', $user->id)->get();
        return view('home', compact('appointments'));
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {      
        $user = Auth::user();
        $appointmentCount = Appointment::count();
        $appointments = Appointment::all();
        return view('adminHome', compact('appointments', 'appointmentCount'));
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function staffHome()
    {
        $user = Auth::user();
        $appointmentCount = Appointment::count();
        $appointments = Appointment::all();
        return view('staffHome', compact('appointments', 'appointmentCount'));
    }
}
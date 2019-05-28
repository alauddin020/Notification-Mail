<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\User;
use Notification;
use App\Notifications\MyFirstNotification;
use App\Mail\SendEmailTest;
use Illuminate\Support\Facades\Mail;
use PDF;
use Auth;
// php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
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
        $this->sendNotification();
        return view('home');
    }
  
    public function sendNotification()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $details = [
            'name' => $user->name,
            'body' => 'This is my first notification from Localhost',
            'thanks' => 'Thank you for using',
            'actionText' => 'View My Site',
            'actionURL' => url('/')
        ];
  
        Notification::send($user, new MyFirstNotification($details));
   
        // dd('done');
    }
    public function sendMail()
    {
        $user = User::first();
        $details['email'] = $user->email;
      
         Mail::to($user->email)->send(new SendEmailTest($user));
      
        dd('done');
    }
    public function generatePDF()
    {
        $data = ['title' => 'Welcome to alauddin020.com'];
        $pdf = PDF::loadView('myPDF', $data);
  
        return $pdf->download('AlauddinF-a'.rand().'.pdf');
    }
  
}
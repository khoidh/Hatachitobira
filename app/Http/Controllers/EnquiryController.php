<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use Mail;
use App\Mail\enquiryUser;

class EnquiryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enquiry');
    }

    public function saveEnquiry(Request $request) {
        $data = $request->all();
        $thisdata = Enquiry::create($data);
        $thisUser = Enquiry::findOrFail($thisdata->id);
        Mail::send('email.enquiryAdmin',compact('thisUser'),
            function($mail) use($thisUser)
            {
                $mail->to($thisUser->email)->subject('Hatachi Toabira');
            }
        );
        $this->sendEmailUser($thisUser);
        return view('thank_enquiry');
    }

    public function sendEmailUser($thisUser)
    {
        Mail::to($thisUser['email'])->send(new enquiryUser($thisUser));
    }

}

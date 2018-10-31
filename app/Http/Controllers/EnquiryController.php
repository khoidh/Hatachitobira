<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use Mail;
use App\Mail\enquiryUser;
use Illuminate\Support\Facades\Validator;

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

        $validation =  Validator::make($data, [
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'first_name_cn' => 'required|string|max:30',
            'last_name_cn' => 'required|string|max:30',
            'company' => 'required|string|max:100',
            'email' => 'required|string|email|max:40|min:11',
            'postal_code' => 'required|integer',
            'address' => 'required|string|max:1024',
            'content' => 'required|string|max:1024',
        ]);

        if ($validation->fails()) {
            return redirect('enquiry')
                        ->withErrors($validation)
                        ->withInput();
        }else {
            $thisdata = Enquiry::create($data);

            $thisUser = Enquiry::findOrFail($thisdata->id);
            Mail::send('email.enquiryAdmin',compact('thisUser'),
               function($mail) use($thisUser)
               {
                   $mail->to($thisUser->email)->subject('Hatachi Toabira');
               }
            );
    //        $this->sendEmailUser($thisUser);
            return view('thank_enquiry');
        }
     
    }

    public function sendEmailUser($thisUser)
    {
        Mail::to($thisUser['email'])->send(new enquiryUser($thisUser));
    }

}

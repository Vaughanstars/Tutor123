<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    // public function submit(Request $request)
    // {
    //     $validated = $request->validate([
    //         'con_name' => 'required|string|max:255',
    //         'con_email' => 'required|email',
    //         'subject' => 'nullable|string|max:255',
    //         'phone' => 'nullable|string|max:20',
    //         'con_message' => 'required|string',
    //     ]);

    //     Mail::to('goleevia@gmail.com')
    //     ->send(new ContactFormMail($validated));

    //     return back()->with('success', 'Message sent successfully!');
    // }

        // public function submit(Request $request)
        // {
        // // Validate the form
        //     $validated = $request->validate([
        //         'con_name' => 'required|string|max:255',
        //         'con_email' => 'required|email',
        //         'subject' => 'nullable|string|max:255',
        //         'phone' => 'nullable|string|max:20',
        //         'con_message' => 'required|string',
        //     ]);

        // // Get recipient email from SiteSettings
        //     $settings = SiteSetting::first();
        //     $recipient = $settings?->contact_email ?? 'goleevia@gmail.com';

        // // Send the email
        //     Mail::to($recipient)->send(new ContactFormMail($validated));

        //     return back()->with('success', 'Your message has been sent successfully!');
        // }

    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
            'phone'   => 'required|string|max:20',
            'grade' => 'nullable|string|max:255',
            'learning_format' => 'required|in:online,inperson',
            'time_contact'    => 'required|in:morning,afternoon,evening,anytime',
        ]);
        //dd($request->all());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Please fill all the required fields.'
            ], 422);
        }

    // Send the email

        // Get recipient email from SiteSettings
        $settings = SiteSetting::first();
        $recipient = $settings?->contact_email ?? 'goleevia@gmail.com';
        Mail::to($recipient)->send(new ContactFormMail($request->all()));

        return response()->json([
            'message' => 'Your message has been sent successfully!'
        ]);
    }

}
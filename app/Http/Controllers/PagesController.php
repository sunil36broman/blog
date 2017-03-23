<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Route;
use Session;
use Mail;

class PagesController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
    	return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout(){
    	$first="sunil";
    	$last="chandra";
    	$fullname=$first." ".$last;
    	$data=[];
    	$data['fullname']=$fullname;

    	return view('pages.about')->withData($data);
    } 

    public function getContact(){
    	return view('pages.contact');
    }

    public function postContact(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'subject'=>'min:3',
            'message'=>'min:10'
            ]);
        $data = array(
            'email' => $request->email,
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message
            );
        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('padipetta@gmail.com');
            $message->subject($data['subject']);
        });
        Session::flash('success', 'Your email was send');
        return redirect('/');
    } 
}
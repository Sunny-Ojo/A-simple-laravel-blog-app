<?php

namespace App\Http\Controllers;

use App\message;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['contact']]);
    }
    public function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'attachment' => 'image | nullable | max:1999',
        ]);
        if ($request->hasFile('attachment')) {
            $imagefullname = $request->file('attachment')->getClientOriginalName();
            $imageext = $request->file('attachment')->getClientOriginalExtension();
            $imagename = pathinfo($imagefullname, PATHINFO_FILENAME);
            $imagetodb = $imagename . '_' . time() . '.' . $imageext;
            $path = $request->file('attachment')->storeAs('public/images', $imagetodb);

        } else {
            $path = 'noimage.jpg';
        }

        $msg = new message();
        $msg->name = $request->name;
        $msg->email = $request->email;
        $msg->message = $request->message;
        if ($request->hasfile('attachment')) {
            $msg->attachment = $imagetodb;
        }
        $msg->save();
        return redirect('/posts')->with('success', 'Message sent successfully');
        // return Mail::to($msg->email)->send(new reply);
    }
    public function messages()
    {
        $msg = message::orderBy('created_at', 'desc')->paginate(5);
        return view('/messages')->with('msg', $msg);

    }
    public function destroy($id)
    {
        $msg = message::find($id);
        $msg->delete();
        return redirect('/messages')->with('success', 'Message deleted successfully');
    }
}
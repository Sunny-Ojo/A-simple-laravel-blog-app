<?php

namespace App\Http\Controllers;

use App\message;
use App\User;
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
            'email' => 'required | email',
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
        $msg->user_id = auth()->user()->id;
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('/messages')->with('msg', $user->message);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msg = message::find($id);
        $msg->delete();
        return redirect('/messages')->with('success', 'message deleted successfully');
    }
}
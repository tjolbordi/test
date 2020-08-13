<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\EmployedType;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class ApplicanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('applicants', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $employedTypeId = EmployedType::where('title', '=', 'employed')->first();

        User::whereId($id)->update([
            'employed_type_id' => $employedTypeId->id,
        ]);
        return redirect('applicants');
    }

    public function registration(Request $request){
    
        $this->validate($request, [
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'last_name'     => 'required|string|max:255',
            'phone_number'  => 'string|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users',
        ]);

        $employedTypeId = EmployedType::where('title', '=', 'unemployed')->first();

        User::create([
            'name'              => $request->name,
            'last_name'         => $request->last_name,
            'email'             => $request->email,
            'phone_number'      => $request->phone_number,
            'employed_type_id'  => $employedTypeId->id,
        ]);

        $user = User::where('email', '=', $request->email)->first();

        $generatedUrl = URL::temporarySignedRoute(
            'activator', now()->addMinutes(120), ['user' => $user->id]
        );

        Mail::to($request->email)->send(new TestEmail($generatedUrl));

        return view('activate');
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
        //
    }
}

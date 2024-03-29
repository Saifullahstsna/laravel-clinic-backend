<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    //index
    public function index(Request $request)
    {
        $doctors = DB::table('doctors')
            ->when($request->input('name'), function ($query, $doctor_name) {
                return $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.doctors.index', compact('doctors'));
    }

    //create
    public function create()
    {
        return view('pages.doctors.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_email' => 'required|email',
            'doctor_phone' => 'required',
            'doctor_address' => 'required',
            'sip' => 'required',
        ]);

        DB::table('doctors')->insert([
            'doctor_name' => $request->doctor_name,
            'doctor_specialist' => $request->doctor_specialist,
            'doctor_email' => $request->doctor_email,
            'doctor_phone' => $request->doctor_phone,
            'doctor_address' => $request->doctor_address,
            'sip' => $request->sip,
        ]);

        return redirect()->route('doctors.index')->with('succes', 'Doctor created succesfully.');
    }

    //show
    public function show($id)
    {
        $doctor = DB::table('doctors')->find($id);
        return view('pages.doctors.show', compact('doctor'));
    }

    //edit
    public function edit($id)
    {
        $doctor = DB::table('doctors')->find($id);
        return view('pages.doctors.edit', compact('doctor'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_email' => 'required|email',
            'doctor_phone' => 'required',
            'doctor_address' => 'required',
            'sip' => 'required',
        ]);

        DB::table('doctors')->insert([
            'doctor_name' => $request->doctor_name,
            'doctor_specialist' => $request->doctor_specialist,
            'doctor_email' => $request->doctor_email,
            'doctor_phone' => $request->doctor_phone,
            'doctor_address' => $request->doctor_address,
            'sip' => $request->sip,
        ]);

        return redirect()->route('doctors.index')->with('succes', 'Doctor created succesfully.');
    }

    //destroy
    public function destroy($id)
    {
        DB::table('doctors')->delete($id);
        return redirect()->route('doctors.index')->with('succes', 'Doctor created succesfully.');
    }
}


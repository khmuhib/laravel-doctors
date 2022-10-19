<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    
    public function index()
    {
        $doctors = DB::table('doctors')->where('status', '0')->get();
        $diseases =  DB::table('diseases')->where('status', '0')->get();
        $doctorCategories =  DB::table('doctor_categories')->where('status', '0')->value('name')->get();
        
        return view('page.admin.doctor.index', compact('doctors', 'diseases', 'doctorCategories'));
    }

    
    public function create()
    {
        $doctorCategories =  DB::table('doctor_categories')->where('status', '0')->get();
        $diseases =  DB::table('diseases')->where('status', '0')->get();
        return view('page.admin.doctor.create', compact('doctorCategories', 'diseases'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200|min:3|unique:doctors',
            'email' => 'required|email|unique:doctors',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024|nullable',
            'phone' => 'required|numeric|digits:11',
            'reg_no' => 'required|string|max:200|unique:doctors',
            'current_job_location' => 'required|string|max:1000',
            'disease_id' => 'required',
            'doctor_category_id' => 'required',
        ]);

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1000, 9999) . '.' . $extension;
            $file->move('uploads/', $filename);
            $request->image = $filename;
        }

 

        $date = new DateTime('now');

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'reg_no' => $request->reg_no,
            'current_job_location' => $request->current_job_location,
            'disease_id' => $request->disease_id,
            'doctor_category_id' => $request->doctor_category_id,
            'status' => $request->status == true ? '1' : '0',
            'image' => $request->image,
            'created_at' => $date,
        );

        $input = $request['disease_id'];

        $data['disease_id'] = implode(',', $input);

        //dd($data);

        $result = DB::table('doctors')->insert($data);

        return redirect()->route('admin.doctor.index')->with('status', 'Doctor Inserted Successfully');


    }

    
    public function show(Doctor $doctor)
    {
        //
    }

    
    public function edit(Doctor $doctor)
    {
        //
    }

    
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    
    public function destroy(Doctor $doctor)
    {
        //
    }
}

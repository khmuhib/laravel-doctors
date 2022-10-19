<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\DoctorCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{

    public function index()
    {
        $diseases =  DB::table('diseases')->where('status', '0')->get();
        $doctors = Doctor::all();
        $doctorCategories = DoctorCategory::all();
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

        $doctor = [];

        $doctor['name'] = $request->name;
        $doctor['email'] = $request->email;
        $doctor['phone'] = $request->phone;
        $doctor['reg_no'] = $request->reg_no;
        $doctor['current_job_location'] = $request->current_job_location;
        $doctor['disease_id'] = $request->disease_id;
        $doctor['doctor_category_id'] = $request->doctor_category_id;
        $doctor['email'] = $request->email;
        $doctor['status'] = $request->status == true ? '1' : '0';

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1000, 9999) . '.' . $extension;
            $file->move('uploads/doctor/', $filename);
            $doctor['image'] = $filename;
        }

        $input = $request['disease_id'];
        $doctor['disease_id'] = implode(',', $input);
        DB::table('doctors')->insert($doctor);
        return redirect()->route('admin.doctor.index')->with('status', 'Doctor Inserted Successfully');
    }


    public function show(Doctor $doctor)
    {
        //
    }


    public function edit($id)
    {
        $doctor = DB::table('doctors')->where('id', $id)->first();
        $diseases =  DB::table('diseases')->where('status', '0')->get();
        $doctorCategories =  DB::table('doctor_categories')->where('status', '0')->get();
        return view('page.admin.doctor.edit', compact('doctor', 'diseases', 'doctorCategories'));
    }


    public function update(Request $request, $id)
    {
        $doctor = DB::table('doctors')->find($id);

        //dd($request->all());

        $request->validate([
            'name' => 'required|string|max:200|min:3',
            'email' => 'required|email',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024|nullable',
            'phone' => 'required|numeric|digits:11',
            'reg_no' => 'required|string|max:200',
            'current_job_location' => 'required|string|max:1000',
            'disease_id' => 'required',
            'doctor_category_id' => 'required',
        ]);

        $doctor = [];

        $doctor['name'] = $request->name;
        $doctor['email'] = $request->email;
        $doctor['phone'] = $request->phone;
        $doctor['reg_no'] = $request->reg_no;
        $doctor['current_job_location'] = $request->current_job_location;
        $doctor['disease_id'] = $request->disease_id;
        $doctor['doctor_category_id'] = $request->doctor_category_id;
        $doctor['email'] = $request->email;
        $doctor['status'] = $request->status == true ? '1' : '0';

        // if ($image = $request->file('image')) {
        //     $destinationPath = 'uploads/doctor/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $doctor['image'] = "$profileImage";
        // }else{
        //     unset($doctor['image']);
        // }

        // if ($request->hasFile('image')) {
        //     // Delete old avatar
        //     if ($doctor->image) {
        //         Storage::delete($doctor->image);
        //     }
        //     // Store avatar
        //     $avatar_path = $request->file('employee_photo')->store('employees', 'public');
        //     // Save to Database
        //     $doctor->image = $avatar_path;
        // }

        if($request->hasfile('image'))
        {
            $destination = 'uploads/doctor/'.$doctor['image'] = $request->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().rand(1000, 9999).'.'.$extension;
            $file->move('uploads/doctor/', $filename);
            $doctor['image'] = $filename;
        }

        $input = $request['disease_id'];
        $doctor['disease_id'] = implode(',', $input);
        DB::table('doctors')->where('id', $id)->update($doctor);
        return redirect()->route('admin.doctor.index')->with('status', 'Doctor Update Successfully');
    }


    public function delete($id)
    {
        $doctor = DB::table('doctors')->find($id);
        $destination = 'uploads/doctor/' . $doctor->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        DB::table('doctors')->where('id', $id)->delete();

        return redirect()->route('admin.doctor.index')->with('status', 'Doctor Deleted Successfully');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('page.admin.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.admin.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200|min:3|unique:patients',
            'email' => 'required|email|unique:patients',
            'phone' => 'required|numeric|digits:11|unique:patients',
            'nid' => 'required|numeric|unique:patients',
            'gender' => 'required',
            'blood_group' => 'required',
            'dob' => 'required',
            'password' => 'required|min:8',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024|nullable',
        ]);

        $patient = [];

        $patient['name'] = $request->name;
        $patient['email'] = $request->email;
        $patient['phone'] = $request->phone;
        $patient['nid'] = $request->nid;
        $patient['gender'] = $request->gender;
        $patient['blood_group'] = $request->blood_group;
        $patient['dob'] = $request->dob;
        $patient['password'] = $request->password;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1000, 9999) . '.' . $extension;
            $file->move('uploads/patient/', $filename);
            $patient['image'] = $filename;
        }

        //dd($request);

        DB::table('patients')->insert($patient);
        return redirect()->route('admin.patient.index')->with('status', 'Patient Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = DB::table('patients')->where('id', $id)->first();
        return view('page.admin.patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doctor = DB::table('patients')->find($id);
        $doctosoldimage=$doctor->image;

        $request->validate([
            'name' => 'required|string|max:200|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:11',
            'nid' => 'required|numeric',
            'gender' => 'required',
            'blood_group' => 'required',
            'dob' => 'required',
            'password' => 'required|min:8',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024|nullable',
        ]);

        //dd($request);

        $olddata = Patient::where('id',$id)->where('name',$request->name)->orWhere('email', $request->email)->orWhere('phone', $request->phone)->orWhere('nid', $request->nid)->first();

        if(empty($olddata)){
            $request->validate([
                'name' => 'required|string|max:200|min:3|unique:patients',
                'email' => 'required|email|unique:patients',
                'phone' => 'required|numeric|digits:11|unique:patients',
                'nid' => 'required|numeric|unique:patients',
            ]);
        }

        //dd($request);

        $patient = [];

        $patient['name'] = $request->name;
        $patient['email'] = $request->email;
        $patient['phone'] = $request->phone;
        $patient['nid'] = $request->nid;
        $patient['gender'] = $request->gender;
        $patient['blood_group'] = $request->blood_group;
        $patient['dob'] = $request->dob;
        $patient['password'] = $request->password;

        if($request->hasfile('image'))
        {
            if($doctosoldimage !=null){
                unlink("uploads/patient/".$doctosoldimage);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().rand(1000, 9999).'.'.$extension;
            $file->move('uploads/patient/', $filename);
            $patient['image'] = $filename;
        }

        //dd($patient);

        DB::table('patients')->where('id', $id)->update($patient);
        return redirect()->route('admin.patient.index')->with('status', 'Patient Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $patient = DB::table('patients')->find($id);
        $destination = 'uploads/patient/' . $patient->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        DB::table('patients')->where('id', $id)->delete();

        return redirect()->route('admin.patient.index')->with('status', 'Patient Deleted Successfully');

    }

    public function muhib() {
        $test = DB::select('call doctors_info(16)');
        dd($test);
    }

}

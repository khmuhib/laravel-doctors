<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DiseaseController extends Controller
{

    public function index()
    {
        $diseases = DB::table('diseases')->get();
        return view('page.admin.disease.index', compact('diseases'));
    }

    public function create()
    {
        return view('page.admin.disease.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:200|min:3',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024|nullable',
            'description' => 'required|string|max:5000|min:3',
        ]);

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . rand(1000, 9999) . '.' . $extention;
            $file->move('uploads/', $filename);
            $request->image = $filename;
        }

        $date = new DateTime('now');

        $data = array(
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? '1' : '0',
            'image' => $request->image,
            'created_at' => $date,
        );

        $result = DB::table('diseases')->insert($data);

        return redirect()->route('admin.disease.index')->with('status', 'Disease Inserted Successfully');
    }


    public function show(Disease $disease)
    {
        //
    }


    public function edit($id)
    {
        //$disease = DB::table('diseases')->find($id);
        $disease = DB::table('diseases')->find($id);
        return view('page.admin.disease.edit', compact('disease'));
    }


    public function update(Request $request, $id)
    {
        $disease = DB::table('diseases')->find($id);

        $request->validate([
            'name' => 'required|string|max:200|min:3',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024|nullable',
            'description' => 'required|string|max:5000|min:3',
        ]);

        $date = new DateTime('now');

        if ($request->hasfile('image')) {

            $destination = 'uploads/' . $disease->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . rand(1000, 9999) . '.' . $extention;
            $file->move('uploads/', $filename);
            $request->image = $filename;
        }

        $disease = array(
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? '1' : '0',
            'updated_at' => $date,
            'image' => $request->image,
        );

        $result = DB::table('diseases')->where('id', $id)->update($disease);

        return redirect()->route('admin.disease.index')->with('status', 'Disease Updated Successfully');
    }


    public function delete($id)
    {
        $disease = DB::table('diseases')->find($id);

        $destination = 'uploads/' . $disease->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $result = DB::table('diseases')->where('id', $id)->delete();

        return redirect()->route('admin.disease.index')->with('message', 'Disease Deleted Successfully');
    }
}

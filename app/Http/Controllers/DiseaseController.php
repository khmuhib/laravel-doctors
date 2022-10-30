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
            'name' => 'string|max:200|min:3|unique:diseases|nullable',
            'name_bn' => 'string|max:200|min:3|unique:diseases|nullable',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024|nullable',
            'description' => 'string|max:5000|min:3|nullable',
            'description_bn' => 'string|max:5000|min:3|nullable',
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
            'description' => $request->description,
            'description_bn' => $request->description_bn,
            'name_bn' => $request->name_bn,
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
        $disease = DB::table('diseases')->where('id', $id)->first();
        return view('page.admin.disease.edit', compact('disease'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:200|min:3|nullable',
            'name_bn' => 'string|max:200|min:3|nullable',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024|nullable',
            'description' => 'string|max:5000|min:3|nullable',
            'description_bn' => 'string|max:5000|min:3|nullable',
        ]);

        $olddata = Disease::where('id',$id)->where('name',$request->name)->first();

        if(empty($olddata)){
            $request->validate([
                'name' => 'string|max:200|min:3|unique:diseases',
                'name_bn' => 'string|max:200|min:3|unique:diseases',
            ]);
        }

        $disease = Disease::find($id);
        $disease->name = $request->name;
        $disease->description = $request->description;
        $disease->status = $request->status == true ? '1' : '0';


        if($request->hasfile('image'))
        {
            $destination = 'uploads/'.$disease->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().rand(1000, 9999).'.'.$extension;
            $file->move('uploads/', $filename);
            $disease->image = $filename;
        }

        //dd($disease);
        $disease->update();

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

        return redirect()->route('admin.disease.index')->with('status', 'Disease Deleted Successfully');
    }
}

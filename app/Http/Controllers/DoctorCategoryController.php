<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Models\DoctorCategory;
use Illuminate\Support\Facades\DB;

class DoctorCategoryController extends Controller
{

    public function index()
    {
        $doctorCategories = DB::table('doctor_categories')->get();
        return view('page.admin.doctor_category.index', compact('doctorCategories'));
    }


    public function create()
    {
        return view('page.admin.doctor_category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200|min:3|unique:doctor_categories',
        ]);

        for ($i=7; $i <= 5000 ; $i++) {
                $array[] =[
                    'name' => 'CategoryTest'.$i,
                    'status' => 0,
                ] ;
            };
            DoctorCategory::insert($array);



        $date = new DateTime('now');

        $data = array(
            'name' => $request->name,
            'status' => $request->status == true ? '1' : '0',
            'created_at' => $date,
        );

        //dd($data);

        $result = DB::table('doctor_categories')->insert($data);

        return redirect()->route('admin.doctor.category.index')->with('status', 'Doctor Category Inserted Successfully');

    }

    public function show(DoctorCategory $doctorCategory)
    {
        //
    }


    public function edit($id)
    {
        $doctorCategory = DB::table('doctor_categories')->find($id);
        //$doctorCategory = DoctorCategory::find($id);
        return view('page.admin.doctor_category.edit', compact('doctorCategory'));
        //dd($doctorCategory);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:200|min:3',
        ]);

        $doctorCategory = DoctorCategory::find($id);

        $doctorCategory->name = $request->name;
        $doctorCategory->status = $request->status == true ? '1' : '0';

        $doctorCategory->update();

        return redirect()->route('admin.doctor.category.index')->with('status', 'Doctor Category Updated Successfully');
    }


    public function delete($id)
    {

        $doctorCategory = DB::table('doctor_categories')->find($id);
        $result = DB::table('doctor_categories')->where('id', $id)->delete();

        return redirect()->route('admin.doctor.category.index')->with('status', 'Doctor Category Deleted Successfully');
    }
}

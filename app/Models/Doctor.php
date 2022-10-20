<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'disease_id',
        'doctor_category_id',
        'name',
        'reg_no',
        'current_job_location',
        'phone',
        'email',
        'phone',
        'image',
        'status',
    ];

    public function category() {
        return $this->belongsTo(DoctorCategory::class, 'doctor_category_id');
    }



    public function getDoctorCategoryName() {
        if($this->category) {
            return $this->category->name;
        }
    }





}

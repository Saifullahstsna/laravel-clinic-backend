<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    //   //doctor_name
    //   $table->string('doctor_name');
    //   //doctor_specialist
    //   $table->string('doctor_specialist');
    //   //doctor_email
    //   $table->string('doctor_email');
    //   //doctor_phone
    //   $table->string('doctor_phone');
    //   //photo
    //   $table->string('photo')->nullable();
    //   //doctor_address
    //   $table->string('doctor_address')->nullable();
    //   //sip
    //   $table->string('sip')->nullable();

    protected $fillable = [
        'doctor_name',
        'doctor_specialist',
        'doctor_email',
        'doctor_phone',
        'photo',
        'doctor_address',
        'sip',
    ];
}

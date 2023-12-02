<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboardAdmin(){
        return view("dashboard");
      
      }

      public function dashboardTeacher(){
        return view("dashboard");
      
      }
}

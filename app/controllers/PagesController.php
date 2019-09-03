<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    public function home()
    {
        return view('index');
    }

    public function student()
    {
        $students = App::get('database')->selectAll('students');
        return view('student', [
            'students' => $students,
            'count' => 1
        ]);
    }

    public function login()
    {
        if(isset($_SESSION['login'])){
            return redirect('');
        } else {
            return view('login');
        }
    }
}
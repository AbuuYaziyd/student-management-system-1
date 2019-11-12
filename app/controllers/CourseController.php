<?php
namespace App\Controllers;

use App\Core\App;
use App\Core\csrf;

class CourseController
{
    public function add_form()
    {
        return view('addCourse');
    }

    public function add_course()
    {
        if(csrf::checkToken($_POST[csrf_token], 'courseForm')) {
            App::get('database')->insert('courses',[
                'name' => $_POST['name'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date']
            ]);
        } 
        else {
            die('csrf is done high risk');
        }
        

        return redirect('course/running-course');
    }

    public function running_course()
    {
        $running_courses = App::get('database')->running_course_with_students();

        return view('runningCourse', [
            'courses' => $running_courses,
            'count' => 1
        ]);
    }

    public function past_course()
    {
        $past_courses = App::get('database')->past_course_with_students();
        
        return view('pastCourse', [
            'courses' => $past_courses,
            'count' => 1
        ]);
    }
}
<?php
namespace App\Controllers;

use App\Core\App;

class StudentController
{
    public function add_form()
    {
        $running_courses = $this->running_courses();

        return view('addStudent', ['courses' => $running_courses]);
    }

    public function add_student()
    {
        $photo = $this->convert_photo_to_new_name();
        $student = $this->query_student();
        if($student == false){
            App::get('database')->insert('students',[
                'name' => $_POST['name'],
                'address' => $_POST['address'],
                'phone_no' => $_POST['phone_no'],
                'email' => $_POST['email'],
                'photo' => $photo
            ]);
            $student =  $this->query_student();
        }
        $this->insert_course_student($student->id, $_POST['course_id']);

        return redirect('student');
    }

    public function edit()
    {
        $student = App::get('database')->queryDynamic('students', [
            'id' => $_GET['id']
        ]);

        return view('editStudent',[
            'id' => $student->id,
            'name' => $student->name,
            'address' => $student->address,
            'phone_no' => $student->phone_no,
            'email' => $student->email
        ]);
    }

    public function update()
    {
        if($_FILES['photo']['name']){
            $student = App::get('database')->queryDynamic('students', [
                'id' => $_POST['id']
            ]);
            unlink(dirname(dirname(__DIR__)).'/public/images/students-photo'.$student->photo);
            $photo = $this->convert_photo_to_new_name();
            App::get('database')->update('students', [
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'address' => $_POST['address'],
                'email' => $_POST['email'],
                'phone_no' => $_POST['phone_no'],
                'photo' => $photo
            ]);
        }
        else{
            App::get('database')->update('students', [
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'address' => $_POST['address'],
                'email' => $_POST['email'],
                'phone_no' => $_POST['phone_no']
            ]);
        }
        
        return redirect('student');
    }

    public function delete()
    {
        $student = App::get('database')->queryDynamic('students', [
            'id' => $_POST['id']
        ]);
        unlink(dirname(dirname(__DIR__)).'/public/images/students-photo'.$student->photo);
        App::get('database')->deleteStudent(['id' => $_POST['id']]);

        return redirect('student');
    }

    protected function query_student()
    {
        return App::get('database')->queryDynamic('students', [
            'email' => $_POST['email'],
            'phone_no' => $_POST['phone_no']
        ]);
    }

    protected function insert_course_student($student_id, $course_id)
    {
        App::get('database')->insert('courses_students', [
            'course_id' => $course_id,
            'student_id' => $student_id
        ]);
    }

    protected function is_email_present()
    {
        $password = md5($_POST['password']);
        $query = App::get('database')->queryDynamic('users', [
            'email' => $_POST['email'],
            'password' => $password
        ]);
        if(!$query){
            return true;
        } else {
            return false;
        }
    }

    protected function running_courses()
    {
        return App::get('database')->running_courses('courses');
    }

    protected function convert_photo_to_new_name()
    {
        $img_file = $_FILES['photo']['name'];
        $tmp_dir = $_FILES['photo']['tmp_name'];
        $img_size = $_FILES['photo']['size'];
        if(empty($img_file)){
            die('Please select the image');
        }
        $upload_dir =dirname(dirname(__DIR__)).'/public/images/students-photo';
        $imgExt = strtolower(pathinfo($img_file, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        $student_photo = rand(1000, 1000000).".".$imgExt;
        if(in_array($imgExt, $valid_extensions)){
            if($img_size < 5000000){
                move_uploaded_file($tmp_dir, $upload_dir.$student_photo);
            }
            else{
                die('sorry, your file is too large');
            }
        }
        else{
            die('soory, use only jpg, jpeg, png files are allowed');
        }

        return $student_photo;
    }
    
}
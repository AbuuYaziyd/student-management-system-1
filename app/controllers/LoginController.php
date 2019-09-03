<?php
namespace App\Controllers;

use App\Core\App;

class LoginController
{
    public function home()
    {
        $query = $this->is_email_present();
        if($query){
            return redirect('login');
        }else{
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['login'] = true;
        }
        return redirect('');
    }

    public function register()
    {
        return view('register');
    }

    public function register_user()
    {
        $password = md5($_POST['password']);
        $query = $this->is_email_present();
        if($query){
            App::get('database')->insert('users',[
                'email' => $_POST['email'],
                'password' => $password
            ]);
            die(var_dump("new user added"));
        }else{
            die(var_dump('Register with different email address'));       
        }
    }

    public function logout()
    {
        session_destroy();
        return redirect('');
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
    
}
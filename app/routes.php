<?php
if(!isset($_SESSION['login'])){
    $router->get('login', 'PagesController@login');
}
$router->get('', 'PagesController@home');

$router->post('login', 'LoginController@home');
$router->post('logout', 'LoginController@logout');
$router->get('register', 'LoginController@register');
$router->post('register', 'LoginController@register_user');

if(isset($_SESSION['login'])){
    $router->get('student', 'PagesController@student');

    $router->get('course/add', 'CourseController@add_form');
    $router->post('course/add-course', 'CourseController@add_course');
    $router->get('course/running-course', 'CourseController@running_course');
    $router->get('course/past-course', 'CourseController@past_course');

    $router->get('student/add', 'StudentController@add_form');
    $router->post('student/add-student', 'StudentController@add_student');
    $router->get("student/edit", 'StudentController@edit');
    $router->post('student/delete', 'StudentController@delete');
    $router->post('student/update', 'StudentController@update');
}



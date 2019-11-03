# Student Management System #

The entry point for all the requests to this manual PHP MVC is index.php

<b>In config file</b>,
	you can change your database parameters like name, username, password, and connection.

I have used mysql as my database connection.

Before running this program in your local machine, make sure you have run 
        ``` composer install ```

This composer.json file specifies required packages. The above command installs the required packages and generate vendor file.

## About ##
A minor project on PHP using manual MVC

### Includes three tables ###
1. Students
	* id(PK)
	* name
	* address
	* phone_no
	* email
	* photo

2. Courses
	* id(PK)
	* name
	* start_date
	* end_date

3. courses_students
	* course_id(FK)
	* student_id(FK)

### Query operations are performed showing ###

1. create courses with start_date and end_date
2. show running and past courses
3. Add Students
4. View all Students in addition to edit and delete students

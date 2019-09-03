# student-management-system
A minor project on PHP using manual MVC
<br/>
Includes 3 tables:
1. Students <br/>
  id(PK)<br/>
  name<br/>
  address<br/>
  phone_no<br/>
  email<br/>
  photo<br/>
  
2. Courses<br/>
  id(PK)<br/>
  name<br/>
  start_date<br/>
  end_date<br/>
  
3. courses_students<br/>
  course_id(FK)<br/>
  student_id(FK)<br/>

query operations are performed showing:
1. create courses with start_date and end_date
2. show running and past courses
3. Add Students
4. View all Students in addition to edit and delete students

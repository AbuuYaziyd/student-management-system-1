# student-management-system
A minor project on PHP using manual MVC

Includes 3 tables:
1. Students
  id(PK)
  name
  address
  phone_no
  email
  photo
  
2. Courses
  id(PK)
  name
  start_date
  end_date
  
3. courses_students
  course_id(FK)
  student_id(FK)

query operations are performed showing:
1. create courses with start_date and end_date
2. show running and past courses
3. Add Students
4. View all Students in addition to edit and delete students

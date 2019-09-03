<?php require('partials/head.php')?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Add Courses
        </div>
        <div class="card-body">
            <form action="/course/add-course" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="nameCourse" 
                        placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="text" name="start_date" class="form-control" id="nameCourse" 
                        placeholder="YYYY-MM-DD" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="text" name="end_date" class="form-control" id="nameCourse" 
                        placeholder="YYYY-MM-DD" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">Add Course</button>
            </form>
        </div>
    </div>
</div>
<?php require('partials/footer.php')?>
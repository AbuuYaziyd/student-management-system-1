<?php require('partials/head.php')?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Add Student
        </div>
        <div class="card-body">
            <form action="/student/add-student" method="post" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= App\Core\csrf::generateToken('asdfhgjkl'); ?>"/>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="nameCourse" 
                        placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="nameCourse" 
                        placeholder="Enter Address" required>
                </div>
                <div class="form-group">
                    <label for="Choose Course">Choose Course</label>
                    <select id="inputState" class="form-control" name="course_id" required>
                        <option disabled>Choose one course</option>               
                        <?php foreach($courses as $course): ?>
                            <option value="<?=$course->id?>"><?= $course->name?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Email">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="phone_no">Phone Number</label>
                    <input type="text" name="phone_no" class="form-control" id="nameCourse" 
                        placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" class="form-control" id="nameCourse" 
                        accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">Add Student</button>
            </form>
        </div>
    </div>
</div>
<?php require('partials/footer.php')?>
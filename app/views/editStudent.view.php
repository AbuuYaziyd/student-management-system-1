<?php require('partials/head.php')?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Edit Student
        </div>
        <div class="card-body">
            <form action="/student/update" method="post" enctype="multipart/form-data">
                <input type="text" name="id" value="<?=$id?>" hidden>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="nameCourse" 
                        placeholder="Enter Name" value="<?=$name?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="nameCourse" 
                        placeholder="Enter Address" value="<?=$address?>" required>
                </div>
            
                <div class="form-group">
                    <label for="Email">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email" value="<?=$email?>" required>
                </div>
                <div class="form-group">
                    <label for="phone_no">Phone Number</label>
                    <input type="text" name="phone_no" class="form-control" id="nameCourse" 
                        placeholder="Enter Phone Number" value="<?=$phone_no?>" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" class="form-control" id="nameCourse" 
                        accept="image/*">
                </div>
                <button type="submit" class="btn btn-success btn-block">Update Course</button>
            </form>
        </div>
    </div>
</div>
<?php require('partials/footer.php')?>
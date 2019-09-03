<?php require('partials/head.php')?>

    <div class="container">
        <div class="card">
            <div class="card-header">
                All Students
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">S.N.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($students as $student):?>
                            <tr>
                                <th scope="row"><?=$count++?></th>
                                <td><?=$student->name?></td>
                                <td><?=$student->address?></td>
                                <td><?=$student->phone_no?></td>
                                <td><?=$student->email?></td>
                                <td>
                                    <img src=<?='/public/images/students-photo'.$student->photo?> 
                                     height="50px" width="50px">    
                                </td>
                                <td><a href="/student/edit?id=<?=$student->id?>" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form action="/student/delete" method="post">
                                        <input type="text" name="id" value="<?=$student->id?>" hidden>
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require('partials/footer.php');?>

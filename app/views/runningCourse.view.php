<?php require('partials/head.php')?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Running Course
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th scope="col">
                        <li class="nav nav-item">
                            <a href="/course/past-course" class="nav-link">Past Course</a>
                        </li>
                    </th>
                    <th scope="col">
                        <li class="nav nav-item">
                            <a href="/course/running-course" class="nav-link">Running Course</a>
                        </li>
                    </th>
                </thead>
            </table>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">S.N.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">No. of Students</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($courses as $course):?>
                    <tr>
                        <th scope="row"><?=$count++?></th>
                        <td><?=$course->name?></td>
                        <td><?=$course->start_date?></td>
                        <td><?=$course->end_date?></td>
                        <td><?=$course->no_of_students?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require('partials/footer.php');?>
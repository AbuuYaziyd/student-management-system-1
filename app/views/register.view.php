<?php require('partials/head.php')?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Register
        </div>
        <div class="card-body">
            <form method="POST" action="/register">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">Register</button>
            </form>
        </div>
    </div>
</div>
<?php require('partials/footer.php')?>
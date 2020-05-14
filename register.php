<?php include 'functions.php' ?>
<?php include 'includes/header.php' ?>
<?php 
            if (isset($_POST['submit'])) {
                register();
            }
?>
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-sm-6">
            <div class="">
                <h1>Register</h1>
            </div>
                <form action="register.php" method="POST">
                    <div class="form-group">
                        <label for="usrRegister">Full Name:</label>
                        <input type="text" class="form-control" id="username" name="full_name"  autocomplete="name" required>
                    </div>
                    <div class="form-group">
                        <label for="usrNameRegister">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" autocomplete="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email_address" name="email_address"  autocomplete="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pwdRegister">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-danger">Register</button>
                    </div><br>
            </form>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
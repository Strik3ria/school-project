<?php include 'functions.php' ?>
<?php include 'includes/header.php' ?>
<?php 
    if (isLoggedIn()) {
        redirect('tickets.php');
    }
?>
    <div class="container">
    <div class="row mt-5">
        <div class="col-sm-6">
            <h1 class="display-4 text-center">
                <br>
                Trojan Help Desk
                <br>
                Ticketing System
            </h1>
        </div>
        <div class="col-sm-6" style="background-color: var(--gray);">
            <form id="loginForm" class="mt-4 mb-2" autocomplete="on" action="index.php" method="POST">
                <h1>Login</h1>
                <div class="form-group">
                        <label for="usrLogin">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" autocomplete="name">
                </div>
                <div class="form-group">
                    <label for="pwdLogin">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="d-flex justify-content-around">
                    <button type="submit" name="submit" class="btn btn-success float-left mb-2">Login</button>
                    <a href="register.php" class="btn btn-danger" style="height: 38px">Click here to register</a>
                </div>
            </form>
            <?php
                if (isset($_POST['submit'])) {
                    $GLOBALS['currentUser'] = 'localhost';
                    login();
                }
            ?>
            <br>
            <div id="loginAlert">
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
<?php include 'includes/header.php'; ?>
<?php include 'functions.php' ?>
<?php 
    if (!isLoggedIn()) {
        redirect('index.php');
    }

    if (isset($_POST['submit'])) {
        createTicket();
    }
?>
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-sm-6">
            <div class="">
                <h1>New Ticket</h1>
            </div>
                <form action="create-ticket.php" method="POST">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title"  autocomplete="name" required>
                    </div>
                    <div class="form-group">
                        <label for="department">Department:</label>
                        <input type="text" class="form-control" id="department" name="department" autocomplete="name" required>
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority:</label>
                        <input type="text" class="form-control" id="priority" name="priority"  autocomplete="email" required>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-danger">Create</button>
                    </div><br>
            </form>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
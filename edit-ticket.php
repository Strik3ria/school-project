<?php include 'includes/header.php' ?>
<?php include 'functions.php' ?>
<?php 
    if (!isLoggedIn()) {
        redirect('index.php');
    }

    $ticket = mysqli_fetch_assoc(getTicketByID());
    $user = mysqli_fetch_assoc(getUserById($ticket['reported_by']));

    if (isset($_POST['submit'])) {
        updateTicket();
    }
?>
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-sm-6">
            <div class="">
                <h2>Ticket no. <?php echo $ticket['id']; ?></h2>
                <?php echo '<p>' . $ticket['title'] . ' submitted by ' . $user['username'] . '</p>' ?>
                <?php echo '<p>Department: ' . $ticket['department'] . '</p>' ?>
            </div>
            <form action="edit-ticket.php?id=<?php echo $ticket['id'];?>" method="POST">
                <div class="form-group">
                    <label for="priority">Priority: </label>
                    <?php echo '<input type="text" class="form-control" id="priority" name="priority"  autocomplete="name" value="' . $ticket['priority'] . '" required>'; ?>
                </div>
                <div class="form-group">
                    <label for="action">Action: </label>
                    <?php echo '<input type="text" class="form-control" id="action" name="action" autocomplete="name" value="' . $ticket['action'] . '" >'; ?>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-danger text-center">Save Changes</button>
                </div><br>
            </form>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
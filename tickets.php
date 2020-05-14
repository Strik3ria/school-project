<?php include 'functions.php' ?>
<?php include 'includes/header.php' ?>
<?php
    if (!isLoggedIn()) {
        redirect('index.php');
    }

    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $tickets = getUserTickets();
    }
?>
    <div class="container mt-5">
        <div class="col-sm-12">
        <div class="row">
            <div>
                <div>
                    <a href="create-ticket.php" class="btn btn-danger" style="height: 38px">Add New Ticket</a>
                </div>
            </div>
            <div class="table-bordered table-hover table-responsive  mt-2">
                <table class="table" id="ticketTable">
                    <thead>
                        <tr>
                            <th>Ticket No.</th>
                            <th>Title</th>
                            <th>Department</th>
                            <th>Priority</th>
                            <th>Reported By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="ticketTableBody">
                        <?php
                            while ($row = mysqli_fetch_assoc($tickets)) {
                                ?>
                                <tr>
                                    <td><a href="edit-ticket.php?id=<?php echo $row['id'];?>"><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['department']; ?></td>
                                    <td><?php echo $row['priority']; ?></td>
                                    <td><?php echo $row['reported_by']; ?></td>
                                    <td><?php echo $row['action']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
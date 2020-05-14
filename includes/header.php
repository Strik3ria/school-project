<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Trojan Ticket Solutions</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body style="">
        <?php session_start() ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php"><img src="images/200x200.png" alt="Logo" style="width: 190px; height: 65px;"/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <?php
                            if (isset($_SESSION['loggedIn'])) {
                                if ($_SESSION['loggedIn'] == 1) {
                                    echo '<a class="nav-link" href="tickets.php">Tickets</a>';
                                }
                            }
                        ?>
                    </li>
                    <li>
                        <?php
                            if (isset($_SESSION['loggedIn'])) {
                                if ($_SESSION['loggedIn'] == 1) {
                                    echo '<a class="nav-link float-right" href="logout.php">Logout</a>';
                                }
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>
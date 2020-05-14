<?php include 'data/db.php'; ?>
<?php
    // SUMMARY: Returns a single user by id in a php object.
    function getUserById($id) {
        global $connection;

        $query = "SELECT id, username, password, full_name, email_address, created_at FROM users ";
        $query .= "WHERE id = $id";
        $result = mysqli_query($connection, $query);

        if ($result) {
            return $result;
        } else {
            return 'This user may not exist.';
        }
    }

    // SUMMARY: Registers a user to use the applicaton
    function register() {
        global $connection;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $full_name = $_POST['full_name'];
        $email_address = $_POST['email_address'];

        /*This prevents users from being able to execute SQL injection attacks on the 
            Database. It replaces all special characters with a literals of the symbol*/
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        $full_name = mysqli_real_escape_string($connection, $full_name);
        $email_address = mysqli_real_escape_string($connection, $email_address);
        
        if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
            die('Please enter a valid email address.');
        }

        $query = 'INSERT INTO users (username, password, full_name, email_address) ';
        $query .= "VALUES('$username', '$password', '$full_name', '$email_address')";

        $result = mysqli_query($connection, $query);
    
        if (!$result) {
            // die() is effectively give an error and stop trying to make it work
            die('Username already exists.');
        } else {
            return $result;
        }
    }

    // Main login() function. Validates password and that the user exists
    function login() {
        global $connection;
        $username = $_POST['username'];
        $password = $_POST['password'];

        /*This prevents users from being able to execute SQL injection attacks on the 
            Database. It replaces all special characters with a  iteral of the symbol*/
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT id, username, password FROM users ";
        $query .= "WHERE username = '$username'";

        $result = mysqli_query($connection, $query);
        $parsedResult = mysqli_fetch_assoc($result);

        if (!$result || $parsedResult['password'] != $password) {
            die('Login failed!');
        } else {
            $_SESSION['userId'] = $parsedResult['id'];
            $_SESSION['loggedIn'] = true;
            redirect('tickets.php');
        }
    }

    /* Helper function, $statusCode can be omitted but
       $url is required and can be relative or absolute ie tickets.php or https://www.robertcoones.com/tickets.php
       I recommend using relative just because it is url agnostic and just appends it
       to wherever it is being hosted
    */
    function redirect($url, $stausCode = 303) {
        header('Location: ' . $url, true, $stausCode);
        die();
    }
 
    // Checks if the user has a login session value
    function isLoggedIn() {
        if (isset($_SESSION['loggedIn'])) {
            return $_SESSION['loggedIn'];
        } else {
            return 0;
        }
    }

    // SUMMARY: Gets all tickets for the logged in user
    function getUserTickets() {
        global $connection;
        $userId = +$_SESSION['userId'];
        
        $query = "SELECT id, title, department, priority, reported_by, action FROM tickets ";
        $query .= "WHERE reported_by = $userId";

        $results = mysqli_query($connection, $query);

        if (!$results) {
            die('You have no tickets open!');
        } else {
            return $results;
        }
    }

    // SUMMARY: Gets a specific ticket by its id
    function getTicketByID() {
        global $connection;

        if (isset($_GET['id'])) {
            $ticketId = +$_GET['id'];
        } else {
            redirect('tickets.php');
        }
       
        $query = "SELECT id, title, department, priority, reported_by, action FROM tickets ";
        $query .= "WHERE id = $ticketId";

        $results = mysqli_query($connection, $query);

        if (!$results) {
            die("no ticket exists with this Id");
        } else {
            return $results;
        }
    }

    // SUMMARY: Creates a ticket under the currently logged in user
    function createTicket() {
        global $connection;
        $title = $_POST['title'];
        $department = $_POST['department'];
        $priority = $_POST['priority'];

        if (isset($_SESSION['userId'])) {
            $reported_by = +$_SESSION['userId'];
        } else {
            die('How did you get here! Go login!');
        }

        $title = mysqli_real_escape_string($connection, $title);
        $department = mysqli_real_escape_string($connection, $department);
        $priority = mysqli_real_escape_string($connection, $priority);

        $query = "INSERT INTO tickets (title, department, priority, reported_by) ";
        $query .= "VALUES ('$title', '$department', '$priority', $reported_by)";

        $results = mysqli_query($connection, $query);

        if (!$results) {
            die('Failed to add ticket to database');
        } else {
            redirect('tickets.php');
        }
    }

    /* SUMMARY: Used to update a tickets priority and action fields.
                            The other fields should never change
    */
    function updateTicket() {
        global $connection;
        $ticketId = $_GET['id'];
        $priority = $_POST['priority'];
        $action = $_POST['action'];
        
        $ticketId = mysqli_real_escape_string($connection, $ticketId);
        $priority = mysqli_real_escape_string($connection, $priority);
        $action = mysqli_real_escape_string($connection, $action);
        
        $query = "UPDATE tickets ";
        $query .= "SET priority = '$priority', action = '$action' ";
        $query .= "WHERE id = $ticketId";

        $results = mysqli_query($connection, $query);

        if (!$results) {
            die('An error occured updating your ticket');
        } else {
            redirect('tickets.php');
        }
    }
?>
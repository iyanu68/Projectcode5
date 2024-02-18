<?php
// signindb.php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $username = "store_admin";
    $password_db = "password1#";
    $database = "projectoutro";

    $conn = mysqli_connect($host, $username, $password_db, $database);

    if (mysqli_connect_error()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM project5 WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id']; // Store the user ID in the session
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: signin.php");
        exit();
    }

    mysqli_close($conn);
}
?>
<?php


// Database configuration

    $host = "localhost";
    $username = "store_admin";
    $password_db = "password1#";
    $database = "projectoutro";

    $conn = mysqli_connect($host, $username, $password_db, $database);

    if (mysqli_connect_error()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["video"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["video"]["name"]);
    
        // Check file size (2MB)
        if ($_FILES["video"]["size"] > 2000000) {
            echo "Sorry, your file is too large.";
        } else {
            // Allow certain video file formats
            $allowed_formats = ["mp4", "avi", "mov", "wmv"];
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
            if (in_array($imageFileType, $allowed_formats)) {
                // If everything is OK, try to upload file and insert record into the database
                if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
                    $filename = basename($_FILES["video"]["name"]);
                    $sql = "INSERT INTO videos (filename) VALUES ('$filename')";
                    if ($conn->query($sql) === TRUE) {
                        // Echo the HTML video element with the newly uploaded video
                        echo '<video controls><source src="' . $target_file . '" type="video/' . $imageFileType . '"></video>';
                    } else {
                        echo "Error uploading video. Please try again.";
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Sorry, only MP4, AVI, MOV, and WMV files are allowed.";
            }
        }
    }
    
    $conn->close();
    ?>
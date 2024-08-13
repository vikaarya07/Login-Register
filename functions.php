<?php

$server = "localhost";
$user = "root";
$pass = "";
$db_name = "db_login";

$conn = mysqli_connect($server, $user, $pass, $db_name) or die(mysqli_error($conn));

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function register($data)
{
    global $conn;

    $FullName = htmlspecialchars($data['FullName']);
    $Email = htmlspecialchars($data['Email']);
    $Username = strtolower(stripslashes($data['Username']));
    $Password = mysqli_real_escape_string($conn, $data['Password']);

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$Username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                Swal.fire({
                   title: 'Error!',
                   text: 'Account already exists',
                   icon: 'error',
                   confirmButtonText: 'Try Again'
                });
              </script>";
        return false;
    }

    $Password = password_hash($Password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users VALUES ('','$FullName', '$Email', '$Username', '$Password')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

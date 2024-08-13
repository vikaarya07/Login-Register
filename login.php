<?php include "view/header.php"; ?>

<body>
    <main id="login">

        <div class="login">

            <img src="img/login-bg.jpg" alt="Image Not Found" class="login-bg">

            <form action="" method="POST" class="login-form" enctype="multipart/form-data">
                <h1 class="login-title">Admin Login</h1>

                <div class="login-inputs">
                    <div class="login-box">
                        <input type="text" name="Username" placeholder="Username" class="login-input" autocomplete="off" required>
                    </div>

                    <div class="login-box input-group">
                        <input type="password" name="Password" id="password" placeholder="Password" class="login-input" required>
                        <span class="password-toggle-icon"><i class="bi bi-eye"></i></span>
                    </div>
                </div>

                <div class="login-check">
                    <div class="login-check-box">
                        <input type="checkbox" class="login-check-input" name="RememberMe" id="user-check">
                        <label for="user-check" class="login-check-label">Remember me</label>
                    </div>

                    <a href="#" class="login-forgot">Forgot Password?</a>
                </div>

                <button type="submit" class="login-button" name="Login">Login</button>

                <div class="login-register">
                    Don't have an account? <a href="register.php">Register</a>
                </div>
            </form>

        </div>

    </main>

    <?php include "view/footer.php"; ?>
</body>

</html>

<?php
session_start();
require 'functions.php';

if (isset($_SESSION['Login'])) {
    header("location:index.php");
    exit;
}

if (isset($_POST['Login'])) {

    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    $query = "SELECT * FROM users WHERE username = '$Username'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($Password, $row['password'])) {

            $_SESSION['login'] = true;

            if (isset($_SESSION)) {

                echo '<script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Signed in successfully"
                    });
                    window.location.href= "index.php";
                </script>';
            };
        }
    }
    $error = true;
    if (isset($error)) {

        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Username or Password incorrect!',
                icon: 'error',
                confirmButtonText: 'Try Again'
            });
        </script>";
    }
}

?>
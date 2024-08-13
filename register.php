<?php include "view/header.php"; ?>

<body>

    <main id="login">

        <div class="login">

            <img src="img/login-bg.jpg" alt="Image Not Found" class="login-bg">

            <form action="" method="POST" class="login-form" enctype="multipart/form-data">
                <h1 class="login-title">Create an Account</h1>

                <div class="login-inputs">
                    <div class="login-box">
                        <input type="text" name="FullName" placeholder="Nama Lengkap" class="login-input" autocomplete="off" required>
                    </div>

                    <div class="login-box">
                        <input type="email" name="Email" placeholder="Email" class="login-input" autocomplete="off" required>
                    </div>

                    <div class="login-box">
                        <input type="text" name="Username" placeholder="Username" class="login-input" autocomplete="off" required>
                    </div>

                    <div class="login-box input-group">
                        <input type="password" name="Password" id="password" placeholder="Password" class="login-input" required>
                        <span class="password-toggle-icon"><i class="bi bi-eye"></i></span>
                    </div>
                </div>

                <div class="login-check">
                    <div class="login-check-box login-register">
                        <input type="checkbox" class="login-check-input" id="user-check" required>
                        <label for="user-check" class="login-check-label">I agree and accept the <a href="#">terms and conditions</a></label>
                    </div>
                </div>

                <button type="submit" class="login-button" name="Register">Register</button>

                <div class="login-register">
                    Already have an account? <a href="login.php">Log in</a>
                </div>
            </form>

        </div>

    </main>

    <?php include "view/footer.php"; ?>

</body>

</html>
<?php

require 'functions.php';

if (isset($_POST['Register'])) {
    if (register($_POST) > 0) {
        echo "<script>
            Swal.fire({
                title: 'Sukses!',
                text: 'Registration Success!!!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Registration Failure!!!',
                icon: 'error',
                confirmButtonText: 'Try Again'
            });
        </script>";
    }
}

?>
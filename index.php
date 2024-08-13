<?php

session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}

include "functions.php";

?>

<?php include "view/header.php"; ?>

<body>

    <div class="container bg-warning">
        <div class="row justify-content-center">
            <div class="text-center mt-5">
                <h1>Wellcome to my Website Login</h1>
            </div>
            <div class="text-center mt-5">
                <p>Create by <a href="#">@vikaarya07</a></p>
            </div>
            <div class="text-center mt-5">
                <button type="button" id="keluar" class="btn btn-primary">Logout</button>
            </div>
        </div>
    </div>
    </div>

    <?php include "view/footer.php"; ?>

</body>

</html>
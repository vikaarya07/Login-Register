const keluar = document.querySelector("#keluar");
keluar.addEventListener("click", function () {
    Swal.fire({
        title: "Are you sure?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Logout!"
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "logout.php";
        }
      });
});


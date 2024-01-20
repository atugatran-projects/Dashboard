<?php
include(dirname(__FILE__) . "/pages/common/header.php");
include(dirname(__FILE__) . "/pages/database/dbconnect.php");

$login = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE userName = ?");
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // Start session only if login is successful
            // session_start();

            // echo $userName . "<br>";
            // echo $row["sno"] . "<br>";
            // echo $row["role"] . "<br>";

            // $_SESSION['loggedin'] = true;
            // $_SESSION['username'] = $userName;
            // $_SESSION['userID'] = $row["sno"];
            // $_SESSION['userRole'] = $row["role"];

            setcookie("loggedin", true, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie("username", $userName, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie("userID", $row["sno"], time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie("userRole", $row["role"], time() + (86400 * 30), "/"); // 86400 = 1 day

            // Use header('Location: ...') for redirects
            header("Location: ./pages/dashboard.php");
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            echo '<script>alert("Invalid Credentials!")</script>';
        }
    } else {
        echo '<script>alert("Invalid Credentials!")</script>';
    }

    // Close the prepared statement
    $stmt->close();
}

?>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="<?php echo INV_ASSETS; ?>/images/your_logo.png">
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" method="post">
                                <div class="form-group">

                                    <input type="text" class="form-control form-control-lg" name="username" id="exampleInputEmail1" required placeholder="Username">
                                </div>
                                <div class="form-group">

                                    <input type="password" class="form-control form-control-lg" name="password" id="exampleInputPassword1" required autocomplete="off" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="pages/register.php" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <?php include(dirname(__FILE__) . "/pages/common/footer.php"); ?>

</body>
</html>
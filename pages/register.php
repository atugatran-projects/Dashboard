<?php include(dirname(__FILE__) . "/common/header.php"); ?>
<?php include(dirname(__FILE__) . "/database/dbconnect.php"); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $Country = $_POST["Country"];
    $password = $_POST["password"];

    // Check whether this username exists
    $existSql = "SELECT * FROM `users` WHERE email = '$email' OR userName = '$userName'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);

    if ($numExistRows > 0) {
        echo '<script>alert("User Already Exists!")</script>';
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`userName`, `email`, `country`, `password`, `role`) VALUES ('$userName', '$email', '$Country', '$hash', 'customers');";
        $result2 = mysqli_query($conn, $sql);
        if ($result2) {
            echo '<script>alert("You are Signup")</script>';
        } else {
            echo '<script>alert("You are not Signup")</script>';
        }
    }
}
?>

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="../assets/images/your_logo.png">
                        </div>
                        <h4>New here?</h4>
                        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                        <form class="pt-3" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" required name="userName" id="exampleInputUsername1" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" required name="email" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <select class="form-control form-control-lg" id="exampleFormControlSelect2" name="Country">
                                    <option value="Country">Country</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="India">India</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Argentina">Argentina</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" required class="form-control form-control-lg" autocomplete="off" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" name="register" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                    Register Account
                                </button>
                                <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a> -->
                            </div>
                            <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="../index.php" class="text-primary">Login</a>
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

<?php include(dirname(__FILE__) . "/common/footer.php"); ?>
</body>
</html>
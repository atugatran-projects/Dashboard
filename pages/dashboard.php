<?php include(dirname(__FILE__) . '/common/header.php'); ?>
<?php include(dirname(__FILE__) . '/database/dbconnect.php'); ?>
<body>
  <div class="container-scroller">
    <!-- pages/common/_navbar.php -->
    <?php  include(dirname(__FILE__) . '/common/navbar.php'); ?>

    <?php
    $id = $_SESSION['userID'];
    $sql = "Select * from `invoices`  WHERE `user_id`='$id'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    ?>
    <?php
    $id = $_SESSION['userID'];
    $sql2 = "Select * from `customers`  WHERE `user_id`='$id'";
    $result2 = mysqli_query($conn, $sql2);
    $num2 = mysqli_num_rows($result2);
    ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- pages/common/_sidebar.php -->
      <?php include('common/sidebar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="d-xl-flex justify-content-between align-items-start">
            <h2 class="text-dark font-weight-bold mb-2"> Invoices dashboard </h2>
            <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">

              <div class="dropdown ms-0 ml-md-4 mt-2 mt-lg-0">
                <button class="btn bg-white p-3 d-flex align-items-center" type="button"> <i class="mdi mdi-calendar me-1"></i>
                  <span id="fullDate"></span>
                </button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border ">

              </div>
              <div class="tab-content tab-transparent-content">
                <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                  <div class="row">
                    <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card" style="height: 17em">
                      <div class="card">
                        <div class="card-body text-center">
                          <h5 class="mb-2 text-dark font-weight-normal">Invoices</h5>
                          <h2 class="mb-4 text-dark font-weight-bold"><?php echo $num ?></h2>
                          <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent">
                            <i style="top: 68%;" class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card" style="height: 17em">
                      <div class="card">
                        <div class="card-body text-center">
                          <h5 class="mb-2 text-dark font-weight-normal">Customers</h5>
                          <h2 class="mb-4 text-dark font-weight-bold"><?php echo $num2 ?></h2>
                          <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent">
                            <i style="top: 68%;" class="mdi mdi-account-circle icon-md absolute-center text-dark"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <footer class="footer">
          <div class="footer-inner-wraper">
            <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2023</span>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>


  <!--pages/common/_footer.php -->
  <?php include('common/footer.php'); ?>

  <!-- Dashboard -->
  <script src="<?php echo INV_ASSETS; ?>/js/dashboard.js"></script>
  <script src="<?php echo INV_ASSETS; ?>/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
  <!-- hamburger -->
  <script src="<?php echo INV_ASSETS; ?>/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="<?php echo INV_ASSETS; ?>/js/off-canvas.js"></script>
  <script src="<?php echo INV_ASSETS; ?>/js/misc.js"></script>

  <script>
    // Date
    var d = new Date();

    var month = d.getMonth() + 1;
    var day = d.getDate();

    var fullDate =
      (day < 10 ? '0' : '') + day + ' ' +
      (month < 10 ? '0' : '') + month + ' ' +
      d.getFullYear();

    // let element = ;

    // console.log(element);

    jQuery('#fullDate').html(fullDate);
  </script>
</body>

</html>
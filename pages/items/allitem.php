<?php include('../common/header.php'); ?>

<body>
    <div class="container-scroller">
        <!-- common:../../common/_navbar.html -->

        <?php include('../common/navbar.php'); ?>
        <!-- common -->
        <div class="container-fluid page-body-wrapper">
            <!-- common:../../commons/_sidebar.html -->
            <?php include('../common/sidebar.php'); ?>
            <!-- common -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> All Item </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="items.php">New Items</a></li>
                                <li class="breadcrumb-item active"><a href="allitem.php">All Items</a></li>
                            </ol>
                        </nav>
                    </div>
                    <form action="../database/items/deleteitem.php" method="POST">
                        <button type="submit" name="mDeleteitem" class="btn btn-danger">Delete</button>
                        <table border="1" class="mt-5 table" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <!-- <th style="display: none;"></th> -->
                                    <th>NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>RATE</th>
                                    <th>USAGE UNIT</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../database/items/allitem.php')
                                ?>
                            </tbody>
                        </table>
                    </form>
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
    <?php include('../common/footer.php'); ?>
    <script src="<?php echo INV_ASSETS; ?>/js/misc.js"></script>
</body>

</html>
<?php
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$connection = new Transaction();
$CHECKIN = $connection->getCheckInTransactions();

?>

<?php include('includes/header.php') ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('includes/sidebar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                    <?php include('includes/topbar.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <?php include('includes/count-cards.php') ?>

                    </div>

                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">CHECKIN </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Room Type</th>
                                        <th>Room no</th>
                                        <th>Check In</th>
                                        <th>Days</th>
                                        <th>Check Out</th>
                                        <th>Status</th>
                                        <th>Extra Bed</th>
                                        <th>Bill</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($CHECKIN as $key => $value) {
                                    ?>

                                    <tr>
                                        <td><?= $value['firstname']." ".$value['lastname']?></td>
                                        <td><?= $value['room_type']?></td>
                                        <td><?= $value['room_no']?></td>
                                        <td><?= "<label style = 'color:#00ff00;'>".date("M d, Y", strtotime($value['checkin']))."</label>"." @ "."<label>".date("h:i a", strtotime($value['checkin_time']))."</label>"?></td>
                                        <td><?= $value['days']?></td>
                                        <td><?= "<label style = 'color:#ff0000;'>".date("M d, Y", strtotime($value['checkin']."+".$value['days']."DAYS"))."</label>"?></td>
                                        <td><?= $value['status']?></td>
                                        <td><?php if($value['extra_bed'] == "0"){ echo "None";}else{echo $value['extra_bed'];}?></td>
                                        <td><?= "Php. ".$value['bill'].".00"?></td>
                                        <td>
                                            <center>
                                                <?=
                                                '<a class = "btn btn-warning" onclick="confirmationCheckin('. "'checkout_query.php?transaction_id=". $value['id'] ."')".'">
                                                    <i class = "glyphicon glyphicon-check"></i> Check Out
                                                </a>';
                                                ?>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include('includes/footer.php') ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/scripts.php') ?>

    <script>
        function confirmationDelete(link){
            const conf = confirm("Are you sure you want to delete this record?");
            if(conf){
                window.location = link;
            }
        } 
    </script>
</body>

</html>
<?php
spl_autoload_register(function ($class) {
    include 'models/' . $class . '.php';
});

$connection = new Transaction();
$pending = $connection->setQuery("SELECT
                                    A.*,
                                    B.firstname,
                                    B.middlename,
                                    B.lastname,
                                    B.address,
                                    B.contactno,
                                    C.room_type,
                                    C.price,
                                    C.photo
                                    FROM `transactions` as A
                                    LEFT JOIN `guest` as B
                                    ON A.guest_id = B.id
                                    LEFT JOIN `room` as C
                                    ON A.room_id = C.id
                                    WHERE A.status = 'Pending'
                                ")
                                ->getAll();

// print_r($pending);

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
                            <h6 class="m-0 font-weight-bold text-primary">PENDING RESERVATIONS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Contact No</th>
                                            <th>Room Type</th>
                                            <th>Reserved Date</th>
                                            <th>Check Out Date</th>
                                            <th>Reservation Valid Until</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            foreach ($pending as $key => $value) {
                                        ?>
                                            <tr>
                                            <td><?= $value['firstname']." ".$value['lastname']?></td>
                                                <td><?= $value['contactno']?></td>
                                                <td><?= $value['room_type']?></td>
                                                <td>
                                                    <strong>
                                                        <?= $value['checkin'] <= date("Y-m-d", strtotime("+8 HOURS")) 
                                                            ?  "<label style = 'color:#ff0000;'>".date("M d, Y", strtotime($value['checkin']))."</label>" 
                                                            :  "<label style = 'color:#00ff00;'>".date("M d, Y", strtotime($value['checkin']))."</label>" 
                                                        ?>
                                                    </strong>
                                                </td>
                                                <td><?= "<label style = 'color:#00ff00;'>".date("M d, Y", strtotime($value['checkout']))."</label>";?></td>
                                                <td> 
                                                    <div>
                                                        <?= $value['valid_until']  
                                                            ? '<span class="label label-danger">'. $value['valid_until']. '</span>'
                                                            : '';
                                                        ?>
                                                    </div>
                                                    
                                                </td>
                                                <td><?= $value['status']?></td>
                                                <td>
                                                    <center>
                                                        <?=
                                                            new DateTime($value['valid_until']) < new DateTime()
                                                            ? 
                                                            '<a class = "btn btn-disabled disabled" href = "confirm_reserve.php?transaction_id='.$value['id'].'">
                                                                <i class = "glyphicon glyphicon-check"></i>Expired
                                                            </a>'
                                                            :
                                                            '<a class = "btn btn-success" href = "confirm_reserve.php?transaction_id='.$value['id'].'">
                                                                <i class = "glyphicon glyphicon-check"></i>Accept
                                                            </a> ';
                                                            
                                                        ?>
                                                        <?=
                                                        '<a class = "btn btn-danger" onclick="confirmationDelete('. "'delete_pending.php?transaction_id=". $value['id'] ."')".'">
                                                        <i class = "glyphicon glyphicon-trash"></i>Delete
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


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
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
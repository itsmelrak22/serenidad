<?php
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$connection = new Transaction();
$RESERVED = $connection->getReservedTransactions();
print_r($RESERVED);
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
                            <h6 class="m-0 font-weight-bold text-primary">RESERVED  </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Room Type</th>
                                        <th>Days</th>
                                        <th>Bill</th>
                                        <th>Payment</th>
                                        <th>Balance</th>
                                        <th>Check in</th>
                                        <th>Check out Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($RESERVED as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['firstname']." ".$value['lastname']?></td>
                                        <td><?= $value['room_type']?></td>
                                        <td><?= $value['days']?></td>
                                        <td><?= $value['bill']?></td>
                                        <td><?= $value['payment']?></td>
                                        <td><?= $value['balance']?></td>
                                        <td><?= $value['checkin']?></td>
                                        <td><?= $value['checkout']?></td>
                                        <td><?= $value['status']?></td>
                                        <td>
                                            <span data-toggle="modal" data-target="#confirmCheckinModal">
                                                <button data-toggle="tooltip" data-placement="top" title="Accept Reservation"  class="btn btn-primary btn-circle" >
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
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

    <?php include('includes/modals.php') ?>
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
<?php include('includes/header.php') ?>

<?php
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});
if(!ISSET($_SESSION['resource_type'])){
    header("location:index.php");
}
$transaction = $_SESSION['transaction'];

unset($_SESSION['resource_type']);
unset($_SESSION['transaction']);
?>


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
                    <form action="queries/reservation_resource.php" method="POST" class="user" id="">
                        <div class="card shadow py-2">
                            <div class="card-body p-0">
                            <div class="mx-5 pt-5"> <h5>Serenidad Suites - Confirm Reservation</h5> </div>
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="p-5">
                                            <div class="form-group row">

                                                 <input value="<?= $transaction->id ?>" name="transaction_id" type="hidden" class="form-control ">
                                                 <input value="save-accept" name="resource_type" type="hidden" class="form-control ">
                                                <div class="col-4 form-group">
                                                    <label for="firstname">Firstname :</label>
                                                    <input value="<?= $transaction->firstname ?>" name="firstname" id="firstname" type="text" class="form-control "  placeholder="Fistname" readonly>
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label for="middlename">Middlename :</label>
                                                    <input value="<?= $transaction->middlename ?>" name="middlename" id="middlename" type="text" class="form-control "  placeholder="Middlename" readonly>
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label for="lastname">Lastname :</label>
                                                    <input value="<?= $transaction->lastname ?>" name="lastname" id="lastname" type="text" class="form-control "  placeholder="Lastname" readonly>
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label for="contact">Contact :</label>
                                                    <input value="<?= $transaction->contactno ?>" name="contact" id="contact" type="number" class="form-control "  placeholder="Contact#" readonly>
                                                </div>

                                                <hr>
                                                <div class="col-12 mb-3" >
                                                    <label for="room_type">Room Type :</label>
                                                    <input id="room_type" value="<?= $transaction->room_type ?>" name="room_type" type="text" class=" form-control  disabled"   readonly />
                                                </div>
                                                
                                                <div class="col-sm-6 mb-3">
                                                    <label for="check_in">Check in :</label>
                                                    <input value="<?= $transaction->checkin ?>" name="check_in" id="check_in" type="text" class=" form-control  "  placeholder="Check in" readonly />
                                                </div>

                                                <div class="col-sm-6 mb-3" >
                                                    <label for="check_out">Check out :</label>
                                                    <input value="<?= $transaction->checkout ?>" name="check_out" id="check_out" type="text" class=" form-control "  placeholder="Check out" readonly />
                                                </div>
                                                
                                                <div class="col-12 mb-3" >
                                                    <!-- Basic Card Example -->
                                                        <div class="card shadow mb-4" id="priceBreakdownContainer">
                                                            <div class="card-header py-3">
                                                                <h6 class="m-0 font-weight-bold text-primary">Initial Bill</h6>
                                                            </div>
                                                            <div class="card-body container-fluid" >
                                                                <div>
                                                                    <input name="days" type="hidden" class="form-control " value="<?= $transaction->days ?>">
                                                                    <div>
                                                                        <span > <?= 'Price (PHP) : '  ?> </span> <span class="float-right"> <?= $transaction->price ?> </span> 
                                                                    </div>
                                                                    <div>
                                                                        <span > <?= 'Day(s)/Nights(s) : '  ?> </span> <span class="float-right"> <?= $transaction->days ?> </span> 
                                                                    </div>
                                                                </div>
                                                                <!-- <div>
                                                                    <span > ₱500 x 1 Additional Bed </span> <span class="float-right"> ₱500 </span> 
                                                                </div> -->
                                                                <hr>
                                                                <div>
                                                                    <input name="bill" type="hidden" class="form-control " value="<?=  (int) $transaction->price * (int) $transaction->days ?>">
                                                                    <span > Total :  </span> <span class="float-right"> <?= 'PHP '. (int)$transaction->price * (int)$transaction->days?>  </span> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>

                                                <hr>
                                                <div class="input-group mb-2">
                                                    
                                                </div>
                                                
                                                <div class="col-12 mb-3" >
                                                    <div class="alert alert-info" role="alert">
                                                        <ul>
                                                            <li>Mininum Downpayment is PHP 1000 </li>
                                                        </ul>
                                                    </div>
                                                    <label for="payment">Payment (PHP): </label>
                                                    <input id="payment" name="payment" type="number" class=" form-control" required />
                                                </div>
                                                
                                            </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" > Save Transaction </button>
                        </div>
                    </form>
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
        const rooms = [];

        window.addEventListener ('load', function () {
            getRooms();
        }, false);

        function confirmationDelete(link){
            const conf = confirm("Are you sure you want to delete this record?");
            if(conf){
                window.location = link;
            }
        } 

    </script>
</body>

</html>
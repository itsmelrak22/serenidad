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


    <!-- confirm checkin Modal-->
       <div class="modal fade" id="confirmCheckinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Checkin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Confirm this transaction as "Check in" ?</div>
                <div class="modal-footer">
                    <form action="queries/reservation_resource.php" method="post">
                        <input type="hidden" value="checkin-confirm" name="resource_type">
                        <input type="hidden" value="<?= $value['id'] ?>" name="transaction_id">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" >Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- confirm checkout Modal-->
       <div class="modal fade" id="confirmCheckoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Checkout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Confirm this transaction as "Check Out" ?</div>
                <div class="modal-footer">
                    <form action="queries/reservation_resource.php" method="post">
                        <input type="hidden" value="checkout-confirm" name="resource_type">
                        <input type="hidden" value="<?= $value['id'] ?>" name="transaction_id">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" >Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Reservation Modal-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Serenidad Suites - Add New Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="queries/add_reservation.php" method="POST" class="user" id="CheckDate">
                    <div class="modal-body card shadow py-2">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-register-image">
                                <!-- .bg-register-image {
                                background: url("https://source.unsplash.com/Mv9hjnEUHR4/600x800");
                                background-position: center;
                                background-size: cover;
                                } -->
                                </div>
                                <div class="col-lg-7">
                                    <div class="p-5">

                                            <div class="form-group row">
                                                <div class="col-12 mb-3" >
                                                    <select name="room_id" style="border-radius: 10rem !important;" class="custom-select form-control" id="select-rooms"  placeholder="Select Room" onchange="checkRoomAvailability()"></select>
                                                </div>
                                                
                                                <div class="col-sm-6 mb-3">
                                                    <input name="check_in" id="datepicker-checkin" type="text" class="datepicker-checkin form-control form-control-user "  placeholder="Check in" readonly onchange="modifyCheckoutDate()"/>
                                                </div>

                                                <div class="col-sm-6 mb-3" >
                                                    <input name="check_out" id="datepicker-checkout" type="text" class="datepicker-checkout form-control form-control-user"  placeholder="Check out" readonly onchange="differenceDates()" />
                                                </div>

                                                <!-- <div class="col-12 mb-3" >
                                                    <select style="border-radius: 10rem !important;" class="custom-select form-control"  id="select-tour" name="tour" placeholder="Select Tour" onchange="differenceDates()">
                                                        <option value="day" selected>Day</option>
                                                        <option value="night">Night</option>
                                                    </select>
                                                </div> -->
                                                
                                                <div class="col-12 mb-3" >
                                                    <!-- Basic Card Example -->
                                                        <div class="card shadow mb-4" id="priceBreakdownContainer">

                                                        </div>
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
                                                <input name="firstname" type="text" class="form-control form-control-user"  placeholder="Fistname" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="middlename" type="text" class="form-control form-control-user"  placeholder="Middlename" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="lastname" type="text" class="form-control form-control-user"  placeholder="Lastname" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="contact" type="number" class="form-control form-control-user"  placeholder="Contact#" required>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add User Modal-->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="queries/users_resource.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> User</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="name">Name </label>
                                <input id="name" name="name" type="text" class=" form-control" required value="<?=  isset($_SESSION['name']) ?  $_SESSION['name']  : ''?>"/>
                            </div>
                            <div class="col-12">
                                <label for="username">Username </label>
                                <input id="username" name="username" type="text" class=" form-control" required  value="<?=  isset($_SESSION['username']) ?  $_SESSION['username']  : ''?>" />
                            </div>
                            <div class="col-12">
                                <label for="password">Password </label>
                                <input id="password" name="password" type="password" class=" form-control" required value="<?=  isset($_SESSION['password']) ?  $_SESSION['password']  : ''?>" />
                            </div>
                            <div class="col-12">
                                <label for="comfirm_password">Confirm Password </label>
                                <input id="comfirm_password" name="comfirm_password" type="password" class=" form-control" required value="<?=  isset($_SESSION['comfirm_password']) ?  $_SESSION['comfirm_password']  : ''?>" />
                            </div>
                            <input name="resource_type" value="store" class=" form-control" type="hidden" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit" >Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Reservation Modal-->
    <div class="modal fade" id="reserveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Serenidad Suites - Add New Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="admin/queries/add_reservation.php" method="POST" class="user" id="CheckDate">
                    <div class="modal-body card shadow py-2">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="form-group">
                                <div class="row">
                                    <input name="client-reserve" type="hidden" value="client-reserve">
                                    <div class="col-12 mb-3" >
                                        <select name="room_id" style="border-radius: 10rem !important;" class="custom-select form-control" id="select-rooms"  placeholder="Select Room" readonly required onChange="checkRoomAvailability()"></select>
                                    </div>
                                    
                                    <div class="col-sm-6 mb-3">
                                        <input name="check_in" id="datepicker-checkin" type="text" class="datepicker-checkin form-control form-control-user "  placeholder="Check in" readonly onChange="modifyCheckoutDate()" required/>
                                    </div>

                                    <div class="col-sm-6 mb-3" >
                                        <input name="check_out" id="datepicker-checkout" type="text" class="datepicker-checkout form-control form-control-user"  placeholder="Check out" readonly onChange="differenceDates()" required/>
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
                                    
                                    <div class="form-group col-12 mb-3">
                                        <input name="firstname" type="text" class="form-control form-control-user"  placeholder="Fistname" required>
                                    </div>
                                    <div class="form-group col-12 mb-3">
                                        <input name="middlename" type="text" class="form-control form-control-user"  placeholder="Middlename" required>
                                    </div>
                                    <div class="form-group col-12 mb-3">
                                        <input name="lastname" type="text" class="form-control form-control-user"  placeholder="Lastname" required>
                                    </div>
                                    <div class="form-group col-12 mb-3">
                                        <input name="contact" type="number" class="form-control form-control-user"  placeholder="Contact#" required>
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

    <script>
        function handleReserve(data){
            room_id = data;
            checkRoomAvailability()
        }
    </script>
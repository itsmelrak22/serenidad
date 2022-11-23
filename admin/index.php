<?php
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
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

// print_r($rooms);

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
                            <div class="mb-1">
                                <a href="#" data-toggle="modal" data-target="#addModal">
                                    <button class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Add">
                                        <i class="fas fa-plus"></i>
                                        Add Transaction
                                    </button>
                                </a>
                            </div>
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
                                                    
                                                    

                                                    <?=
                                                        new DateTime($value['valid_until']) < new DateTime()
                                                        ?
                                                            '<button class="btn btn btn-disabled disabled btn-circle" data-toggle="tooltip" data-placement="top" title="Reservation Expired">
                                                                <i class="fas fa-check"></i>
                                                            </button>'
                                                        :
                                                            '<button class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Accept Reservation">
                                                                <i class="fas fa-check"></i>
                                                            </button>'
                                                            
                                                    ?>

                                                    <button class="btn btn-warning btn-circle" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                    
                                                    <button class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
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

    <?php include('includes/logout-modal.php') ?>
    <?php include('includes/scripts.php') ?>

    <script>
        $(function () {  //> tooltip
            $('[data-toggle="tooltip"]').tooltip()
        })

        const roomCheckinDates = [];
        const tempRoomCheckinDates = [];
        const rooms = [];
        let daysOfCheckin = 0;
        let selectedRoom = {}

        window.addEventListener ('load', function () {
            getRooms();
            checkRoomAvailability()

            $('.datepicker-checkin').datepicker({
                clearBtn: true,
                todayHighlight: true,
                startDate: new Date(),
                datesDisabled: roomCheckinDates
            })

            $('.datepicker-checkout').datepicker({
                clearBtn: true,
                todayHighlight: true,
                startDate: new Date(),
                datesDisabled: roomCheckinDates
            }); //> date picker
           
           
        }, false);
        
        function getRooms(){
            $.ajax({
                url: "queries/get_rooms.php",
                type: "post",
                data: {},
                success: function (response) {
                    const select = document.getElementById('select-rooms');
                    const data = $.parseJSON(response);
                    
                    $.each(data, function (i, item) { 
                        rooms.push(item) 
                        var opt = document.createElement('option')
                        opt.value = item.id
                        opt.innerHTML = `${item.room_type} - PHP ${item.price}`
                        if(i == 0) opt.setAttribute('selected', '')
                        select.appendChild(opt)
                    });  

                    select.value = 1;
                   
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

        function checkRoomAvailability(){
            const select = document.getElementById('select-rooms');
            const checkinInput = document.getElementById('datepicker-checkin');
            const checkoutInput = document.getElementById('datepicker-checkout');

            roomCheckinDates.splice(0); //> Clear array
            tempRoomCheckinDates.splice(0); //> Clear array

            if(checkinInput.value) checkinInput.value = '';
            if(checkoutInput.value) checkoutInput.value = '';

            let room_id = select.value ? select.value : 1
            $.ajax({
                url: "queries/check_room_avail_dates.php",
                type: "post",
                data: {
                    room_id: room_id
                },
                success: function (response) {
                    console.log(response)
                   $.each(response, function (i, item) {  
                        let data = new Date(item.checkin)
                        data = ((data.getMonth() > 8) ? (data.getMonth() + 1) : ('0' + (data.getMonth() + 1))) + '-' + ((data.getDate() > 9) ? data.getDate() : ('0' + data.getDate())) + '-' + data.getFullYear()
                        roomCheckinDates.push(data)
                        tempRoomCheckinDates.push(data)
                    });  

                    refreshDatePicker();

                    selectedRoom = rooms.find(res => res.id == room_id)
                    console.log(selectedRoom)
                
                    $('#priceBreakdownContainer').empty();  

                    const rows = `
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">You won't be charged yet</h6>
                        </div>
                        <div class="card-body container-fluid" >
                            <div>
                                <span > ${selectedRoom.price} x ${daysOfCheckin} Day(s)/Nights(s) </span> <span class="float-right"> ${ eval(selectedRoom.price * daysOfCheckin) } </span> 
                            </div>
                            <!-- <div>
                                <span > ₱500 x 1 Additional Bed </span> <span class="float-right"> ₱500 </span> 
                            </div> -->
                            <hr>
                            <div>
                                <span > Total before taxes:  </span> <span class="float-right"> ${ eval(selectedRoom.price * daysOfCheckin) } </span> 
                            </div>
                        </div>
                        `;  
                    $('#priceBreakdownContainer').append(rows);  
                    
                 },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

        function refreshDatePicker(){
            $(".datepicker-checkin").datepicker("destroy");

            $('.datepicker-checkin').datepicker({
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                startDate: new Date(),
                datesDisabled: roomCheckinDates
            })

            $(".datepicker-checkout").datepicker("destroy");

            $('.datepicker-checkout').datepicker({
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                startDate: new Date(),
                datesDisabled: roomCheckinDates
            })
        }

        function modifyCheckoutDate(){
            daysOfCheckin = 0;

            const checkinInput = document.getElementById('datepicker-checkin');
            const checkoutInput = document.getElementById('datepicker-checkout');

            roomCheckinDates.splice(0);
            tempRoomCheckinDates.map(res => roomCheckinDates.push(res))

            roomCheckinDates.push(checkinInput.value)
            checkoutInput.value = ''
            refreshDatePicker()

            $(".datepicker-checkout").datepicker("destroy");
            $('.datepicker-checkout').datepicker({
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                startDate: checkinInput.value,
                datesDisabled: roomCheckinDates
            })
            setPriceBreakdownContainer()
        }

        function differenceDates(){
            const checkinInput = document.getElementById('datepicker-checkin');
            const checkoutInput = document.getElementById('datepicker-checkout');

            if(!checkinInput.value || !checkoutInput.value) return;

            const Date1 = checkinInput.value
            const Date2 = checkoutInput.value
            const date1 = new Date(Date1);
            const date2 = new Date(Date2);
            const diffTime = Math.abs(date2 - date1);

            daysOfCheckin = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
            console.log(daysOfCheckin + " days");
            setPriceBreakdownContainer()
        }

        function setPriceBreakdownContainer(){
            $('#priceBreakdownContainer').empty();  
            const rows = `
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">You won't be charged yet</h6>
                </div>
                <div class="card-body container-fluid" >
                    <div>
                        <span > ${selectedRoom.price} x ${daysOfCheckin} Day(s)/Nights(s) </span> <span class="float-right"> ${ eval(selectedRoom.price * daysOfCheckin) } </span> 
                    </div>
                    <!-- <div>
                        <span > ₱500 x 1 Additional Bed </span> <span class="float-right"> ₱500 </span> 
                    </div> -->
                    <hr>
                    <div>
                        <span > Total before taxes:  </span> <span class="float-right"> ${ eval(selectedRoom.price * daysOfCheckin) } </span> 
                    </div>
                </div>
                `;  
            $('#priceBreakdownContainer').append(rows);  
        }
        
        


    </script>
            
</body>

</html>
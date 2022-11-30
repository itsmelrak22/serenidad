<?php
    include("Database.php");

    $connection = new Database('db_hor', 'localhost', 'root', 'admin');
    $connection->connect();
	$conn = new Room();
	$roomDatas = $conn->all();
?>

<?php include 'header.php';?>	

	<div class="container">
		<div class="section-header">
			<h2>MAKE A RESERVATION</h2>
		</div><!--/.section-header-->
		<div class="explore-content">
					<div class="row">
						<?php
							foreach ($roomDatas as $key => $room) {
								$room = (object) $room; //> convert to object 
						?>
							<div class=" col-md-4 col-sm-6">
								<div class="single-explore-item">
									<div class="single-explore-img">
										<img src="images/<?= $room->photo?>" alt="explore image">
										<div class="single-explore-img-info">
											<a href="<?= "add_reserve.php?room_id=$room->room_id" ?>">
												<button onclick="window.location.href='#'"> Reserve Now </button>
											</a>
											
											<!-- <div class="single-explore-image-icon-box">
												<ul>
													<li>
														<div class="single-explore-image-icon">
															<i class="fa fa-arrows-alt"></i>
														</div>
													</li>
													<li>
														<div class="single-explore-image-icon">
															<i class="fa fa-bookmark-o"></i>
														</div>
													</li>
												</ul>
											</div> -->
										</div>
									</div>
									<div class="single-explore-txt bg-theme-1">
										<h2> <?= $room->room_type ?> </h2>
										<p class="explore-rating-price">
											<span class="explore-price-box">
												Price: Php.
												<span class="explore-price"><?= $room->price ?></span>
											</span>

											<a href="<?= "add_reserve.php?room_id=$room->room_id" ?>">
												<button class="appsLand-btn" onclick="window.location.href=''">
													<span class="mx-2 appsLand-text-custom">RESERVE THIS ROOM</span>
												</button>
											</a>
										</p>
										
									</div>
								</div>
							</div>
						<?php
							}
						?>
					</div>
				</div>
	</div><!--/.container-->
<!-- 
    <script>
         $(document).ready(function() {
            $("#display").click(function() {                
                $.ajax({    //create an ajax request to display.php
                    type: "GET",
                    url: "test.php",             
                    dataType: "html",   //expect html to be returned                
                    success: function(response){                    
                        $("#responsecontainer").html(response); 
                        //alert(response);
                    }

                });
            });
        });
    </script> -->

<?php include 'footer.php';?>


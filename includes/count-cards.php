<?php
spl_autoload_register(function ($class) {
    include 'models/' . $class . '.php';
});

$connection = new Transaction();
$pendingCount = $connection->setQuery("SELECT Count(id) AS count FROM `transactions`   WHERE `status` LIKE 'Pending'")->getFirst();
$checkinCount = $connection->setQuery("SELECT Count(id) AS count FROM `transactions`   WHERE `status` LIKE 'Check In'")->getFirst();
$checkoutCount = $connection->setQuery("SELECT Count(id) AS count FROM `transactions`   WHERE `status` LIKE 'Check Out'")->getFirst();

?>


<!-- PENDING Card -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        PENDING</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $pendingCount->count ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-address-book fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CHECK IN Card -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        CHECK IN</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $checkinCount->count ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<!-- <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar"
                                    style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- CHECK OUT Card -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        CHECK OUT</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $checkoutCount->count ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
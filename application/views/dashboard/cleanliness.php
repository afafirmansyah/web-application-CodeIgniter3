<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?> Online Monitoring</h1>
        <a href="<?= base_url('Dashboard/downloadcleanliness'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <p class="mb-4">This method is based on particle counting and is expressed by a set of 3 code numbers, each ranging from 1 to 28, each code number represents particle counts from .01 particles per milliliter of fluid to 2,500,000 particles per milliliter.</p>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Flowrates</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="flowrate"></span> LPM</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tachometer-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Amount of Fuel Passed</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="fuel_processed"></span> Litres</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-faucet fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Cost per Litres</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">IDR <span id="actual_cpl"></span></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Differential Pressure
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><span id="filter_housing1"></span> Psid</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div id="before_dpt" class="progress-bar bg-danger" role="progressbar" style="" aria-valuenow="<?= $cleanliness['filter_housing1']; ?>" aria-valuemin="0" aria-valuemax="25"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">ISO Code - Before Filtration</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Data Before Filtration:</div>
                            <a class="dropdown-item" href="">Chart</a>
                            <a class="dropdown-item" href="<?= base_url('dashboard/datatablesbefore'); ?>">DataTables</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('Dashboard/downloadCleanlinessBefore'); ?>">Download Data</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h4 class="small font-weight-bold">4 microns <span class="float-right" id="before_code_4um"></span></h4>
                    <div class="progress mb-4">
                        <div id="width_before_4um" class="progress-bar bg-danger" role="progressbar" style="" aria-valuenow="<?= $cleanliness['before_code_4um']; ?>" aria-valuemin="0" aria-valuemax="25"></div>
                    </div>
                    <h4 class="small font-weight-bold">6 microns <span class="float-right" id="before_code_6um"></span></h4>
                    <div class="progress mb-4">
                        <div id="width_before_6um" class="progress-bar bg-warning" role="progressbar" style="" aria-valuenow="<?= $cleanliness['before_code_6um']; ?>" aria-valuemin="0" aria-valuemax="25"></div>
                    </div>
                    <h4 class="small font-weight-bold">14 microns <span class="float-right" id="before_code_14um"></span></h4>
                    <div class="progress">
                        <div id="width_before_14um" class="progress-bar bg-success" role="progressbar" style="" aria-valuenow="<?= $cleanliness['before_code_14um']; ?>" aria-valuemin="0" aria-valuemax="25"></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Content Column -->
        <div class="col-lg mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">ISO Code - After Filtration</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Data After Filtration:</div>
                            <a class="dropdown-item" href="">Chart</a>
                            <a class="dropdown-item" href="<?= base_url('dashboard/datatablesafter'); ?>">DataTables</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('Dashboard/downloadCleanlinessAfter'); ?>">Download Data</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h4 class="small font-weight-bold">4 microns <span class="float-right" id="after_code_4um"></span></h4>
                    <div class="progress mb-4">
                        <div id="width_after_4um" class="progress-bar bg-danger" role="progressbar" style="" aria-valuenow="<?= $cleanliness['after_code_4um']; ?>" aria-valuemin="0" aria-valuemax="25"></div>
                    </div>
                    <h4 class="small font-weight-bold">6 microns <span class="float-right" id="after_code_6um"></span></h4>
                    <div class="progress mb-4">
                        <div id="width_after_6um" class="progress-bar bg-warning" role="progressbar" style="" aria-valuenow="<?= $cleanliness['after_code_6um']; ?>" aria-valuemin="0" aria-valuemax="25"></div>
                    </div>
                    <h4 class="small font-weight-bold">14 microns <span class="float-right" id="after_code_14um"></span></h4>
                    <div class="progress">
                        <div id="width_after_14um" class="progress-bar bg-success" role="progressbar" style="" aria-valuenow="<?= $cleanliness['before_code_4um']; ?>" aria-valuemin="0" aria-valuemax="25"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>

</div>
</div>
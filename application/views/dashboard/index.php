<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url('Dashboard/downloadTransactions'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    <!-- <form>
        <input class="form-control" type="datetime-local" placeholder="select date time ..">
    </form>

    <div class="container">
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables - Transactions</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Key</th>
                            <th>Driver</th>
                            <th>Description</th>
                            <th>Registration</th>
                            <th>Litres</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transactions as $tr) : ?>
                            <tr>
                                <td><?= $tr['trans_date']; ?></td>
                                <td><?= $tr['trans_time']; ?></td>
                                <td><?= $tr['driver_id']; ?></td>
                                <td><?= $tr['driver_name']; ?></td>
                                <td><?= $tr['vehicle_desc']; ?></td>
                                <td><?= $tr['vehicle_number']; ?></td>
                                <td><?= $tr['trans_volume']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->
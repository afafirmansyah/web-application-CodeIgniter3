<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url('Dashboard/downloadCleanliness'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables - Cleanliness</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>B Code 4um</th>
                            <th>B Code 6um</th>
                            <th>B Code 14um</th>
                            <th>B Count 4um</th>
                            <th>B Count 6um</th>
                            <th>B Count 14um</th>
                            <th>A Code 4um</th>
                            <th>A Code 6um</th>
                            <th>A Code 14um</th>
                            <th>A Count 4um</th>
                            <th>A Count 6um</th>
                            <th>A Count 14um</th>
                            <th>DPT-1</th>
                            <th>DPT-2</th>
                            <th>Filter Brand</th>
                            <th>Filter Type</th>
                            <th>Qty of Element</th>
                            <th>Element Price</th>
                            <th>Fuel Processed</th>
                            <th>Cost per Litre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cleanliness as $c) : ?>
                            <tr>
                                <td><?= $c['date']; ?></td>
                                <td><?= $c['time']; ?></td>
                                <td><?= $c['before_code_4um']; ?></td>
                                <td><?= $c['before_code_6um']; ?></td>
                                <td><?= $c['before_code_14um']; ?></td>
                                <td><?= $c['before_count_4um']; ?></td>
                                <td><?= $c['before_count_6um']; ?></td>
                                <td><?= $c['before_count_14um']; ?></td>
                                <td><?= $c['after_code_4um']; ?></td>
                                <td><?= $c['after_code_6um']; ?></td>
                                <td><?= $c['after_code_14um']; ?></td>
                                <td><?= $c['after_count_4um']; ?></td>
                                <td><?= $c['after_count_6um']; ?></td>
                                <td><?= $c['after_count_14um']; ?></td>
                                <td><?= $c['filter_housing1']; ?></td>
                                <td><?= $c['filter_housing2']; ?></td>
                                <td><?= $c['filter_brand']; ?></td>
                                <td><?= $c['filter_type']; ?></td>
                                <td><?= $c['element_qty']; ?></td>
                                <td><?= $c['element_price']; ?></td>
                                <td><?= $c['fuel_processed']; ?></td>
                                <td><?= $c['actual_cpl']; ?></td>
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
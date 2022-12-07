<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?> After Filtration</h1>
        <a href="<?= base_url('Dashboard/cleanliness'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-square-left fa-sm text-white-50"></i> Back to Dashboard</a>
    </div>

    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables - Cleanliness After Filtration</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Code 4 μm</th>
                            <th>Code 6 μm</th>
                            <th>Code 14 μm</th>
                            <th>Count 4 μm</th>
                            <th>Count 6 μm</th>
                            <th>Count 14 μm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cleanliness as $c) : ?>
                            <tr>
                                <td><?= $c['date']; ?></td>
                                <td><?= $c['time']; ?></td>
                                <td><?= $c['after_code_4um']; ?></td>
                                <td><?= $c['after_code_6um']; ?></td>
                                <td><?= $c['after_code_14um']; ?></td>
                                <td><?= $c['after_count_4um']; ?></td>
                                <td><?= $c['after_count_6um']; ?></td>
                                <td><?= $c['after_count_14um']; ?></td>
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
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?> - <?= $role['role']; ?></h1>
        <a href="<?= base_url('admin/role'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-square-left fa-sm text-white-50 mr-1"></i> Back to Role Access</a>
    </div>

    <p class="mb-4">Role access control restricts network access based on a person's role within an organization and has become one of the main methods for advanced access control. The roles refer to the levels of access that employees have to the main menu.</p>

    <div class="row">
        <div class="col-auto">

            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Role Access - <?= $role['role']; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <?php foreach ($menu as $m) : ?>
                                        <th scope="col" style="text-align: center"><?= $m['menu']; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach ($menu as $m) : ?>
                                        <td style="height:50px">
                                            <div class="form-check" style="text-align: center">
                                                <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu=" <?= $m['id']; ?>">
                                            </div>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
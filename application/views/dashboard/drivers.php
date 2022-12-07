<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newDriverModal"><i class="fas fa-plus-square fa-sm text-white-50 mr-1"></i> Add New Driver</a>
    </div>

    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables - Drivers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Key</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($drivers as $d) : ?>
                            <tr>
                                <td><?= $d['driver_id']; ?></td>
                                <td><?= $d['driver_name']; ?></td>
                                <td><?= $d['driver_desc']; ?></td>
                                <td>
                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#EditUser<?= $d['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="" class="badge badge-danger" data-toggle="modal" data-target="#DeleteUser<?= $d['id']; ?>"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>

                            <!-- Modal Edit User -->
                            <div class="modal fade" id="EditUser<?= $d['id']; ?>" tabindex="-1" aria-labelledby="EditUserLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="EditUserLabel">Edit driver</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form class="user" action="<?= base_url('dashboard/editdriver/') . $d['id']; ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="editName" name="editName" value="<?= $d['driver_name']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="editDesc" name="editDesc" value="<?= $d['driver_desc']; ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Delete User -->
                            <div class="modal fade" id="DeleteUser<?= $d['id']; ?>" tabindex="-1" aria-labelledby="DeleteUserLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="DeleteUserLabel">Delete driver</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Are you sure you want to delete <strong><?= $d['driver_name']; ?>?</strong></div>
                                        <form action="<?= base_url('dashboard/deleteDriver/') . $d['id']; ?>" method="post">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->

<!-- Modal Add New Vehicle-->
<div class="modal fade" id="newDriverModal" tabindex="-1" aria-labelledby="newDriverModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDriverModalLabel">Add New Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('dashboard/drivers'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="driver_id" name="driver_id" placeholder="Key">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="driver_desc" name="driver_desc" placeholder="Description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
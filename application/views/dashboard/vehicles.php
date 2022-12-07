<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newVehicleModal"><i class="fas fa-plus-square fa-sm text-white-50 mr-1"></i> Add New Vehicle</a>

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
            <h6 class="m-0 font-weight-bold text-primary">DataTables - Vehicles</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Key</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Registration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vehicles as $v) : ?>
                            <tr>
                                <td><?= $v['vehicle_id']; ?></td>
                                <td><?= $v['vehicle_name']; ?></td>
                                <td><?= $v['vehicle_desc']; ?></td>
                                <td><?= $v['vehicle_number']; ?></td>
                                <td>
                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#EditUser<?= $v['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="" class="badge badge-danger" data-toggle="modal" data-target="#DeleteUser<?= $v['id']; ?>"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>

                            <!-- Modal Edit User -->
                            <div class="modal fade" id="EditUser<?= $v['id']; ?>" tabindex="-1" aria-labelledby="EditUserLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="EditUserLabel">Edit Vehicle</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form class="user" action="<?= base_url('dashboard/editVehicle/') . $v['id']; ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="editName" name="editName" value="<?= $v['vehicle_name']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="editDesc" name="editDesc" value="<?= $v['vehicle_desc']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="editReg" name="editReg" value="<?= $v['vehicle_number']; ?>">
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
                            <div class="modal fade" id="DeleteUser<?= $v['id']; ?>" tabindex="-1" aria-labelledby="DeleteUserLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="DeleteUserLabel">Delete Vehicle</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Are you sure you want to delete <strong><?= $v['vehicle_name']; ?>?</strong></div>
                                        <form action="<?= base_url('dashboard/deleteVehicle/') . $v['id']; ?>" method="post">
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
<div class="modal fade" id="newVehicleModal" tabindex="-1" aria-labelledby="newVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newVehicleModalLabel">Add New Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('dashboard/vehicles'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="vehicle_id" name="vehicle_id" placeholder="Key">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="vehicle_desc" name="vehicle_desc" placeholder="Description">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" placeholder="Registration">
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
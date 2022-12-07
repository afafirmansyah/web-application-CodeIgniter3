<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newUserModal"><i class="fas fa-plus-square fa-sm text-white-50 mr-1"></i> Add New User</a>
    </div>

    <p class="mb-4">User management is an organizational function that allows users to access and control menus. Modern user management services provide end-to-end user account management, including user registration, login, and permission.</p>

    <div class="row">
        <div class="col-lg">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables - User Management</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope=" col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role id</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($database as $db) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $db['name']; ?></td>
                                        <td><?= $db['email']; ?></td>
                                        <td><?= $db['role_id']; ?></td>
                                        <td>
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#EditUser<?= $db['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#DeleteUser<?= $db['id']; ?>"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>

                                    <!-- Modal Edit User -->
                                    <div class="modal fade" id="EditUser<?= $db['id']; ?>" tabindex="-1" aria-labelledby="EditUserLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="EditUserLabel">Edit Role User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="user" action="<?= base_url('admin/editRoleUser/') . $db['id']; ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="editName" name="editName" value="<?= $db['name']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="editEmail" name="editEmail" value="<?= $db['email']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <select name="editRole" id="editRole" class="form-control">
                                                                <option value="">Select Role</option>
                                                                <?php foreach ($role as $r) : ?>
                                                                    <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
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
                                    <div class="modal fade" id="DeleteUser<?= $db['id']; ?>" tabindex="-1" aria-labelledby="DeleteUserLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="DeleteUserLabel">Delete User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure you want to delete <strong><?= $db['name']; ?>?</strong></div>
                                                <form action="<?= base_url('admin/deleteUser/') . $db['id']; ?>" method="post">
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
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add User -->
<div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserModalLabel">Create an Account!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="user" action="<?= base_url('admin/registration'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control " id="password1" name="password1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control " id="password2" name="password2" placeholder="Repeat Password">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
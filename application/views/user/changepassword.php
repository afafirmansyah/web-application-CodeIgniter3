<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Account Settings - <?= $title; ?></h1>
    <p class="mb-3">Account settings are used to manage basic account preferences, you can edit your name, profile photo, and change password. To find your settings, click in the top right corner of your homepage and select "Settings".</p>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user'); ?>">My Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/edit'); ?>">Edit Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('user/changepassword'); ?>"><?= $title; ?></a>
        </li>
    </ul>


    <div class="row mt-3">
        <div class="col-lg-5">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('user/changepassword') ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password1">New Password</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password2">Repeat Password</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password </button>
                </div>
            </form>

        </div>
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
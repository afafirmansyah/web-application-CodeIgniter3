<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Account Settings - <?= $title; ?></h1>
    <p class="mb-3">Account settings are used to manage basic account preferences, you can edit your name, profile photo, and change password. To find your settings, click in the top right corner of your homepage and select "Settings".</p>


    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('user'); ?>"><?= $title; ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/edit'); ?>">Edit Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/changepassword'); ?>">Change Password</a>
        </li>
    </ul>


    <div class="row mt-3">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">PT. Yerry Primatama Hosindo [Engineering Division] Member since <?= date('d F Y', $user['date_created']); ?></small></p>

                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
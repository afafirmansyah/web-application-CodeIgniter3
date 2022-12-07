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
            <a class="nav-link active" href="<?= base_url('user/edit'); ?>"><?= $title; ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/changepassword'); ?>">Change Password</a>
        </li>
    </ul>

    <div class="row mt-3">
        <div class="col-lg-8">
            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full name</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-5">
                            <div class="custom-file ml-3">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save Changes </button>
                </div>

            </div>

            </form>

        </div>

    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
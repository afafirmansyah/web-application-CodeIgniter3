<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class=" col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="form-group">
                            <img src="<?php echo base_url(); ?>assets/img/yphe-2.png" style="max-width: 100%; max-height: 100%;">
                        </div>
                        <!-- <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login to View Dashboard</h1>
                        </div> -->
                        <hr>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="post" action="<?= base_url('auth'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                        <hr>
                        <div class="form-group text-center">
                            <img src="<?php echo base_url(); ?>assets/img/yphe-3.png" style="max-width: 60%; max-height: 60%;">
                        </div>
                        <!-- <div class="text-center">
                            <a class="small" href="<?= base_url('auth/forgot'); ?>">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth/registration') ?>">Need an account? Sign up!</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
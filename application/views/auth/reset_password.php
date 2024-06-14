<div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-5 mb-4">
                                <a href="" class="d-block auth-logo">
                                    <img src="<?= base_url('assets/images/logo-dark.svg'); ?>" alt="" height="30" class="auth-logo-dark">
                                    <img src="<?= base_url('assets/images/logo-light.svg'); ?>" alt="" height="30" class="auth-logo-light">
                                </a>
                            </h3>
                            <?php if ($this->session->flashdata('message') !== null) {?>
                            <div class="alert alert-<?php echo $this->session->flashdata('message')['0'] == 1 ? 'success' : 'danger'; ?> alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close">×</button>
                                <?php print_r($this->session->flashdata('message')['1']);?>
                            </div>
                            <?php }?>
                            <div class="p-3">
                                <p class="text-muted text-center">Reset Password</p>
                                <?php $attr = array('id' => 'login-form');?>
                                <?php echo form_open(current_url(), $attr); ?>
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password" autocomplete="off">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <label>Confirm Password</label>
                                        <input type="password" name="re_password" class="form-control" placeholder="Enter Password">
                                        <?php echo form_error('re_password'); ?>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="text-center">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Reset</button>
                                        </div>
                                    </div>
                                    
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
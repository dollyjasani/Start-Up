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
                                <p class="text-muted text-center">Forgot Password</p>
                                <?php $attr = array('id' => 'forgot_email');?>
                                <?php echo form_open(current_url(), $attr); ?>
                                    <div class="mb-3">
                                        <label for="email">Email*</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="text-center">
                                            <button class="btn btn-primary waves-effect waves-light frgt_btn"
                                                type="submit">Submit</button>
                                        </div>
                                    </div>
                                    <div class="text-center fs-15 mt-3 pb-3"> <a href="<?= base_url('auth/login'); ?>" class="text-primary">Back to Login</a> </div>
                                    
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <p class="text-muted text-center">Login in to Hey Logistic.</p>
                                <?php $attr = array('id' => 'login-form');?>
                                <?php echo form_open(current_url(), $attr); ?>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="text-end mb-3">
                                            <a href="<?= base_url('auth/forgot_password'); ?>" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="text-center">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Log In</button>
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
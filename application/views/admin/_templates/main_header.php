<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/images/logo-sm.png') ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/images/logo-dark.svg') ?>" alt="" height="17">
                    </span>
                </a>

                <a href="" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/images/logo-sm.png') ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/images/logo-light.svg') ?>" alt="" height="18">
                    </span>
                </a>
            </div>

            <button type="button"
                class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if($this->user->profile_image){?>
                         <img class="rounded-circle header-profile-user" src="<?=base_url($this->user->profile_image) ?>"
                        alt="Header Avatar">
                  <?php  }else{?>
                    <img class="rounded-circle header-profile-user" src="<?= base_url('assets/images/profile.png') ?>"
                        alt="Header Avatar">
                    <?php } ?>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="<?=base_url('admin/profile');?>"><i
                            class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i>
                        Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?= base_url('auth/logout') ?>"><i
                            class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i>
                        Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>
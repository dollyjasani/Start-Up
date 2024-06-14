<div class="main-content">
	<div class="page-content">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-sm-6">
	                <div class="page-title-box">
	                    <h4><?=$title?></h4>
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard')?>">Dashboard</a></li>
	                        <li class="breadcrumb-item active"><?=$title?></li>
	                    </ol>
	                </div>
	            </div>
	        </div>
            <?php if ($this->session->flashdata('message') !== null) {?>
            <div class="alert alert-<?php echo $this->session->flashdata('message')['0'] == 1 ? 'success' : 'danger'; ?> alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close">×</button>
                <?php print_r($this->session->flashdata('message')['1']);?>
            </div>
            <?php }?>
	        <div class="row">
	            <div class="col-lg-12">
	                <div class="card">
	                    <h4 class="card-header font-16 mt-0"><?=$title?></h4>
	                    <?php
		                $attrib = array('data-toggle' => 'validator', 'class' => 'repeater', 'role' => 'form', 'data-disable' => 'false', 'id' => "profile");
		                echo form_open_multipart("", $attrib);
		                ?>
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="col-md-6">
	                                <div class="mb-3">
	                                <label>First Name</label>
	                                    <input type="text" name="first_name" class="form-control" value="<?=$user->first_name?>" placeholder="Please Enter First Name">
	                                </div>
	                            </div>
	                            <div class="col-md-6">
	                                <div class="mb-3">
	                                <label>Last Name</label>
	                                    <input type="text" name="last_name" class="form-control" value="<?=$user->last_name?>" placeholder="Please Enter Last Name">
	                                </div>
	                            </div>
	                            <div class="col-md-6">
	                                <div class="mb-3">
	                                <label>Email</label>
	                                    <input type="email" name="email" class="form-control" value="<?=$user->email?>" placeholder="Please Enter Email" disabled="">
	                                </div>
	                            </div>
	                            <div class="col-md-6">
	                                <div class="mb-3">
	                                <label>Phone</label>
	                                    <input type="number" name="phone" class="form-control" value="<?=$user->phone?>" placeholder="Please Enter Phone">
	                                </div>
	                            </div>
	                            <?php if ($user->user_type != 1) { ?>
	                            <div class="col-md-6">
	                            	<div class="mb-3">
	                            		<label>Password</label>
	                            		<input type="password" name="password" id="passwords" class="form-control" placeholder="Please Enter Password">
	                            	</div>
	                            </div>
	                            <div class="col-md-6">
	                            	<div class="mb-3">
	                            		<label>Confirm Password</label>
	                            		<input type="password" name="re_password" class="form-control" placeholder="Please Enter Confirm Password">
	                            	</div>
	                            </div>
	                            <?php } ?>
	                            <div class="col-md-6">
	                            	<div class="mb-3">
	                            		<label class="form-lable">Image</label>
	                            		<input type="file" name="profile_image" class="form-control filestyle" data-buttonname="btn-secondary">
	                            		<?php if ($user->profile_image) {?>
						                    <br>
						                    <img src="<?=base_url($user->profile_image);?>" alt="" style="height: 100px; width: 100px;">
						                <?php }?>
	                            	</div>
	                            </div>
	                        </div>
	                    </div>
						<div class="card-footer">
		                    <button type="submit" class="btn btn-success"><?=$title?></button>
		                </div>
                    	<?php echo form_close(); ?>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<div class="main-content">
	<div class="page-content">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-sm-6">
	                <div class="page-title-box">
	                    <h4><?=$title?></h4>
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard')?>">Dashboard</a></li>
	                        <li class="breadcrumb-item"><a href="<?=base_url('admin/startup')?>">Startup List</a></li>
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
		                $attrib = array('data-toggle' => 'validator', 'class' => 'repeater', 'role' => 'form', 'data-disable' => 'false', 'id' => "add_xlsx_file");
		                echo form_open_multipart("", $attrib);
		                ?>
	                    <div class="card-body">

                        <div class="well well-small">
                            <p>
                                <span class="text-warning">The first line in downloaded csv file should remain as it is. Please do not change the order of columns.</span>
                                <br>The correct column order is
                                <span class="text-info"> (PRODUCT NAME, PRODUCT TYPE, SIZE, QUANTITY , CORE, PACKING, LIST PRICE, MINIMUM DISCOUNT, MAXIMUM DISCOUNT, PRICE LIST)
                                </span> & you must follow this.
                            </p>
                            <span class="text-primary">System will check if the Description as product name belong to any product then will update that product otherwise will add new product.</span>
                        </div>
	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="mb-3">
	                                <label>Upload csv</label>
		                                <div class="custom-file">
		                                    <input type="file" class="custom-file-input form-control" name="csv_file" 
                                        accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .csv">
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
						<div class="card-footer">
		                    <button type="submit" class="btn btn-success"><?=$title?></button>
		                    <a href="<?=base_url('admin/startup')?>" class="btn btn-danger">Cancel</a>
		                </div>
                    	<?php echo form_close(); ?>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
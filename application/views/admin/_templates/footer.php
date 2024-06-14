<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    </div>
        <div class="modal fade in" id="customModel" tabindex="-1" role="dialog" aria-labelledby="customModel" aria-hidden="true" style="overflow: auto;"></div>
        <div class="modal fade in" id="customModel2" tabindex="-1" role="dialog" aria-labelledby="customModel" aria-hidden="true" style="overflow: auto;"></div>
         <div class="modal fade overflow-hidden" id="modal-image" role="dialog" aria-labelledby="modal-default"aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <img src="" alt="img" id="image-model">
                </div>
            </div>
        </div>
        <div class="modal fade in" id="lightbox" role="dialog" aria-labelledby="customModel" aria-hidden="true">
        <div class="modal-dialog modal-top">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" class="popup-image">
            </div>
        </div>
        </div>
        </div>
        </div>
    <!-- JAVASCRIPT -->
    <script type="text/javascript">
    var site_url = '<?=base_url();?>';
    </script>
    <!-- Moment js-->
    <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?=base_url('assets/libs/moment/moment.min.js')?>"></script>
    <script src="<?=base_url('assets/libs/sweetalert2/sweetalert2.min.js')?>"></script>
    <script src="<?=base_url('assets/js/pages/sweet-alerts.init.js')?>"></script>
    <script src="<?= base_url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/node-waves/waves.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/jquery-sparkline/jquery.sparkline.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/jquery-validation/jquery.validate.min.js') ?>"></script>
    <script src="<?=base_url('assets/libs/datatable/js/jquery.dataTables.js');?>"></script>
    <script src="<?=base_url('assets/libs/datatable/js/dataTables.bootstrap4.js');?>"></script>
    <script src="<?=base_url('assets/libs/datatable/js/dataTables.buttons.min.js');?>"></script>
    <!-- Select2 js -->
    <script src="<?= base_url('assets/libs/select2/js/select2.full.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <!-- App js -->
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
    <!--tinymce js-->
    <script src="<?=base_url('assets/libs/tinymce/tinymce.min.js');?>"></script>
    <!-- Table Editable plugin -->
    <script src="<?= base_url('assets/libs/table-edits/build/table-edits.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/pages/table-editable.int.js'); ?>"></script>
    <!-- Custom Js-->
    <script src="<?=base_url('assets/js/custom.js?v='.time());?>"></script>
</body>

</html>
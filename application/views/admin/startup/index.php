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
                <div class="col-sm-6">
                    <div class="state-information d-none d-sm-block">
                        <div class="state-graph">
                            <a href="<?=base_url('admin/startup/import/');?>" class="btn btn-primary waves-effect waves-light btn-lg"></i>Import</a>
                        </div>
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
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?=$title?></h4>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="startup" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Country</th>
                                            <th>Sector</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        oTable = $('#startup').dataTable({
            "aaSorting": [[1, "asc"]],
            "serverSide": true,
            "fixedHeader": true,
            "responsive": false,
            "autoWidth" : false,
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            "iDisplayLength": 10,
            'bProcessing': true, 'bServerSide': true,"bDestroy": true,"bRetrieve":true,
            'sAjaxSource': "<?=site_url('admin/startup/getStartup/')?>",
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?=$this->security->get_csrf_token_name()?>",
                    "value": "<?=$this->security->get_csrf_hash()?>"
                },
                {
                    "name": "sColumns",
                    "value": "",
                });

                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "columnDefs": [{
                "defaultContent": "-",
                "targets": "_all",
            }],
            "aoColumns": [
            {
                "bVisible": false,
            },
            null,
            null,
            null,
            null,
            ],
            'fnRowCallback': function (nRow, aData, iDisplayIndex) {
                var oSettings = oTable.fnSettings();
                nRow.id = aData[0];
                nRow.className = "startup_list";
                return nRow;
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            },
            "fnDrawCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                $('[data-toggle="popover"]').popover();
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
    $(document).on('click', 'tr td:first-child', function(){
       $('[data-toggle="popover"]').popover();
       $('[data-toggle="tooltip"]').tooltip();
    });
</script>
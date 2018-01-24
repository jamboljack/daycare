<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">Jasa Kurir</h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Setting</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Jasa Kurir</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt">
                    <i class="icon-calendar">&nbsp; </i><span class="uppercase visible-lg-inline-block"><?php echo tgl_indo(date('Y-m-d')); ?></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box red-thunderbird">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Daftar Jasa Kurir
                        </div>
                    </div>
                    <div class="portlet-body">
                        <a href="<?php echo site_url('admin/courier/adddata'); ?>">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </a>
                        <br><br>
                        <table class="table table-striped table-hover" id="tableData">
                            <thead>
                                <tr>
                                    <th width="5%"></th>
                                    <th width="5%">No</th>
                                    <th width="20%">Nama Kurir</th>
                                    <th>Deskrpsi</th>
                                    <th width="10%">URL</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>backend/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<script type="text/javascript">
var table;
$(document).ready(function() {
    table = $('#tableData').DataTable({ 
        "pageLength" : 10,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [2, 'asc'],
        "ajax": {
            "url": "<?php echo site_url('admin/courier/data_list')?>",
            "type": "POST"
        },
        "columnDefs": [
        { 
            "targets": [ 0, 1,],
            "orderable": false,
        },
        ],
    }); 
});
</script>
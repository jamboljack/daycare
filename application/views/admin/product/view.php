<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>backend/js/jquery.maskMoney.min.js"></script>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">Produk</h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Daftar Produk</a>
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
                            <i class="fa fa-search"></i> Filter Data
                        </div>
                        <div class="tools">
                            <a class="collapse"></a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" id="form-filter" class="form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Kategori</label>
                                            <div class="col-md-9">
                                                <select name="lstCategory" id="lstCategory" class="form-control">
                                                    <option value="">- Pilih Kategori -</option>
                                                    <?php
                                                    foreach($listCategory as $r) {
                                                    ?>
                                                    <option value="<?php echo $r->category_id; ?>"><?php echo $r->category_name; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tanggal Input</label>
                                            <div class="col-md-9">
                                                <div class="input-group input-large">
                                                    <input type="text" class="form-control date-picker" name="date_create_from" id="date_create_from" placeholder="Dari" data-date-format="dd-mm-yyyy">
                                                    <div class="form-control-focus"></div>
                                                    <span class="input-group-addon"><b>s/d</b></span>
                                                    <input type="text" class="form-control date-picker" name="date_create_to" id="date_create_to" placeholder="Sampai" data-date-format="dd-mm-yyyy">
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Harga</label>
                                            <div class="col-md-9">
                                                <div class="input-group input-large">
                                                    <input type="text" class="form-control" name="price_from" id="price_from" placeholder="Harga Dari">
                                                    <div class="form-control-focus"></div>
                                                    <span class="input-group-addon"><b>s/d</b></span>
                                                    <input type="text" class="form-control" name="price_to" id="price_to" placeholder="Harga Sampai">
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Status</label>
                                            <div class="col-md-5">
                                                <select name="lstStatus" id="lstStatus" class="form-control">
                                                    <option value="">- Pilih -</option>
                                                    <option value="published">Published</option>
                                                    <option value="notpublished">Not Published</option>
                                                    <option value="deleted">Deleted</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Penjualan</label>
                                            <div class="col-md-9">
                                                <div class="input-group input-large">
                                                    <input type="text" class="form-control" name="sell_from" id="sell_from" placeholder="Terjual Dari">
                                                    <div class="form-control-focus"></div>
                                                    <span class="input-group-addon"><b>s/d</b></span>
                                                    <input type="text" class="form-control" name="sell_to" id="sell_to" placeholder="Terjual Sampai">
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12" align="center">
                                        <button type="button" class="btn btn-warning" id="btn-filter"><i class="fa fa-search"></i> Filter</button>
                                        <button type="button" class="btn btn-default" id="btn-reset"><i class="fa fa-refresh"></i> Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box red-thunderbird">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Daftar Produk
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="fullscreen" data-original-title="" title=""></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover" id="tableData">
                            <thead>
                                <tr>
                                    <!-- <th width="1%"><input type="checkbox" class="group-checkable" name="select_all[]" id="select_all"></th> -->
                                    <th width="5%">Action</th>
                                    <th width="5%">No</th>
                                    <th>Nama Produk</th>
                                    <th width="13%">Kategori</th>
                                    <th width="10%">Harga</th>
                                    <th width="8%">Jual</th>
                                    <th width="10%">Tanggal</th>
                                    <th width="10%">Status</th>
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
<script src="<?php echo base_url(); ?>backend/assets/global/scripts/datatable.js"></script>
<script type="text/javascript">
$('#price_from').maskMoney({thousands:',', precision:0});
$('#price_to').maskMoney({thousands:',', precision:0});
$('#sell_from').maskMoney({thousands:',', precision:0});
$('#sell_to').maskMoney({thousands:',', precision:0});

function reload_table() {
    table.ajax.reload();
}

var table;
$(document).ready(function() {
    $('.date-picker').datepicker({
        rtl: Metronic.isRTL(),
        orientation: "left",
        autoclose: true
    });
    
    table = $('#tableData').DataTable({
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [ 2, 'asc'],
        "lengthMenu": [
                [15, 30, 50, 75, 100, -1],
                [15, 30, 50, 75, 100, "All"]
        ],
        "pageLength": 15,
        "ajax": {
            "url": "<?php echo site_url('admin/product/data_list')?>",
            "type": "POST",
            "data": function(data) {
                data.lstCategory        = $('#lstCategory').val();
                data.price_from         = $('#price_from').val();
                data.price_to           = $('#price_to').val();
                data.sell_from          = $('#sell_from').val();
                data.sell_to            = $('#sell_to').val();
                data.date_create_from   = $('#date_create_from').val();
                data.date_create_to     = $('#date_create_to').val();
                data.lstStatus          = $('#lstStatus').val();
            }
        },
        "columnDefs": [
        { 
            "targets": [ 0, 1 ],
            "orderable": false,
        },
        ],
    });

    $('#btn-filter').click(function() {
        reload_table();
    });

    $('#btn-reset').click(function() {
        $('#form-filter')[0].reset();
        reload_table();
    });
});
</script>
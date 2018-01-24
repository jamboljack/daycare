<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>backend/js/jquery.maskMoney.min.js"></script>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">Daftar Order</h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Transaksi</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Daftar Order</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt">
                    <i class="icon-calendar">&nbsp; </i><span class="uppercase visible-lg-inline-block"><?=tgl_indo(date('Y-m-d'));?></span>
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
                                            <label class="control-label col-md-3">Status</label>
                                            <div class="col-md-9">
                                                <select name="lstStatus" id="lstStatus" class="form-control">
                                                    <option value="">- Pilih Status -</option>
                                                    <option value="BB">Belum Bayar</option>
                                                    <option value="BK">Belum Kirim</option>
                                                    <option value="BT">Belum Terima</option>
                                                    <option value="S">Selesai</option>
                                                    <option value="B">Batal</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tanggal Order</label>
                                            <div class="col-md-9">
                                                <div class="input-group input-large">
                                                    <input type="text" class="form-control date-picker" name="date_order_from" id="date_order_from" placeholder="Dari" data-date-format="dd-mm-yyyy">
                                                    <div class="form-control-focus"></div>
                                                    <span class="input-group-addon"><b>s/d</b></span>
                                                    <input type="text" class="form-control date-picker" name="date_order_to" id="date_order_to" placeholder="Sampai" data-date-format="dd-mm-yyyy">
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
                            <i class="fa fa-list"></i> Daftar Order
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="fullscreen" data-original-title="" title=""></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover" id="tableData">
                            <thead>
                                <tr>
                                    <th width="5%">Action</th>
                                    <th width="5%">No</th>
                                    <th width="10%">Invoice #</th>
                                    <th>Nama Pembeli</th>
                                    <th width="10%">Tanggal</th>
                                    <th width="10%">Tgl. Tempo</th>
                                    <th width="10%">Subtotal</th>
                                    <th width="10%">Ongkir</th>
                                    <th width="10%">Total</th>
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
$('#qty_from').maskMoney({thousands:',', precision:0});
$('#qty_to').maskMoney({thousands:',', precision:0});

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
            "url": "<?=site_url('admin/order/data_list');?>",
            "type": "POST",
            "data": function(data) {
                data.lstStatus         = $('#lstStatus').val();
                data.date_order_from   = $('#date_order_from').val();
                data.date_order_to     = $('#date_order_to').val();
            }
        },
        "columnDefs": [
        { 
            "targets": [ 0, 1],
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


    $('#select_all').on('click',function(){
        if(this.checked){
            $('.icheck').each(function(){
                this.checked = true;
            });
        }else{
             $('.icheck').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.icheck').on('click',function(){
        if($('.icheck:checked').length == $('.icheck').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>
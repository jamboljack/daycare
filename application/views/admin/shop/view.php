<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>

<script>
    function approveData(shop_id) {
        var id = shop_id;
        swal({
            title: 'Anda Yakin ?',
            text: 'Toko ini akan di Terima',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Terima',
            cancelButtonText: 'Tidak',
            closeOnConfirm: true
        }, function(isConfirm) {
            if (!isConfirm) return;
            $.ajax({
                url : "<?php echo site_url('admin/shop/approvedata')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    if (data) {
                        setTimeout(function() {
                            swal({
                                title:"Sukses",
                                text: "Email Konfirmasi Berhasil Terkirim",
                                timer: 2000,
                                showConfirmButton: false,
                                type: "success"
                            })
                        });
                        reload_table();
                    } else {
                        setTimeout(function() {
                            swal({
                                title:"Error",
                                text: "Email Konfirmasi Gagal",
                                timer: 2000,
                                showConfirmButton: false,
                                type: "error"
                            })
                        });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Update Data');
                }
            });
        });
    }
</script>

<div class="modal" id="filterData" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" id="form-filter" class="form-horizontal">

            <div class="modal-header">                      
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Filter Data</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">                    
                    <label class="col-md-4 control-label">Kategori</label>
                    <div class="col-md-8">
                        <select class="form-control select2me" name="lstCategory" id="lstCategory">
                            <option value="">SEMUA</option>
                            <?php
                            foreach($listCategory as $r) {
                            ?>
                            <option value="<?=$r->category_id;?>"><?=$r->category_name;?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">                    
                    <label class="col-md-4 control-label">Status</label>
                    <div class="col-md-8">
                        <select class="form-control" name="lstStatus" id="lstStatus">
                            <option value="">SEMUA</option>
                            <option value="Active">Active</option>
                            <option value="Non Active">Non Active</option>
                            <option value="Reject">Reject</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">                    
                    <label class="col-md-4 control-label">Banned</label>
                    <div class="col-md-8">
                        <select class="form-control" name="lstBanned" id="lstBanned">
                            <option value="">SEMUA</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="btn-filter"><i class="fa fa-search"></i> Filter</button>
                <button type="button" class="btn btn-default" id="btn-reset"><i class="fa fa-refresh"></i> Reset</button>
            </div>
            </form>
        </div>        
    </div>    
</div>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">Toko</h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Toko</a>
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
                            <i class="fa fa-list"></i> Daftar Toko
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="fullscreen" data-original-title="" title=""></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <a data-toggle="modal" data-target="#filterData">
                            <button type="button" class="btn btn-warning"><i class="fa fa-search"></i> Filter Data</button>
                        </a>
                        <br><br>
                        <table class="table table-striped table-hover" id="tableData">
                            <thead>
                                <tr>
                                    <th width="12%"></th>
                                    <th width="5%">No</th>
                                    <th>Nama Toko</th>
                                    <th width="15%">Domain Toko</th>
                                    <th width="15%">Kategori</th>
                                    <th width="10%">Status</th>
                                    <th width="5%">Banned</th>
                                    <th width="10%">Join</th>
                                    <th width="10%">Logo</th>
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
<script type="text/javascript" src="<?php echo base_url(); ?>backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript">
function reload_table() {
    table.ajax.reload();
}

var table; 
$(document).ready(function() {
    table = $('#tableData').DataTable({ 
        "processing": false,
        "serverSide": true,
        "order": [ 2, 'asc'],
        "lengthMenu": [
                [20, 50, 75, 100, -1],
                [20, 50, 75, 100, "All"]
        ],
        "pageLength": 20,
        "ajax": {
            "url": "<?php echo site_url('admin/shop/data_list')?>",
            "type": "POST",
            "data": function(data) {
                data.lstCategory= $('#lstCategory').val();
                data.lstStatus  = $('#lstStatus').val();
                data.lstBanned  = $('#lstBanned').val();
            }
        },
        "columnDefs": [
        { 
            "targets": [ 0, 1, 8 ],
            "orderable": false,
        },
        ],
    });

    $('#btn-filter').click(function() {
        reload_table();
        $('#filterData').modal('hide');
    });

    $('#btn-reset').click(function() {
        $('#form-filter')[0].reset();
        reload_table();
        $('#filterData').modal('hide');
    });
});

function reject_data(id) {
    $('#formReject')[0].reset();
    
    $.ajax({
        url : "<?php echo site_url('admin/shop/get_data/'); ?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#id').val(data.shop_id);
            $('#shopname').val(data.shop_name);
            $('#shopdomain').val(data.shop_domain);
            $('#create').val(data.shop_created);
            $('#formModalEdit').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

$(document).ready(function() {
    var form        = $('#formReject');
    var error       = $('.alert-danger', form);
    var success     = $('.alert-success', form);
    
    $("#formReject").validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: {
            desc: { required: true }
        },
        messages: { 
            desc: {
                required :'Alasan Penolakan harus diisi'
            }
        },
        invalidHandler: function (event, validator) {
            success.hide();
            error.show();
            Metronic.scrollTo(error, -200);
        },
        errorPlacement: function (error, element) {
            var icon = $(element).parent('.input-icon').children('i');
            icon.removeClass('fa-check').addClass("fa-warning");  
            icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
        },
        highlight: function (element) {
            $(element)
            .closest('.form-group').removeClass("has-success").addClass('has-error');
        },
        unhighlight: function (element) {
        },
        success: function (label, element) {
            var icon = $(element).parent('.input-icon').children('i');
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            icon.removeClass("fa-warning").addClass("fa-check");
        },
        submitHandler: function(form) {
            dataString = $('#formReject').serialize();

            $.ajax({
                url: "<?php echo site_url('admin/shop/rejectdata'); ?>",
                type: "POST",
                data: dataString,
                dataType: 'JSON',
                success: function(data) {
                    if (data) {
                        setTimeout(function() {
                            swal({
                                title:"Sukses",
                                text: "Email Konfirmasi Penolakan Berhasil Terkirim",
                                timer: 2000,
                                showConfirmButton: false,
                                type: "success"
                            })
                        });
                        reload_table();
                        $('#formModalEdit').modal('hide');
                    } else {
                        setTimeout(function() {
                            swal({
                                title:"Error",
                                text: "Email Konfirmasi Penolakan Gagal Terkirim",
                                timer: 2000,
                                showConfirmButton: false,
                                type: "error"
                            })
                        });
                        $('#formModalEdit').modal('hide');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Update Data');
                    $('#formModalEdit').modal('hide');
                }
            });
        }
    });
});
</script>

<div class="modal" id="formModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="" method="post" id="formReject" class="form-horizontal">
            <div class="modal-header">                      
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-times-circle"></i> Tolak Registrasi Toko</h4>
                <input type="hidden" name="id" id="id">
            </div>
            <div class="modal-body">
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label">Nama Toko</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Input Nama Toko" name="shopname" id="shopname" readonly>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label">Domain Toko</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Input Domain Toko" name="shopdomain" id="shopdomain" readonly>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label">Join</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="create" id="create" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Alasan Penolakan</label>
                    <div class="col-md-9">
                        <div class="input-icon right"><i class="fa"></i>
                            <textarea class="form-control" rows="10" name="desc" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-envelope"></i> Kirim Konfirmasi</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
            </form>
        </div>        
    </div>    
</div>
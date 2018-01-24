<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>

<script>
    function hapusData(subcategory_id) {
        var id = subcategory_id;
        swal({
            title: 'Anda Yakin ?',
            text: 'Data ini akan di Hapus !',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Tidak',
            closeOnConfirm: true
        }, function(isConfirm) {
            if (!isConfirm) return;
            $.ajax({
                url : "<?php echo site_url('admin/subcategory/deletedata')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    swal({
                        title:"Sukses",
                        text: "Hapus Data Sukses",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Hapus Data');
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
                        <select class="form-control select2me" name="lstCategoryFilter" id="lstCategoryFilter">
                            <option value="">SEMUA</option>
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
        <h3 class="page-title">Sub Kategori</h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Umum</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Sub Kategori</a>
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
                            <i class="fa fa-list"></i> Daftar Sub Kategori
                        </div>
                    </div>
                    <div class="portlet-body">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#formModalAdd">
                            <i class="fa fa-plus-circle"></i> Tambah
                        </button>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#filterData">
                            <i class="fa fa-search"></i> Filter Data
                        </button>
                        <br><br>
                        <table class="table table-striped table-hover" id="tableData">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="5%">No</th>
                                    <th width="30%">Kategori</th>
                                    <th>Nama Sub Kategori</th>
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
            "url": "<?php echo site_url('admin/subcategory/data_list')?>",
            "type": "POST",
            "data": function(data) {
                data.lstCategoryFilter  = $('#lstCategoryFilter').val();
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
        $('#filterData').modal('hide');
    });

    $('#btn-reset').click(function() {
        $('#form-filter')[0].reset();
        reload_table();
        $('#filterData').modal('hide');
    });
});
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript">
// Reset Form Input
function resetformInput() {
    $("#lstCategory").val('');
    $("#name").val('');
    $("#foto").val('');
    
    var MValid = $("#formInput");
    MValid.validate().resetForm();
    MValid.find(".has-success, .has-waring, .fa-warning, .fa-check").removeClass("has-success has-warning fa-warning fa-check");
    MValid.find("i.fa[data-original-title]").removeAttr('data-original-title');
}

// Reset Form Edit
function resetformEdit() {
    var MValid = $("#formEdit");
    MValid.validate().resetForm();
    MValid.find(".has-success, .has-waring, .fa-warning, .fa-check").removeClass("has-success has-warning fa-warning fa-check");
    MValid.find("i.fa[data-original-title]").removeAttr('data-original-title');
}

function reload_table() {
    table.ajax.reload(null,false);
}

$(document).ready(function() {
    var form        = $('#formInput');
    var error       = $('.alert-danger', form);
    var success     = $('.alert-success', form);
    
    $("#formInput").validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: { 
            lstCategory: { required: true },
            name: { required: true }
        },
        messages: { 
            lstCategory: {
                required :'Kategori harus diisi'
            },
            name: {
                required :'Nama Sub Kategori harus diisi'
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
            dataString = $("#formInput").serialize();
            $.ajax({
                url: '<?=site_url('admin/subcategory/savedata');?>',
                type: "POST",
                data: dataString,
                success: function(data) {
                    setTimeout(function() {
                        swal({
                            title:"Sukses",
                            text: "Simpan Data Sukses",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "success"
                        })
                        $('#formModalAdd').modal('hide');
                        resetformInput();
                        reload_table();
                    });
                },
                error: function() {
                    setTimeout(function() {
                        swal({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        })
                    });
                    $('#formModalAdd').modal('hide');
                    resetformInput();
                }
            });
        }
    });
});

function edit_data(id) {
    $('#formEdit')[0].reset();
    $.ajax({
        url : "<?=site_url('admin/subcategory/get_data/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#id').val(data.subcategory_id);
            $('#lstCategoryEdit').val(data.category_id);
            $('#sub_name').val(data.subcategory_name);
            // $('#subcategory_image').val(data.subcategory_image);
            
            // $path = '<?php echo base_url(); ?>img/';
            // if (data.subcategory_image != null) {
            //     $('#previewFoto').attr('src', $path+'subcategory_folder/'+data.subcategory_image);
            // } else {
            //     $('#previewFoto').attr('src', $path+'no-image.png');
            // }

            $('#formModalEdit').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

$(document).ready(function() {
    var form        = $('#formEdit');
    var error       = $('.alert-danger', form);
    var success     = $('.alert-success', form);
    
    $("#formEdit").validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: {
            lstCategory: { required: true },
            name: { required: true }
        },
        messages: { 
            lstCategory: {
                required :'Kategori harus diisi'
            },
            name: {
                required :'Nama Sub Kategori harus diisi'
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
            dataString = $("#formEdit").serialize();
            $.ajax({
                url: '<?=site_url('admin/subcategory/updatedata');?>',
                type: "POST",
                data: dataString,
                success: function(data) {
                    setTimeout(function() {
                        swal({
                            title:"Sukses",
                            text: "Update Data Sukses",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "success"
                        })
                        $('#formModalEdit').modal('hide');
                        resetformEdit();
                        reload_table();
                    });
                },
                error: function() {
                    setTimeout(function() {
                        swal({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        })
                    });
                    $('#formModalEdit').modal('hide');
                    resetformEdit();
                }
            });
        }
    });
});
</script>

<div class="modal" id="formModalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="" method="post" id="formInput" class="form-horizontal">
            <div class="modal-header">                      
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Form Tambah Sub Kategori</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Kategori</label>
                    <div class="col-md-9">
                        <div class="input-icon right"><i class="fa"></i>
                            <select class="form-control" name="lstCategory" id="lstCategory" required>
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
                <div class="form-group">                    
                    <label class="col-md-3 control-label">Nama Sub Kategori</label>
                    <div class="col-md-9">
                        <div class="input-icon right"><i class="fa"></i>
                            <input type="text" class="form-control" placeholder="Input Nama Sub Kategori" name="name" id="name" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
            </form>
        </div>        
    </div>    
</div>

<div class="modal" id="formModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="" method="post" id="formEdit" class="form-horizontal">
            <div class="modal-header">                      
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Form Edit Sub Kategori</h4>
                <input type="hidden" name="id" id="id">
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Kategori</label>
                    <div class="col-md-9">
                        <div class="input-icon right"><i class="fa"></i>
                            <select class="form-control" name="lstCategory" id="lstCategoryEdit" required>
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
                <div class="form-group">                    
                    <label class="col-md-3 control-label">Nama Sub Kategori</label>
                    <div class="col-md-9">
                        <div class="input-icon right"><i class="fa"></i>
                            <input type="text" class="form-control" placeholder="Input Nama Sub Kategori" name="name" id="sub_name" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Update</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
            </form>
        </div>        
    </div>    
</div>
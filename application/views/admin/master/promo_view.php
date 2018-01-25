<link href="<?=base_url();?>backend/js/sweetalert2.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url();?>backend/js/sweetalert2.min.js"></script>
<link href="<?=base_url();?>backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>

<script>
    function hapusData(promo_id) {
        var id = promo_id;
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
                url : "<?=site_url('admin/promo/deletedata')?>/"+id,
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

<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title">Promo</h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?=site_url('admin/home');?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Content</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Promo</a>
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
                <div class="portlet box grey-steel">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Daftar Promo
                        </div>
                    </div>
                    <div class="portlet-body">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#formModalAdd">
                            <i class="fa fa-plus-circle"></i> Tambah
                        </button>
                        <br><br>
                        <table class="table table-striped table-hover" id="tableData">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="5%">No</th>
                                    <th width="10%">Tgl. Post</th>
                                    <th>Nama Promo</th>
                                    <th width="30%">Gambar</th>
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

<script type="text/javascript" src="<?=base_url();?>backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?=base_url();?>backend/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>backend/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<script type="text/javascript">
var table;
$(document).ready(function() {
    table = $('#tableData').DataTable({
        "pageLength" : 10,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [2, 'desc'],
        "ajax": {
            "url": "<?=site_url('admin/promo/data_list');?>",
            "type": "POST"
        },
        "columnDefs": [
        {
            "targets": [ 0, 1, 4],
            "orderable": false,
        },
        ],
    });
});
</script>

<script type="text/javascript" src="<?=base_url();?>backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript">
// Reset Form Input
function resetformInput() {
    $("#name").val('');
    $path = '<?=base_url();?>img/';
    $('.fileinput').attr('src', $path+'no-image.png');

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
            name: { required: true },
            foto: { required: true }
        },
        messages: {
            name: {
                required :'Nama Promo harus diisi'
            },
            foto: {
                required :'Gambar Promo harus dipilih'
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
            var formData = new FormData($('#formInput')[0]);
            $.ajax({
                url: '<?=site_url('admin/promo/savedata');?>',
                type: "POST",
                dataType: 'json',
                data: formData,
                async: true,
                success: function(data) {
                    if (data.status === 'success') {
                        swal({
                            title:"Sukses",
                            text: "Upload Gambar Sukses",
                            showConfirmButton: false,
                            type: "success",
                            timer: 2000
                        });
                    } else {
                        swal({
                            title:"Gagal",
                            text: "Gagal ! Type File harus (JPG/PNG/JPEG)",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                    }
                    $('#formModalAdd').modal('hide');
                    reload_table();
                    resetformInput();
                },
                error: function (response) {
                    swal({
                        title:"Error",
                        text: "Upload Gambar Gagal",
                        showConfirmButton: false,
                        type: "error",
                        timer: 2000
                    });
                    $('#formModalAdd').modal('hide');
                    reload_table();
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });
});

function edit_data(id) {
    $('#formEdit')[0].reset();

    $.ajax({
        url : "<?=site_url('admin/promo/get_data/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#id').val(data.promo_id);
            $('#promo_name').val(data.promo_name);
            $('#promo_image').val(data.promo_image);

            $path = '<?=base_url();?>img/';
            if (data.promo_image != null) {
                $('#previewFoto').attr('src', $path+'promo_folder/'+data.promo_image);
            } else {
                $('#previewFoto').attr('src', $path+'no-image.png');
            }

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
            name: { required: true }
        },
        messages: {
            name: {
                required :'Nama Promo harus diisi'
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
            var formData = new FormData($('#formEdit')[0]);
            $.ajax({
                url: '<?=site_url('admin/promo/updatedata');?>',
                type: "POST",
                dataType: 'json',
                data: formData,
                async: true,
                success: function(data) {
                    if (data.status === 'success') {
                        swal({
                            title:"Sukses",
                            text: "Update Upload Gambar Sukses",
                            showConfirmButton: false,
                            type: "success",
                            timer: 2000
                        });
                    } else {
                        swal({
                            title:"Gagal",
                            text: "Gagal ! Type File harus (JPG/PNG/JPEG)",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                    }
                    $('#formModalEdit').modal('hide');
                    reload_table();
                    resetformEdit();
                },
                error: function (response) {
                    swal({
                        title:"Error",
                        text: "Update Upload Gambar Gagal",
                        showConfirmButton: false,
                        type: "error",
                        timer: 2000
                    });
                    $('#formModalEdit').modal('hide');
                    reload_table();
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });
});
</script>

<div class="modal" id="formModalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="" method="post" id="formInput" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Form Tambah Gambar Promo</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Nama Promo</label>
                    <div class="col-md-9">
                        <div class="input-icon right"><i class="fa"></i>
                            <input type="text" class="form-control" placeholder="Input Nama Promo" name="name" id="name" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Upload Gambar</label>
                    <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?=base_url('img/no-image.png');?>" alt=""/>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 150px;"></div>
                            <div>
                                <span class="btn default btn-file">
                                <span class="fileinput-new">
                                Pilih Foto </span>
                                <span class="fileinput-exists">
                                Ubah </span>
                                <input type="file" name="foto" accept=".png,.jpg,.jpeg,.gif" required>
                                </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                Hapus </a>
                            </div>
                        </div>
                        <div class="clearfix margin-top-10">
                            <span class="label label-danger">
                            INFO !</span>
                            Resolution : 900 x 700 Pixel
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
            <form role="form" action="" method="post" id="formEdit" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Form Edit Gambar Promo</h4>
                <input type="hidden" name="id" id="id">
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Nama Promo</label>
                    <div class="col-md-9">
                        <div class="input-icon right"><i class="fa"></i>
                            <input type="text" class="form-control" placeholder="Input Nama Promo" name="name" id="promo_name" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Gambar</label>
                    <div class="col-md-9">
                        <img src="" style="width:60%;" id="previewFoto">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Upload Gambar</label>
                    <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?=base_url('img/no-image.png');?>" alt=""/>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 150px;"></div>
                            <div>
                                <span class="btn default btn-file">
                                <span class="fileinput-new">
                                Pilih Foto </span>
                                <span class="fileinput-exists">
                                Ubah </span>
                                <input type="file" name="foto" accept=".png,.jpg,.jpeg,.gif">
                                </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                Hapus </a>
                            </div>
                        </div>
                        <div class="clearfix margin-top-10">
                            <span class="label label-danger">
                            INFO !</span>
                            Resolution : 900 x 700 Pixel
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
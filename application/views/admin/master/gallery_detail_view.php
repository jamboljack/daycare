<link href="<?=base_url();?>backend/js/sweetalert2.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url();?>backend/js/sweetalert2.min.js"></script>
<link href="<?=base_url();?>backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>

<script>
    function hapusData(detail_id) {
        var id = detail_id;
        swal({
            title: 'Anda Yakin ?',
            text: 'Data ini akan di Hapus !',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Data',
            cancelButtonText: 'Tidak',
            closeOnConfirm: true
        }, function(isConfirm) {
            if (!isConfirm) return;
            $.ajax({
                url : "<?=site_url('admin/gallery/deletedatadetail')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    swal({
                        title:"Sukses",
                        text: "Hapus Data Berhasil",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Hapus data');
                }
            });
        });
    }
</script>

<script type="text/javascript">
$(function() {
    $(document).on("click",'.edit_button', function(e) {
        var id          = $(this).data('id');
        var nama        = $(this).data('nama');
        $(".id").val(id);
        $(".nama").val(nama);
    })
});
</script>

<div class="modal" id="editData" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="" method="post" id="formEdit" class="form-horizontal">
            <input type="hidden" class="form-control id" name="id">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Form Edit Agama</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Nama Agama</label>
                    <div class="col-md-9">
                        <div class="input-icon right"><i class="fa"></i>
                            <input type="text" class="form-control nama" placeholder="Input Nama Agama" name="nama" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Update</button>
                <button type="button" class="btn yellow" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title">Master Umum</h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?=site_url('admin/home');?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?=site_url('admin/master');?>">Master Umum</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Agama</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt">
                    <i class="icon-calendar">&nbsp; </i><span class="uppercase visible-lg-inline-block"><?=tgl_indo(date('Y-m-d'));?></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-search"></i> Daftar Master Umum
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label">Pilih Menu Master</label>
                                    <select class="form-control" name="lstMenu" onchange="la(this.value)">
                                        <option value="">- Pilih Menu -</option>
                                        <?php
$listMaster = $this->gallery_m->select_menu()->result();
foreach ($listMaster as $m) {
    ?>
                                        <option value="<?=site_url('admin/' . $m->menu_master_url);?>" <?php if ($this->uri->segment(2) == $m->menu_master_url) {echo 'selected';}?>><?=$m->menu_master_nama;?></option>
                                            <?php }?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-plus-circle"></i> Tambah Data
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" method="post" id="formInput" action="">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label">Nama Agama</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" placeholder="Input Nama Agama" name="nama" id="nama" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Daftar Agama
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-bordered table-hover" id="tableData">
                            <thead>
                                <tr>
                                    <th width="15%"></th>
                                    <th width="5%">No</th>
                                    <th>Keterangan</th>
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
        "order": [],
        "ajax": {
            "url": "<?=site_url('admin/gallery/data_list')?>",
            "type": "POST"
        },
        "columnDefs": [
        {
            "targets": [ 0, 1 ],
            "orderable": false,
        },
        ],
    });
});
</script>

<script type="text/javascript" src="<?=base_url();?>backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript">
function la(src) {
    window.location = src;
}

function reload_table() {
    table.ajax.reload(null,false); //reload datatable ajax
}

// Reset Form Input
function resetformInput() {
    $("#nama").val('');

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
            nama: {
                required: true,
                remote: {
                    url: "<?=site_url('admin/gallery/register_ket_exists');?>",
                    type: "post",
                    data: {
                        nama: function() {
                            return $("#nama").val();
                        }
                    }
                }
            }
        },
        messages: {
            nama: {
                required :'Agama harus di isi', remote:'Agama sudah Ada'
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit
            success.hide();
            error.show();
            Metronic.scrollTo(error, -200);
        },

        errorPlacement: function (error, element) { // render error placement for each input type
            var icon = $(element).parent('.input-icon').children('i');
            icon.removeClass('fa-check').addClass("fa-warning");
            icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
            .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
        },

        success: function (label, element) {
            var icon = $(element).parent('.input-icon').children('i');
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
            icon.removeClass("fa-warning").addClass("fa-check");
        },

        submitHandler: function(form) {
            dataString = $("#formInput").serialize(); // Ambil Value dari Form
            $.ajax({
                url: "<?=site_url('admin/gallery/savedata');?>",
                type: "POST",
                data: dataString,
                success: function(data) {
                    swal({
                        title:"Sukses",
                        text: "Simpan Data Berhasil",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    reload_table();
                    resetformInput();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Simpan Data');
                    reload_table();
                    resetformInput();
                }
            });
        }
    });
});

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
            nama: {
                required: true
            }
        },
        messages: {
            nama: {
                required :'Agama harus di isi'
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit
            success.hide();
            error.show();
            Metronic.scrollTo(error, -200);
        },

        errorPlacement: function (error, element) { // render error placement for each input type
            var icon = $(element).parent('.input-icon').children('i');
            icon.removeClass('fa-check').addClass("fa-warning");
            icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
            .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
        },

        success: function (label, element) {
            var icon = $(element).parent('.input-icon').children('i');
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
            icon.removeClass("fa-warning").addClass("fa-check");
        },

        submitHandler: function(form) {
            dataString = $("#formEdit").serialize(); // Ambil Value dari Form
            $.ajax({
                url: "<?=site_url('admin/gallery/updatedata');?>",
                type: "POST",
                data: dataString,
                success: function(data) {
                    swal({
                        title:"Sukses",
                        text: "Update Data Berhasil",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    $('#editData').modal('hide');
                    reload_table();
                    resetformEdit();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Update data');
                    reload_table();
                    resetformEdit();
                }
            });
        }
    });
});
</script>
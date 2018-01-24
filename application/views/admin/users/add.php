<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Users
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>                
                <li>
                    <a href="<?php echo site_url('admin/users'); ?>">Users</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Tambah User</a>
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
                            <i class="fa fa-plus-circle"></i> Form Tambah User
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form id="formInput" method="post" action="" class="form-horizontal form">

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" name="username" id="username" placeholder="Input Username" autocomplete="off" autofocus />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="password" class="form-control" name="password" placeholder="Input Password" autocomplete="off"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Lengkap</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Input Nama Lengkap" autocomplete="off" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tgl. Lahir</label>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" name="lstDate">
                                                            <?php for($i=1; $i<=31; $i++) { ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="form-control" name="lstMonth">
                                                            <option value="1">Januari</option>
                                                            <option value="2">Februari</option>
                                                            <option value="3">Maret</option>
                                                            <option value="4">April</option>
                                                            <option value="5">Mei</option>
                                                            <option value="6">Juni</option>
                                                            <option value="7">Juli</option>
                                                            <option value="8">Agustus</option>
                                                            <option value="9">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="form-control" name="lstYear">
                                                            <?php for($i=date('Y'); $i >= 1900; $i-=1) { ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin</label>
                                            <div class="col-md-5">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" name="lstGender">
                                                        <option value="">- Pilih -</option>
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Handphone</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" name="mobile" maxlength="12" placeholder="Input Handphone" autocomplete="off"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" name="email" id="email" placeholder="Input Email" autocomplete="off"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Level</label>
                                            <div class="col-md-5">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" name="lstLevel">
                                                        <option value="">- Pilih -</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Operator">Operator</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions" align="center">
                                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
                                <a href="<?php echo site_url('admin/users'); ?>" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>            
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^\w+$/i.test(value);
}, "Hany Huruf, Angka dan Garis Bawah");

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
            username: {
                required: true, minlength: 5, alphanumeric: true,
                remote: {
                    url: "<?php echo site_url('admin/users/register_user_exists'); ?>",
                    type: "post",
                    data: {
                        username: function() { 
                            return $("#username").val(); 
                        }
                    }
                }
            },
            password: {
                required: true, minlength: 5
            },
            name: {
                required: true, minlength: 5
            },
            lstGender: {
                required: true
            },
            mobile: {
                required: true, minlength: 11, number: true
            },
            email: {
                required: true, minlength: 15, email: true,
                remote: {
                    url: "<?php echo site_url('admin/users/register_email_exists'); ?>",
                    type: "post",
                    data: {
                        email: function() { 
                            return $("#email").val(); 
                        }
                    }
                }
            },
            lstLevel: {
                required: true
            }
        },
        messages: { 
            username: {
                required:'Username harus diisi', minlength:'Minimal 5 Karakter',
                remote: 'Username sudah ada, mohon ganti'
            },
            password: {
                required:'Password harus diisi', minlength:'Minimal 5 Karakter'
            },
            name: {
                required:'Nama Lengkap harus diisi', minlength:'Minimal 5 Karakter'
            },
            lstGender: {
                required:'Jenis Kelamin harus dipilih'
            },
            mobile: {
                required:'Handphone harus diisi', minlength:'Minimal 11 Digit', number:'Hanya Angka'
            },
            email: {
                required:'Email harus diisi', minlength:'Minimal 15 Karakter', email:'Email tidak Valid',
                remote: 'Email sudah ada, mohon ganti'
            },
            lstLevel: {
                required:'Level harus dipilih'
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
            dataString = $('#formInput').serialize();
            $.ajax({
                url: "<?php echo site_url('admin/users/savedata'); ?>",
                type: "POST",
                data: dataString,
                dataType: 'JSON',
                success: function(data) {
                    swal({
                        title:"Sukses",
                        text: "Simpan Data Sukses",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    }, function() {
                        window.location="<?php echo site_url('admin/users'); ?>";
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Simpan Data');
                }
            });
        }
    });
});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">Kontak</h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Kontak</a>
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
                            <i class="fa fa-edit"></i> Detail Kontak
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <form role="form" method="post" id="formInput" action="" class="form-horizontal">
                            <div class="form-body">
                                <h3 class="form-section">Detail Info</h3>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Aplikasi</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" name="application" value="<?php echo $detail->contact_application; ?>" autocomplete="off" autofocus />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Perusahaan</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" name="name" value="<?php echo $detail->contact_name; ?>" autocomplete="off" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Alamat</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" name="address" value="<?php echo $detail->contact_address; ?>" autocomplete="off" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">No. Telepon</label>
                                    <div class="col-md-5">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $detail->contact_phone; ?>" autocomplete="off" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">No. Fax</label>
                                    <div class="col-md-5">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" name="fax" value="<?php echo $detail->contact_fax; ?>" autocomplete="off" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Email</label>
                                    <div class="col-md-5">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" name="email" value="<?php echo $detail->contact_email; ?>" autocomplete="off" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Website</label>
                                    <div class="col-md-5">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" name="web" value="<?php echo $detail->contact_web; ?>" autocomplete="off" />
                                        </div>
                                    </div>
                                </div>

                                <h3 class="form-section">Bank Info</h3>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Bank</label>
                                    <div class="col-md-5">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" name="bank" value="<?php echo $detail->contact_bank; ?>" autocomplete="off" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">No. Rekening</label>
                                    <div class="col-md-5">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" name="norek" value="<?php echo $detail->contact_norek; ?>" autocomplete="off" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Atas Nama</label>
                                    <div class="col-md-5">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" name="atasnama" value="<?php echo $detail->contact_account; ?>" autocomplete="off" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript">
// Reset Form
function resetformInput() {
    var MValid = $("#formInput");
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
            application: { required: true },
            name: { required: true },
            address: { required: true },
            phone: { required: true },
            fax: { required: true },
            email: { required: true, email: true },
            web: { required: true, url: true },
            bank: { required: true },
            norek: { required: true },
            atasnama: { required: true }
        },
        messages: {
            application: { required:'Nama Aplikasi harus diisi' },
            name: { required:'Nama Perusahaan harus diisi' },
            address: { required:'Alamat harus diisi' },
            phone: { required:'No. Telepon harus diisi' },
            fax: { required:'No. Fax harus diisi' },
            email: { required:'Email harus diisi', email:'Email tidak Valid' },
            web: { required:'Website harus diisi', url:'Website tidak Valid (Ex. http://www.domain.com)' },
            bank: { required:'Nama Bank harus diisi' },
            norek: { required:'No. Rekening harus diisi' },
            atasnama: { required:'Atas Nama harus diisi' }
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
                url: "<?php echo site_url('admin/contact/updatedata'); ?>",
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
                        resetformInput();
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
                    resetformInput();
                }
            });
        }
    });
});
</script>
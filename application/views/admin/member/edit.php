<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Member
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>                
                <li>
                    <a href="<?php echo site_url('admin/member'); ?>">Member</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Detail Member</a>
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
                            <i class="fa fa-edit"></i> Form Detail Member
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form class="form-horizontal" method="post" id="formInput" name="formInput" role="form">
                        <input type="hidden" name="id" value="<?php echo $detail->user_username; ?>">

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="username" value="<?php echo $detail->user_username; ?>" autocomplete="off" readonly  />
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Nama Lengkap</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" value="<?php echo $detail->user_name; ?>" autocomplete="off" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Tgl. Lahir</label>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" name="lstDate" disabled>
                                                            <?php 
                                                            for($i=1; $i<=31; $i++) { 
                                                                if ($i == $detail->user_date) {
                                                            ?>
                                                            <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                                                            <?php } else { ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php } 
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="form-control" name="lstMonth" disabled>
                                                            <option value="1" <?php if ($detail->user_month == '1') { echo "selected"; } ?>>Januari</option>
                                                            <option value="2" <?php if ($detail->user_month == '2') { echo "selected"; } ?>>Februari</option>
                                                            <option value="3" <?php if ($detail->user_month == '3') { echo "selected"; } ?>>Maret</option>
                                                            <option value="4" <?php if ($detail->user_month == '4') { echo "selected"; } ?>>April</option>
                                                            <option value="5" <?php if ($detail->user_month == '5') { echo "selected"; } ?>>Mei</option>
                                                            <option value="6" <?php if ($detail->user_month == '6') { echo "selected"; } ?>>Juni</option>
                                                            <option value="7" <?php if ($detail->user_month == '7') { echo "selected"; } ?>>Juli</option>
                                                            <option value="8" <?php if ($detail->user_month == '8') { echo "selected"; } ?>>Agustus</option>
                                                            <option value="9" <?php if ($detail->user_month == '9') { echo "selected"; } ?>>September</option>
                                                            <option value="10" <?php if ($detail->user_month == '10') { echo "selected"; } ?>>Oktober</option>
                                                            <option value="11" <?php if ($detail->user_month == '11') { echo "selected"; } ?>>November</option>
                                                            <option value="12" <?php if ($detail->user_month == '12') { echo "selected"; } ?>>Desember</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="form-control" name="lstYear" disabled>
                                                            <?php 
                                                            for($i=date('Y'); $i >= 1900; $i-=1) { 
                                                                if ($i == $detail->user_year) {
                                                            ?>
                                                            <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                                                            <?php } else { ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php } 
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Jenis Kelamin</label>
                                            <div class="col-md-5">
                                                <select class="form-control" name="lstGender" disabled>
                                                    <option value="">- Choose -</option>
                                                    <option value="L" <?php if ($detail->user_gender == 'L') { echo "selected"; } ?>>Laki-Laki</option>
                                                    <option value="P" <?php if ($detail->user_gender == 'P') { echo "selected"; } ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Handphone</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="mobile" value="<?php echo $detail->user_mobile; ?>" maxlength="12" autocomplete="off" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="email" value="<?php echo $detail->user_email; ?>" autocomplete="off" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status</label>
                                            <div class="col-md-5">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" name="lstStatus">
                                                        <option value="">- Pilih -</option>
                                                        <option value="Active" <?php if ($detail->user_status == 'Active') { echo "selected"; } ?>>Active</option>
                                                        <option value="Non Active" <?php if ($detail->user_status == 'Non Active') { echo "selected"; } ?>>Non Active</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Banned</label>
                                            <div class="col-md-5">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" name="lstBanned">
                                                        <option value="">- Pilih -</option>
                                                        <option value="Yes" <?php if ($detail->user_banned == 'Yes') { echo "selected"; } ?>>Yes</option>
                                                        <option value="No" <?php if ($detail->user_banned == 'No') { echo "selected"; } ?>>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions" align="center">
                                <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Update</button>
                                <a href="<?php echo site_url('admin/member'); ?>" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
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
            lstStatus: {
                required: true
            },
            lstBanned: {
                required: true
            }
        },
        messages: {
            lstStatus: {
                required:'Status harus dipilih'
            },
            lstBanned: {
                required:'Banned harus dipilih'
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
                url: "<?php echo site_url('admin/member/updatedata/'.$this->uri->segment(4)); ?>",
                type: "POST",
                data: dataString,
                dataType: 'JSON',
                success: function(data) {
                    swal({
                        title:"Sukses",
                        text: "Update Data Sukses",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    }, function() {
                        window.location="<?php echo site_url('admin/member'); ?>";
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Update Data');
                }
            });
        }
    });
});
</script>
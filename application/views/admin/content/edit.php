<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Content
        </h3>
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
                    <a href="<?php echo site_url('admin/content'); ?>">Content</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Edit Content</a>
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
                            <i class="fa fa-edit"></i> Form Edit Content
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal" method="post" id="formInput" name="formInput">
                        <input type="hidden" name="id" value="<?=$detail->content_id;?>">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Content</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" name="name" placeholder="Input Nama Content" value="<?=$detail->content_name;?>" autocomplete="off" required autofocus />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Deskripsi</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <textarea class="wysihtml5 form-control" rows="10" name="desc" required><?=$detail->content_desc;?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Level</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <select class="form-control" name="lstLevel" id="lstLevel" required>
                                                <option value="">SEMUA</option>
                                                <option value="I" <?php if ($detail->content_level=='I') { echo 'selected'; } ?>>INFO</option>
                                                <option value="L" <?php if ($detail->content_level=='L') { echo 'selected'; } ?>>LAYANAN PELANGGAN</option>
                                                <option value="C" <?php if ($detail->content_level=='C') { echo 'selected'; } ?>>CUSTOMER CARE</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Update</button>
                                        <a href="<?php echo site_url('admin/content'); ?>" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>            
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>backend/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script>
  $('.wysihtml5').wysihtml5();
</script>
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
            name: { required: true },
            desc: { required: true },
            lstLevel: { required: true }
        },
        messages: {
            name: {
                required :'Nama Content harus diisi'
            },
            desc: {
                required :'Deskripsi harus diisi'
            },
            lstLevel: {
                required :'Level harus dipilih'
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
                url: "<?php echo site_url('admin/content/updatedata'); ?>",
                type: "POST",
                data: dataString,
                success: function(data) {
                    swal({
                        title:"Sukses",
                        text: "Update Data Sukses",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    }, function() {
                        window.location="<?php echo site_url('admin/content'); ?>";
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
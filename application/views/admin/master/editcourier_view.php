<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Jasa Kurir
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Setting</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?=site_url('admin/courier');?>">Jasa Kurir</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Edit Jasa Kurir</a>
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
                            <i class="fa fa-edit"></i> Edit Data Kurir
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal" method="post" id="formEdit" name="formEdit">
                        <input type="hidden" name="id" value="<?=$detail->courier_id;?>">

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Kurir</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right"><i class="fa"></i>
                                            <input type="text" class="form-control" placeholder="Input Nama Jasa Kurir" name="name" value="<?=$detail->courier_name;?>" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Deskripsi</label>
                                    <div class="col-md-9">
                                        <textarea class="wysihtml5 form-control" rows="10" name="desc"><?=$detail->courier_desc;?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">                    
                                    <label class="col-md-3 control-label">URL</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right"><i class="fa"></i>
                                            <input type="text" class="form-control" placeholder="Input URL" name="url" value="<?=$detail->courier_url;?>" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Update</button>
                                        <a href="<?php echo site_url('admin/courier'); ?>" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
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
    var form        = $('#formEdit');
    var error       = $('.alert-danger', form);
    var success     = $('.alert-success', form);
    
    $("#formEdit").validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: { 
            name: { required: true },
            lstAPI: { required: true },
            url: { required: true }
        },
        messages: { 
            name: {
                required :'Nama Jasa Kurir harus diisi'
            },
            lstAPI: {
                required :'API harus dipilih'
            },
            url: {
                required :'URL harus diisi'
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
            dataString = $('#formEdit').serialize();
            $.ajax({
                url: "<?php echo site_url('admin/courier/updatedata'); ?>",
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
                        window.location="<?=site_url('admin/courier');?>";
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
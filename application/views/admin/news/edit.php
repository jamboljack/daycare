<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Berita & Kegiatan
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>                
                <li>
                    <a href="#">Konten</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/news'); ?>">Berita & Kegiatan</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Edit Berita & Kegiatan</a>
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
                            <i class="fa fa-edit"></i> Form Edit Berita & Kegiatan
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal" method="post" id="formInput" name="formInput" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$detail->news_id;?>">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Content</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" name="name" placeholder="Input Nama Content" value="<?=$detail->news_title;?>" autocomplete="off" required autofocus />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kategori</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right"><i class="fa"></i>
                                            <select class="form-control" name="lstCategory" required>
                                                <option value="">- Pilih Kategori -</option>
                                                <?php
                                                foreach($listCategory as $r) {
                                                    if ($detail->category_id == $r->category_id) {
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                ?>
                                                <option value="<?=$r->category_id;?>" <?=$selected;?>><?=$r->category_name;?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Deskripsi</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <textarea class="wysihtml5 form-control" rows="10" name="desc" required><?=$detail->news_desc;?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Gambar</label>
                                    <div class="col-md-9">
                                        <?php
                                        if (empty($detail->news_image)) {
                                        ?>
                                        <img src="<?php echo base_url('img/no-image.png'); ?>" alt=""/>
                                        <?php } else { ?>
                                        <img src="<?php echo base_url('img/news_folder/'.$detail->news_image); ?>" width="50%"/>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ubah Gambar</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="<?php echo base_url('img/no-image.png'); ?>" alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 200px;"></div>
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
                                            <span class="label label-danger">INFO !</span>Resolution : 800 x 500 Pixel
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Update</button>
                                        <a href="<?php echo site_url('admin/news'); ?>" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
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
<script type="text/javascript" src="<?php echo base_url(); ?>backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
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
            lstCategory: { required: true },
            desc: { required: true }
        },
        messages: {
            name: {
                required :'Nama Judul harus diisi'
            },
            lstCategory: {
                required :'Kategori harus dipilih'
            },
            desc: {
                required :'Deskripsi harus diisi'
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
                url: '<?php echo site_url('admin/news/updatedata'); ?>',
                type: "POST",
                dataType: 'json',
                data: formData,
                async: true,
                success: function(data) {
                    if (data.status === 'success') {
                        swal({
                            title:"Sukses",
                            text: "Update Data Sukses",
                            showConfirmButton: false,
                            type: "success",
                            timer: 2000
                        }, function() {
                            window.location="<?=site_url('admin/news');?>";
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
                }, 
                error: function (response) {
                    swal({
                        title:"Error",
                        text: "Simpan Data Gagal",
                        showConfirmButton: false,
                        type: "error",
                        timer: 2000
                    });
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });
});
</script>
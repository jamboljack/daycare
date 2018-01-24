<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>

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
                    <a href="<?php echo site_url('admin/shop'); ?>">Toko</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Detail Toko</a>
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
                            <i class="fa fa-edit"></i> Form Detail Toko
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form class="form-horizontal" method="post" id="formInput" name="formInput" role="form">
                        <input type="hidden" name="id" value="<?php echo $detail->shop_id; ?>">

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Nama Toko</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="shopname" value="<?php echo $detail->shop_name; ?>" autocomplete="off" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Domain Toko</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="domainname" value="www.pasarku.com/<?php echo $detail->shop_domain; ?>" autocomplete="off" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kategori</label>
                                            <div class="col-md-9">
                                                <select class="form-control select2me" name="lstCategory" required>
                                                    <?php
                                                    foreach($listCategory as $r) {
                                                        if ($r->category_id == $detail->category_id) { 
                                                    ?>
                                                    <option value="<?=$r->category_id;?>" selected><?=$r->category_name;?></option>
                                                    <?php } else { ?>
                                                    <option value="<?=$r->category_id;?>"><?=$r->category_name;?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Kecamatan</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="lstKecamatan" disabled>
                                                    <option value="">- Pilih Kecamatan -</option>
                                                    <?php
                                                    foreach($listKecamatan as $r) {
                                                        if ($r->subdistrict_id == $detail->subdistrict_id) { 
                                                    ?>
                                                    <option value="<?php echo $r->subdistrict_id; ?>" selected><?php echo $r->subdistrict_name; ?></option>
                                                    <?php } else { ?>
                                                    <option value="<?php echo $r->subdistrict_id; ?>"><?php echo $r->subdistrict_name; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Alamat</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="alamat" value="<?php echo $detail->shop_address; ?>" autocomplete="off" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Logo</label>
                                            <div class="col-md-9">
                                                <?php if (!empty($detail->shop_image)) { ?>
                                                <img src="<?php echo base_url('img/shop_folder/'.$detail->shop_image); ?>" style="width:20%;">
                                                <?php } else { ?>
                                                <img src="<?php echo base_url('img/no-image.png'); ?>">
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Pemilik</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="owner" value="<?php echo $detail->user_name; ?>" autocomplete="off" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">No. Telepon</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="owner" value="<?php echo $detail->shop_phone; ?>" autocomplete="off" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Join</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="create" value="<?php echo $detail->shop_created; ?>" autocomplete="off" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status</label>
                                            <div class="col-md-5">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" name="lstStatus">
                                                        <option value="">- Pilih -</option>
                                                        <option value="Active" <?php if ($detail->shop_status == 'Active') { echo "selected"; } ?>>Active</option>
                                                        <option value="Non Active" <?php if ($detail->shop_status == 'Non Active') { echo "selected"; } ?>>Non Active</option>
                                                        <option value="Reject" <?php if ($detail->shop_status == 'Reject') { echo "selected"; } ?>>Reject</option>
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
                                                        <option value="Yes" <?php if ($detail->shop_banned == 'Yes') { echo "selected"; } ?>>Yes</option>
                                                        <option value="No" <?php if ($detail->shop_banned == 'No') { echo "selected"; } ?>>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Deskripsi</label>
                                            <div class="col-md-10">
                                                <textarea class="wysihtml5 form-control" rows="10" name="desc" readonly><?php echo $detail->shop_desc; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($detail->shop_status == 'Reject') { ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Alasan Penolakan</label>
                                            <div class="col-md-10">
                                                <textarea class="wysihtml5 form-control" rows="10" name="desc" readonly><?php echo $detail->shop_reject; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="form-actions" align="center">
                                <?php if ($detail->shop_status == 'Active') { ?>
                                <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Update</button>
                                <?php } ?>
                                <a href="<?php echo site_url('admin/shop'); ?>" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
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
            lstType: {
                required: true
            },
            lstStatus: {
                required: true
            },
            lstBanned: {
                required: true
            }
        },
        messages: {
            lstType: {
                required:'Tipe harus dipilih'
            },
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
                url: "<?php echo site_url('admin/shop/updatedata/'.$this->uri->segment(4)); ?>",
                type: "POST",
                data: dataString,
                success: function(data) {
                    swal({
                        title:"Success",
                        text: "Update Data Success",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    }, function() {
                        window.location="<?php echo site_url('admin/shop'); ?>";
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
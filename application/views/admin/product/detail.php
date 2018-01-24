<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<script src="<?php echo base_url(); ?>backend/js/jquery.maskMoney.min.js"></script>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">Produk</h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>                
                <li>
                    <a href="<?php echo site_url('admin/product'); ?>">Daftar Produk</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Detail Produk</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li><?=word_limiter($detail->product_name,10);?></li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt">
                    <i class="icon-calendar">&nbsp; </i><span class="uppercase visible-lg-inline-block"><?php echo tgl_indo(date('Y-m-d')); ?></span>
                </div>
            </div>
        </div>            
                        
        <div class="row">
            <div class="col-md-12">

                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-edit"></i>Form Detail Produk
                        </div>
                        <div class="actions btn-set">
                            <a href="<?=site_url('admin/product');?>" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_umum" data-toggle="tab">Umum</a>
                                </li>
                                <li>
                                    <a href="#tab_images" data-toggle="tab">Thumbnail <span class="badge badge-success"><?=count($listThumb);?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_reviews" data-toggle="tab">
                                        Reviews <span class="badge badge-success"><?=count($listReview);?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_komentar" data-toggle="tab">Komentar </a>
                                </li>
                                <!-- <li>
                                    <a href="#tab_history" data-toggle="tab">Histori </a>
                                </li> -->
                            </ul>
                            <div class="tab-content no-space">
                                <div class="tab-pane active" id="tab_umum">
                                    <form role="form" method="post" id="formEdit" action="" class="form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?=$detail->product_id;?>">

                                    <div class="form-body">
                                        <h4>Informasi Produk</h4>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nama Produk</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="name" autocomplete="off" value="<?=$detail->product_name;?>" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Deskripsi</label>
                                            <div class="col-md-10">
                                                <textarea class="wysihtml5 form-control" rows="10" name="desc" disabled><?=$detail->product_desc;?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Kategori</label>
                                            <div class="col-md-10">
                                                <select class="form-control select2me" name="lstCategory" disabled>
                                                    <option value="">- Pilih Kategori -</option>
                                                    <?php
                                                    foreach($listCategory as $r) {
                                                        if ($detail->category_id == $r->category_id) { 
                                                    ?>
                                                    <option value="<?php echo $r->category_id; ?>" selected><?php echo $r->category_name; ?></option>
                                                    <?php } else { ?>
                                                    <option value="<?php echo $r->category_id; ?>"><?php echo $r->category_name; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Sub Kategori</label>
                                            <div class="col-md-10">
                                                <select class="form-control select2me" name="lstSubCategory" disabled>
                                                    <option value="">- Pilih Sub Kategori -</option>
                                                    <?php
                                                    foreach($listSub as $r) {
                                                        if ($detail->subcategory_id == $r->subcategory_id) { 
                                                    ?>
                                                    <option value="<?php echo $r->subcategory_id; ?>" selected><?php echo $r->subcategory_name; ?></option>
                                                    <?php } else { ?>
                                                    <option value="<?php echo $r->subcategory_id; ?>"><?php echo $r->subcategory_name; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <h4>Stok & Harga</h4>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Harga (Rp)</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="price" id="price" autocomplete="off" value="<?=number_format($detail->product_price,0,'',',');?>" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Disc (%)</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="disc" id="disc" autocomplete="off" value="<?=number_format($detail->product_disc,2,'.',',');?>" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Stok</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="stock" id="stock" value="<?=number_format($detail->product_qty,0,'',',');?>" autocomplete="off" disabled />
                                            </div>
                                        </div>
                                        <h4>Pengiriman</h4>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Berat (gr)</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" value="<?=number_format($detail->product_weight,0,'',',');?>" name="weight" id="weight" autocomplete="off" disabled />
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="control-label col-md-2">Ongkos Kirim<span class="disabled">*</span></label>
                                            <div class="col-md-10">
                                                <?php 
                                                // if (count($listKurir) == 0) {
                                                ?>
                                                <p><b>Mohon tanya Penjual untuk Ongkir</b><br>
                                                Tidak ada opsi pengiriman yang diaktifkan, Pembeli hanya akan membayar produk Anda.<br>
                                                Anda juga dapat <a href='<?=site_url('admin/courier');?>'>klik disini</a> untuk menambahkan jasa kirim pada produk Anda.
                                                </p>
                                                <?php 
                                                // } else {
                                                // $no=1; 
                                                // foreach($listKurir as $r) {
                                                //     $product_id     = $detail->product_id;
                                                //     $shop_courier_id= $r->shop_courier_id;
                                                //     $check          = $this->product_m->check_aktif($product_id, $shop_courier_id)->row();
                                                //     if (count($check) > 0) {
                                                //         echo '<input type="hidden" name="fee_id['.$no.']" value="'.$check->fee_id.'">';
                                                //         if ($check->fee_active == 1) {
                                                //             $checked = 'checked';
                                                //         } else {
                                                //             $checked = '';
                                                //         }
                                                //     } else {
                                                //         $checked = '';
                                                //     }
                                                ?>
                                                <input type="hidden" name="idshop[<?=$no;?>]" value="<?=$r->shop_courier_id;?>">
                                                <input type="checkbox" name="aktif[<?=$no;?>]" value="1" class="make-switch" data-size="small" <?=$checked;?>>&nbsp&nbsp<?=$r->courier_name;?>&nbsp&nbsp<label class="label label-danger">JASA KIRIM DUKUNGAN PASARKU</label><br><br>
                                                <?php 
                                                //     $no++; 
                                                // } 
                                                ?>
                                                <i class="fa fa-info-circle"></i> Pengaturan jasa kirim hanya akan diterapkan pada produk ini
                                                <?php // } ?>
                                            </div>
                                        </div> -->
                                        <h4>Lainnya</h4>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Kondisi</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="lstCondition" disabled>
                                                    <option value="">- Pilih Kondisi -</option>
                                                    <option value="baru" <?php if ($detail->product_condition=='baru') { echo "selected"; } ?>>Baru</option>
                                                    <option value="pernahdipakai" <?php if ($detail->product_condition=='pernahdipakai') { echo "selected"; } ?>>Pernah di Pakai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Status</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="lstStatus" disabled>
                                                    <option value="">- Pilih Status -</option>
                                                    <option value="published" <?php if ($detail->product_status=='published') { echo "selected"; } ?>>Published</option>
                                                    <option value="notpublished" <?php if ($detail->product_status=='notpublished') { echo "selected"; } ?>>Not Published</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Foto Utama</label>
                                            <div class="col-md-10">
                                                <?php if (!empty($detail->product_image)) { ?>
                                                <img src="<?php echo base_url('img/product_folder/'.$detail->product_image); ?>" style="width:20%;">
                                                <?php } else { ?>
                                                <img src="<?php echo base_url('img/no-image.png'); ?>">
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                                <div class="tab-pane" id="tab_images">
                                    <table class="table table-striped table-hover" id="tableData" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="15%">Action</th>
                                                <th>Thumbnail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                                        <div class="tab-pane" id="tab_reviews">
                                            <div class="table-container">
                                                <table class="table table-striped table-bordered table-hover" id="datatable_reviews">
                                                <thead>
                                                <tr role="row" class="heading">
                                                    <th width="5%">
                                                         Review&nbsp;#
                                                    </th>
                                                    <th width="10%">
                                                         Review&nbsp;Date
                                                    </th>
                                                    <th width="10%">
                                                         Customer
                                                    </th>
                                                    <th width="20%">
                                                         Review&nbsp;Content
                                                    </th>
                                                    <th width="10%">
                                                         Status
                                                    </th>
                                                    <th width="10%">
                                                         Actions
                                                    </th>
                                                </tr>
                                                <tr role="row" class="filter">
                                                    <td>
                                                        <input type="text" class="form-control form-filter input-sm" name="product_review_no">
                                                    </td>
                                                    <td>
                                                        <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                                            <input type="text" class="form-control form-filter input-sm" readonly name="product_review_date_from" placeholder="From">
                                                            <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                        </div>
                                                        <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                                            <input type="text" class="form-control form-filter input-sm" readonly name="product_review_date_to" placeholder="To">
                                                            <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-filter input-sm" name="product_review_customer">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-filter input-sm" name="product_review_content">
                                                    </td>
                                                    <td>
                                                        <select name="product_review_status" class="form-control form-filter input-sm">
                                                            <option value="">Select...</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="approved">Approved</option>
                                                            <option value="rejected">Rejected</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div class="margin-bottom-5">
                                                            <button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
                                                        </div>
                                                        <button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
                                                    </td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_komentar">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Meta Title:</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control maxlength-handler" name="product[meta_title]" maxlength="100" placeholder="">
                                                        <span class="help-block">
                                                        max 100 chars </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Meta Keywords:</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control maxlength-handler" rows="8" name="product[meta_keywords]" maxlength="1000"></textarea>
                                                        <span class="help-block">
                                                        max 1000 chars </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Meta Description:</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control maxlength-handler" rows="8" name="product[meta_description]" maxlength="255"></textarea>
                                                        <span class="help-block">
                                                        max 255 chars </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="tab-pane" id="tab_history">
                                            <div class="table-container">
                                                <table class="table table-striped table-bordered table-hover" id="datatable_history">
                                                <thead>
                                                <tr role="row" class="heading">
                                                    <th width="25%">
                                                         Datetime
                                                    </th>
                                                    <th width="55%">
                                                         Description
                                                    </th>
                                                    <th width="10%">
                                                         Notification
                                                    </th>
                                                    <th width="10%">
                                                         Actions
                                                    </th>
                                                </tr>
                                                <tr role="row" class="filter">
                                                    <td>
                                                        <div class="input-group date datetime-picker margin-bottom-5" data-date-format="dd/mm/yyyy hh:ii">
                                                            <input type="text" class="form-control form-filter input-sm" readonly name="product_history_date_from" placeholder="From">
                                                            <span class="input-group-btn">
                                                            <button class="btn btn-sm default date-set" type="button"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                        </div>
                                                        <div class="input-group date datetime-picker" data-date-format="dd/mm/yyyy hh:ii">
                                                            <input type="text" class="form-control form-filter input-sm" readonly name="product_history_date_to" placeholder="To">
                                                            <span class="input-group-btn">
                                                            <button class="btn btn-sm default date-set" type="button"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-filter input-sm" name="product_history_desc" placeholder="To"/>
                                                    </td>
                                                    <td>
                                                        <select name="product_history_notification" class="form-control form-filter input-sm">
                                                            <option value="">Select...</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="notified">Notified</option>
                                                            <option value="failed">Failed</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div class="margin-bottom-5">
                                                            <button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
                                                        </div>
                                                        <button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
                                                    </td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                </table>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
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

<script type="text/javascript" src="<?php echo base_url(); ?>backend/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript">
function reload_table() {
    table.ajax.reload();
}

var table;
$(document).ready(function() {
    table = $('#tableData').DataTable({ 
        "pageLength" : 10,
        "paging": false,
        "info": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [1, 'asc'],
        "ajax": {
            "url": "<?=site_url('admin/product/data_list_thumbnail/'.$this->uri->segment(4));?>",
            "type": "POST"
        },
        "columnDefs": [
        { 
            "targets": [ 0, 1],
            "orderable": false,
        },
        ],
    }); 
});
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#progress").hide();
    $('#price').maskMoney({thousands:',', precision:0});
    $('#disc').maskMoney({thousands:',', precision:2});
    $('#stock').maskMoney({thousands:',', precision:0});
    $('#weight').maskMoney({thousands:',', precision:0});

    var form        = $('#formEdit');
    var error       = $('.alert-danger', form);
    var success     = $('.alert-success', form);
    
    $("#formEdit").validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: {
            name: {
                disabled: true, minlength: 10
            },
            desc: {
                disabled: true
            },
            lstCategory: {
                disabled: true
            },
            lstSubCategory: {
                disabled: true
            },
            price: {
                disabled: true
            },
            qty: {
                disabled: true
            },
            lstCondition: {
                disabled: true
            },
            lstStatus: {
                disabled: true
            }
        },
        messages: {
            name: {
                disabled:'Nama Produk harus diisi', minlength:'Minimal 10 Karakter'
            },
            desc: {
                disabled:'Deskripsi harus diisi'
            },
            lstCategory: {
                disabled:'Kategori harus dipilih'
            },
            lstSubCategory: {
                disabled:'Sub Kategori harus dipilih'
            },
            price: {
                disabled:'Harga harus diisi'
            },
            stock: {
                disabled:'Stok harus diisi'
            },
            lstCondition: {
                disabled:'Kondisi harus dipilih'
            },
            lstStatus: {
                disabled:'Status harus dipilih'
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
            $("#progress").show();
            var formData = new FormData($('#formEdit')[0]);
            $.ajax({
                url: '<?php echo site_url('admin/product/updatedata'); ?>',
                type: "POST",
                dataType: 'json',
                data: formData,
                async: true,
                success: function(data) {
                    if (data.status === 'success') {
                        swal({
                            title:"Sukses",
                            text: "Update Produk Sukses",
                            showConfirmButton: false,
                            type: "success",
                            timer: 2000
                        }, function() {
                            location.reload();
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
                    $("#progress").hide();
                }, 
                error: function (response) {
                    swal({
                        title:"Error",
                        text: "Update Produk Gagal",
                        showConfirmButton: false,
                        type: "error",
                        timer: 2000
                    });
                    $("#progress").hide();
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });
});

// Add Thumbnail
$(document).ready(function() {
    var form        = $('#formInputThumbnail');
    var error       = $('.alert-danger', form);
    var success     = $('.alert-success', form);
    
    $("#formInputThumbnail").validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: { 
            foto: { disabled: true }
        },
        messages: { 
            foto: {
                disabled :'Gambar Thumbnail harus dipilih'
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
            var formData = new FormData($('#formInputThumbnail')[0]);
            $.ajax({
                url: '<?php echo site_url('admin/product/savedatathumbnail/'.$this->uri->segment(4)); ?>',
                type: "POST",
                dataType: 'json',
                data: formData,
                async: true,
                success: function(data) {
                    if (data.status === 'success') {
                        swal({
                            title:"Sukses",
                            text: "Upload Thumbnail Sukses",
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
                }, 
                error: function (response) {
                    swal({
                        title:"Error",
                        text: "Upload Thumbnail Gagal",
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

function edit_data_thumbnail(id) {
    $('#formEditThumbnail')[0].reset();

    $.ajax({
        url : "<?php echo site_url('admin/product/get_data/'); ?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#id').val(data.thumbnail_id);
            $('#thumbnail_image').val(data.thumbnail_image);
            $path = '<?=base_url();?>img/';
            if (data.thumbnail_image != null) {
                $('#previewFoto').attr('src', $path+'product_folder/'+data.thumbnail_image);
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

// Edit Thumbnail
$(document).ready(function() {
    var form        = $('#formEditThumbnail');
    var error       = $('.alert-danger', form);
    var success     = $('.alert-success', form);
    
    $("#formEditThumbnail").validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: {
            order: { disabled: true, number: true }
        },
        messages: { 
            order: {
                disabled :'Order harus diisi', number:'Harus Angka'
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
            var formData = new FormData($('#formEditThumbnail')[0]);
            $.ajax({
                url: '<?php echo site_url('admin/product/updatedatathumbnail/'.$this->uri->segment(4)); ?>',
                type: "POST",
                dataType: 'json',
                data: formData,
                async: true,
                success: function(data) {
                    if (data.status === 'success') {
                        swal({
                            title:"Sukses",
                            text: "Upload Thumbnail Sukses",
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
                }, 
                error: function (response) {
                    swal({
                        title:"Error",
                        text: "Upload Thumbnail Gagal",
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
            <form role="form" action="" method="post" id="formInputThumbnail" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-header">                      
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Form Tambah Gambar Thumbnail</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">                    
                    <label class="col-md-3 control-label">Upload Thumbnail</label>
                    <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?php echo base_url('img/no-image.png'); ?>" alt=""/>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                            <div>
                                <span class="btn default btn-file">
                                <span class="fileinput-new">
                                Pilih Foto </span>
                                <span class="fileinput-exists">
                                Ubah </span>
                                <input type="file" name="foto" accept=".png,.jpg,.jpeg,.gif" disabled>
                                </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                Hapus </a>
                            </div>
                        </div>
                        <div class="clearfix margin-top-10">
                            <span class="label label-danger">
                            INFO !</span>
                            Resolution : 300 x 300 Pixel
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Upload</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
            </form>
        </div>        
    </div>    
</div>

<div class="modal" id="formModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="" method="post" id="formEditThumbnail" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-header">                      
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Form Edit Gambar Slider</h4>
                <input type="hidden" name="id" id="id">
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Thumbnail</label>
                    <div class="col-md-9">
                        <img src="" style="width:50%;" id="previewFoto">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Upload Thumbnail</label>
                    <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?php echo base_url('img/no-image.png'); ?>" alt=""/>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                            <div>
                                <span class="btn default btn-file">
                                <span class="fileinput-new">
                                Pilih Foto </span>
                                <span class="fileinput-exists">
                                Ubah </span>
                                <input type="file" name="foto" accept=".png,.jpg,.jpeg,.gif" disabled>
                                </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                Hapus </a>
                            </div>
                        </div>
                        <div class="clearfix margin-top-10">
                            <span class="label label-danger">
                            INFO !</span>
                            Resolution : 300 x 300 Pixel
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Upload</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
            </form>
        </div>        
    </div>    
</div>
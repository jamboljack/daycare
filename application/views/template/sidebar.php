<?php
$uri  = $this->uri->segment(2);
$uri1 = $this->uri->segment(3);

if ($uri == 'home') {
    $dashboard      = 'active';
    $master         = '';
    $span_master_1  = '';
    $span_master_2  = '';
    $slider         = '';
    $about          = '';
    $img_about      = '';
    $visimisi       = '';
    $team           = '';
    $employee       = '';
    $product        = '';
    $promo          = '';
    $gal            = '';
    $span_gal_1     = '';
    $span_gal_2     = '';
    $category_gallery = '';
    $gallery        = '';
} elseif ($uri == 'slider') {
    $dashboard      = '';
    $master         = 'active open';
    $span_master_1  = '<span class="selected"></span>';
    $span_master_2  = 'open';
    $slider         = 'active';
    $about          = '';
    $img_about      = '';
    $visimisi       = '';
    $team           = '';
    $employee       = '';
    $product        = '';
    $promo          = '';
    $gal            = '';
    $span_gal_1     = '';
    $span_gal_2     = '';
    $category_gallery = '';
    $gallery        = '';
} elseif ($uri == 'about') {
    $dashboard      = '';
    $master         = 'active open';
    $span_master_1  = '<span class="selected"></span>';
    $span_master_2  = 'open';
    $slider         = '';
    $about          = 'active';
    $img_about      = '';
    $visimisi       = '';
    $team           = '';
    $employee       = '';
    $product        = '';
    $promo          = '';
    $gal            = '';
    $span_gal_1     = '';
    $span_gal_2     = '';
    $category_gallery = '';
    $gallery        = '';
} elseif ($uri == 'img_about') {
    $dashboard      = '';
    $master         = 'active open';
    $span_master_1  = '<span class="selected"></span>';
    $span_master_2  = 'open';
    $slider         = '';
    $about          = '';
    $img_about      = 'active';
    $visimisi       = '';
    $team           = '';
    $employee       = '';
    $product        = '';
    $promo          = '';
    $gal            = '';
    $span_gal_1     = '';
    $span_gal_2     = '';
    $category_gallery = '';
    $gallery        = '';
} elseif ($uri == 'visimisi') {
    $dashboard      = '';
    $master         = 'active open';
    $span_master_1  = '<span class="selected"></span>';
    $span_master_2  = 'open';
    $slider         = '';
    $about          = '';
    $img_about      = '';
    $visimisi       = 'active';
    $team           = '';
    $employee       = '';
    $product        = '';
    $promo          = '';
    $gal            = '';
    $span_gal_1     = '';
    $span_gal_2     = '';
    $category_gallery = '';
    $gallery        = '';
} elseif ($uri == 'team') {
    $dashboard      = '';
    $master         = 'active open';
    $span_master_1  = '<span class="selected"></span>';
    $span_master_2  = 'open';
    $slider         = '';
    $about          = '';
    $img_about      = '';
    $visimisi       = '';
    $team           = 'active';
    $employee       = '';
    $product        = '';
    $promo          = '';
    $gal            = '';
    $span_gal_1     = '';
    $span_gal_2     = '';
    $category_gallery = '';
    $gallery        = '';
} elseif ($uri == 'employee') {
    $dashboard      = '';
    $master         = 'active open';
    $span_master_1  = '<span class="selected"></span>';
    $span_master_2  = 'open';
    $slider         = '';
    $about          = '';
    $img_about      = '';
    $visimisi       = '';
    $team           = '';
    $employee       = 'active';
    $product        = '';
    $promo          = '';
    $gal            = '';
    $span_gal_1     = '';
    $span_gal_2     = '';
    $category_gallery = '';
    $gallery        = '';
} elseif ($uri == 'product') {
    $dashboard      = '';
    $master         = '';
    $span_master_1  = '';
    $span_master_2  = '';
    $slider         = '';
    $about          = '';
    $img_about      = '';
    $visimisi       = '';
    $team           = '';
    $employee       = '';
    $product        = 'active';
    $promo          = '';
    $gal            = '';
    $span_gal_1     = '';
    $span_gal_2     = '';
    $category_gallery = '';
    $gallery        = '';
} elseif ($uri == 'promo') {
    $dashboard      = '';
    $master         = '';
    $span_master_1  = '';
    $span_master_2  = '';
    $slider         = '';
    $about          = '';
    $img_about      = '';
    $visimisi       = '';
    $team           = '';
    $employee       = '';
    $product        = '';
    $promo          = 'active';
    $gal            = '';
    $span_gal_1     = '';
    $span_gal_2     = '';
    $category_gallery = '';
    $gallery        = '';
} elseif ($uri == 'category_gallery') {
    $dashboard      = '';
    $master         = '';
    $span_master_1  = '';
    $span_master_2  = '';
    $slider         = '';
    $about          = '';
    $img_about      = '';
    $visimisi       = '';
    $team           = '';
    $employee       = '';
    $product        = '';
    $promo          = '';
    $gal            = 'active open';
    $span_gal_1     = '<span class="selected"></span>';
    $span_gal_2     = 'open';
    $category_gallery = 'active';
    $gallery        = '';
} elseif ($uri == 'gallery') {
    $dashboard      = '';
    $master         = '';
    $span_master_1  = '';
    $span_master_2  = '';
    $slider         = '';
    $about          = '';
    $img_about      = '';
    $visimisi       = '';
    $team           = '';
    $employee       = '';
    $product        = '';
    $promo          = '';
    $gal            = 'active open';
    $span_gal_1     = '<span class="selected"></span>';
    $span_gal_2     = 'open';
    $category_gallery = '';
    $gallery        = 'active';
}
?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-search-wrapper">
                <form class="sidebar-search sidebar-search-bordered" action="#" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                        </span>
                    </div>
                </form>
            </li>

            <li class="tooltips <?=$dashboard;?>" data-container="body" data-placement="right" data-html="true" data-original-title="Dashboard">
                <a href="<?=site_url('admin/home');?>">
                    <i class="fa fa-home"></i><span class="title"> Dashboard</span>
                </a>
            </li>
            <?php if ($this->session->userdata('level') == 'Admin') { ?>
            <li class="heading">
                <h3 class="uppercase">MASTER</h3>
            </li>
            <li class="<?=$master;?>">
                <a href="#">
                    <i class="fa fa-database"></i>
                    <span class="title"> Umum</span>
                    <?=$span_master_1;?>
                    <span class="arrow <?=$span_master_2;?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?=$slider;?>">
                        <a href="<?=site_url('admin/slider');?>"><i class="fa fa-arrow-circle-o-right"></i> Slider Utama</a>
                    </li>
                    <li class="<?=$about;?>">
                        <a href="<?=site_url('admin/about');?>"><i class="fa fa-arrow-circle-o-right"></i> Tentang Kami</a>
                    </li>
                    <li class="<?=$img_about;?>">
                        <a href="<?=site_url('admin/img_about');?>"><i class="fa fa-arrow-circle-o-right"></i> Foto Tentang Kami</a>
                    </li>
                    <li class="<?=$visimisi;?>">
                        <a href="<?=site_url('admin/visimisi');?>"><i class="fa fa-arrow-circle-o-right"></i> Visi dan Misi</a>
                    </li>
                    <li class="<?=$team;?>">
                        <a href="<?=site_url('admin/team');?>"><i class="fa fa-arrow-circle-o-right"></i> Tim</a>
                    </li>
                    <li class="<?=$employee;?>">
                        <a href="<?=site_url('admin/employee');?>"><i class="fa fa-arrow-circle-o-right"></i> Karyawan</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <li class="heading">
                <h3 class="uppercase">CONTENT</h3>
            </li>
            <li class="tooltips <?=$product;?>" data-container="body" data-placement="right" data-html="true" data-original-title="Product & Facility">
                <a href="<?=site_url('admin/product');?>">
                    <i class="fa fa-archive"></i><span class="title"> Produk & Fasilitas</span>
                </a>
            </li>
            <li class="tooltips <?=$promo;?>" data-container="body" data-placement="right" data-html="true" data-original-title="Promo">
                <a href="<?=site_url('admin/promo');?>">
                    <i class="fa fa-tags"></i><span class="title"> Promo</span>
                </a>
            </li>
            <li class="<?=$gal;?>">
                <a href="#">
                    <i class="fa fa-image"></i>
                    <span class="title"> Galeri</span>
                    <?=$span_gal_1;?>
                    <span class="arrow <?=$span_gal_2;?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?=$category_gallery;?>">
                        <a href="<?=site_url('admin/category_gallery');?>"><i class="fa fa-arrow-circle-o-right"></i> Kategori Galeri</a>
                    </li>
                    <li class="<?=$gallery;?>">
                        <a href="<?=site_url('admin/gallery');?>"><i class="fa fa-arrow-circle-o-right"></i> Galeri Foto</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
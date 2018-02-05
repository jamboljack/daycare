<?php
$uri  = $this->uri->segment(1);
$uri1 = $this->uri->segment(2);

if ($uri == '' || $uri == 'home') {
    $beranda    = 'current-menu-item';
    $profMenu   = '';
    $profDetail = '';
    $profil     = '';
    $prodMenu   = '';
    $produk     = '';
    $galeri     = '';
    $promo      = '';
    $artikel    = '';
    $kontak     = '';
} elseif ($uri == 'profil' && $uri1 == '') {
    $beranda    = '';
    $profMenu   = 'current-menu-item';
    $profDetail = '';
    $profil     = 'current-menu-item';
    $prodMenu   = '';
    $produk     = '';
    $galeri     = '';
    $promo      = '';
    $artikel    = '';
    $kontak     = '';
} elseif ($uri == 'profil' && $uri1 == 'id') {
    $beranda    = '';
    $profMenu   = 'current-menu-item';
    $profDetail = 'current-menu-item';
    $profil     = '';
    $prodMenu   = '';
    $produk     = '';
    $galeri     = '';
    $promo      = '';
    $artikel    = '';
    $kontak     = '';
} elseif ($uri == 'produk') {
    $beranda    = '';
    $profMenu   = '';
    $profDetail = '';
    $profil     = '';
    $prodMenu   = '';
    $produk     = 'current-menu-item';
    $galeri     = '';
    $promo      = '';
    $artikel    = '';
    $kontak     = '';
} elseif ($uri == 'galeri') {
    $beranda    = '';
    $profMenu   = '';
    $profDetail = '';
    $profil     = '';
    $prodMenu   = '';
    $produk     = '';
    $galeri     = 'current-menu-item';
    $promo      = '';
    $artikel    = '';
    $kontak     = '';
} elseif ($uri == 'promo') {
    $beranda    = '';
    $profMenu   = '';
    $profDetail = '';
    $profil     = '';
    $prodMenu   = '';
    $produk     = '';
    $galeri     = '';
    $promo      = 'current-menu-item';
    $artikel    = '';
    $kontak     = '';
} elseif ($uri == 'artikel') {
    $beranda    = '';
    $profMenu   = '';
    $profDetail = '';
    $profil     = '';
    $prodMenu   = '';
    $produk     = '';
    $galeri     = '';
    $promo      = '';
    $artikel    = 'current-menu-item';
    $kontak     = '';
} elseif ($uri == 'kontak') {
    $beranda    = '';
    $profMenu   = '';
    $profDetail = '';
    $profil     = '';
    $prodMenu   = '';
    $produk     = '';
    $galeri     = '';
    $promo      = '';
    $artikel    = '';
    $kontak     = 'current-menu-item';
} else {
    $beranda    = '';
    $profMenu   = '';
    $profDetail = '';
    $profil     = '';
    $prodMenu   = '';
    $produk     = '';
    $galeri     = '';
    $promo      = '';
    $artikel    = '';
    $kontak     = '';
}

?>
<header id="header" class="header-v2">
    <div class="header_top">
        <div class="container">
            <div class="header_left float-left">
            </div>
            <div class="header_right float-right">
                <span class="login-register">
                    <a href="https://api.whatsapp.com/send?phone=6285647884918&text=Saya%20ingin%20bertanya%20tentang%20daycare%20Alifa" target="_blank">
                        <img src="<?=base_url('img/logo-wa.png');?>"> 085-647-884-918
                    </a>
                    <a href="<?=site_url('register');?>">Pendaftaran Anak</a>
                </span>
            </div>
        </div>
    </div>
    <div class="header_content" id="header_content">
        <div class="container">
            <div class="header_logo">
                <a href="<?=base_url();?>"><img src="<?=base_url();?>img/logo-alifa.png" alt=""></a>
            </div>
            <nav class="header_menu">
                <ul class="menu">
                    <li class="<?=$beranda;?>">
                        <a href="<?=base_url();?>"><i class="fa fa-home"></i> Beranda</a>
                    </li>
                    <li class="<?=$profMenu;?>">
                        <a href="#">Profil <span class="fa fa-caret-down"></span></a>
                        <ul class="sub-menu">
                            <li class="<?php if ($this->uri->segment(3) == '4') {echo $profDetail;} else {echo '';}?>"><a href="<?=site_url('profil/id/'.encrypt('4'));?>">Sambutan Direktur</a></li>
                            <li class="<?php if ($this->uri->segment(3) == '2') {echo $profDetail;} else {echo '';}?>"><a href="<?=site_url('profil/id/'.encrypt('2'));?>">Visi & Misi</a></li>
                            <li class="<?=$profil;?>"><a href="<?=site_url('profil');?>">Profil Daycare</a></li>
                            <li class="<?php if ($this->uri->segment(3) == '5') {echo $profDetail;} else {echo '';}?>"><a href="<?=site_url('profil/id/'.encrypt('5'));?>">Keunggulan</a></li>
                        </ul>
                    </li>
                    <li class="<?=$prodMenu;?>">
                        <a href="#">Produk & Fasilitas <span class="fa fa-caret-down"></span></a>
                        <ul class="sub-menu">
                            <?php $listProduk = $this->menu_m->select_menu_product()->result();foreach ($listProduk as $p) {?>
                            <li class="<?php if ($this->uri->segment(3) == $p->menu_id) {echo $produk;} else {echo '';}?>"><a href="<?=site_url('produk/id/' . encrypt($p->menu_id));?>"><?=$p->menu_name;?></a></li>
                            <?php }?>
                        </ul>
                    </li>
                    <li class="<?=$galeri;?>"><a href="<?=site_url('galeri');?>">Galeri</a></li>
                    <li class="<?=$promo;?>"><a href="<?=site_url('promo');?>">Promo</a></li>
                    <li class="<?=$artikel;?>"><a href="<?=site_url('artikel');?>">Tabloid</a></li>
                    <li class="<?=$kontak;?>"><a href="<?=site_url('kontak');?>">Kontak Kami</a></li>
                </ul>
            </nav>
            <span class="menu-bars">
                <span></span>
            </span>
        </div>
    </div>
</header>
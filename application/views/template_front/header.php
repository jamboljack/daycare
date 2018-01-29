<?php
$uri = $this->uri->segment(1);

if ($uri == '' || $uri == 'home') {
    $beranda = 'current-menu-item';
    $profil  = '';
    $produk  = '';
    $galeri  = '';
    $promo   = '';
    $artikel = '';
    $kontak  = '';
} elseif ($uri == 'profil') {
    $beranda = '';
    $profil  = 'current-menu-item';
    $produk  = '';
    $galeri  = '';
    $promo   = '';
    $artikel = '';
    $kontak  = '';
} elseif ($uri == 'produk') {
    $beranda = '';
    $profil  = '';
    $produk  = 'current-menu-item';
    $galeri  = '';
    $promo   = '';
    $artikel = '';
    $kontak  = '';
} elseif ($uri == 'galeri') {
    $beranda = '';
    $profil  = '';
    $produk  = '';
    $galeri  = 'current-menu-item';
    $promo   = '';
    $artikel = '';
    $kontak  = '';
} elseif ($uri == 'promo') {
    $beranda = '';
    $profil  = '';
    $produk  = '';
    $galeri  = '';
    $promo   = 'current-menu-item';
    $artikel = '';
    $kontak  = '';
} elseif ($uri == 'artikel') {
    $beranda = '';
    $profil  = '';
    $produk  = '';
    $galeri  = '';
    $promo   = '';
    $artikel = 'current-menu-item';
    $kontak  = '';
} elseif ($uri == 'kontak') {
    $beranda = '';
    $profil  = '';
    $produk  = '';
    $galeri  = '';
    $promo   = '';
    $artikel = '';
    $kontak  = 'current-menu-item';
} else {
    $beranda = '';
    $profil  = '';
    $produk  = '';
    $galeri  = '';
    $promo   = '';
    $artikel = '';
    $kontak  = '';
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
                        <i class="fa fa-whatsapp"></i> WA 085-647-884-918
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
                    <li class="<?=$profil;?>"><a href="<?=site_url('profil');?>">Profil</a></li>
                    <li class="<?=$produk;?>"><a href="<?=site_url('produk');?>">Produk & Fasilitas</a></li>
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
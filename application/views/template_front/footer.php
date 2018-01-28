<?php 
$meta = $this->menu_m->select_meta()->row();
?>
<footer id="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="mailchimp">
                        <h4>Sosial Media</h4>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="social">
                        <div class="social-content">
                            <?php
                            $social = $this->menu_m->select_social()->result();
                            foreach ($social as $s) {
                            ?>
                            <a href="<?=$s->social_url;?>" target="_blank"><i class="fa fa-<?=$s->social_class;?>"></i></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-6">
                    <div class="widget widget_logo">
                        <div class="widget-logo">
                            <div class="img">
                                <a href="<?=base_url();?>"><img src="<?=base_url();?>img/logo-footer.png" alt=""></a>
                            </div>
                            <div class="text">
                                <?php 
                                $listBranch = $this->menu_m->select_branch()->result();
                                foreach ($listBranch as $r) { 
                                    $branch_id  = $r->branch_id;
                                ?>
                                <p><b><?=$r->branch_name;?></b></p>
                                <?php
                                $listOffice = $this->menu_m->select_list($branch_id)->result();
                                foreach ($listOffice as $o) {
                                ?>
                                <p><i class="fa fa-home"></i> <b><?=ucwords(strtolower($o->office_name));?></b></p>
                                <?php 
                                    }
                                } 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Paket</h4>
                        <ul>
                            <?php 
                            $listPaket = $this->menu_m->select_paket()->result();
                            foreach($listPaket as $r) {
                            ?>
                            <li><a href="<?=site_url('paket/id/'.encrypt($r->paket_id).'/'.$r->paket_seo);?>"><?=ucwords(strtolower($r->paket_name));?></a></li>
                            <?php 
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-4 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">QUICK ACCESS</h4>
                        <ul>
                            <li><a href="<?=site_url('profil');?>">Profil</a></li>
                            <li><a href="<?=site_url('produk');?>">Produk & Fasilitas</a></li>
                            <li><a href="<?=site_url('kontak');?>">Kontak Kami</a></li>
                            <li><a href="<?=site_url('register');?>">Pendaftaran Anak</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="container">
            <p>&copy; <?=date('Y');?> - <?=$meta->meta_name;?></p>
        </div>
    </div>
</footer>
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
                <div class="col-xs-12 col-lg-5">
                    <div class="widget widget_logo">
                        <div class="widget-logo">
                            <div class="img">
                                <a href="<?=base_url();?>"><img src="<?=base_url();?>img/logo-alifa.png" alt=""></a>
                            </div>
                            <div class="text">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Paket</h4>
                        <ul>
                            <?php 
                            $listPaket = $this->menu_m->select_paket()->result();
                            foreach($listPaket as $r) {
                            ?>
                            <li><a href="#"><?=ucwords(strtolower($r->paket_name));?></a></li>
                            <?php 
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">ABOUT</h4>
                        <ul>
                            <li><a href="">About</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">Comming Soon</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-4 col-lg-3">
                    <div class="widget widget_tripadvisor">
                        <h4 class="widget-title">Tripadvisor</h4>
                        <div class="tripadvisor">
                        <p>Now with hotel reviews by</p>
                            <img src="images/tripadvisor.png" alt="">
                            <span class="tripadvisor-circle">
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i class="part"></i>
                            </span>
                        </div>
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
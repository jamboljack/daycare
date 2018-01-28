<section class="section-sub-banner bg-9">
    <div class="awe-overlay"></div>
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center heading">
                <h2>PAKET</h2>
                <p><?=$detail->paket_name;?></p>
            </div>
        </div>
    </div>
</section>

<section class="section-blog bg-white">
    <div class="container">
        <div class="blog">
            <div class="row">

                <h1 class="element-invisible">Paket</h1>
                <div class="col-md-8 col-md-push-4">
                    <div class="blog-content">
                        <article class="post post-single">
                            <div class="entry-header">
                                <h2 class="entry-title"><?=$detail->paket_name;?></h2>
                            </div>
                            <div class="entry-content">
                                <p align="justify"><?=$detail->paket_desc;?></p>
                            </div>
                        </article>
                    </div>
                </div> 
                <div class="col-md-4 col-md-pull-8">
                    <div class="sidebar">
                        <div class="widget widget_categories">
                            <h4 class="widget-title">JENIS PAKET</h4>
                            <ul>
                                <?php 
                                foreach($listPaket as $r) {
                                ?>
                                <li><a href="<?=site_url('paket/id/'.encrypt($r->paket_id).'/'.$r->paket_seo);?>"><?=ucwords(strtolower($r->paket_name));?></a></li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div class="widget widget_social">
                            <h4 class="widget-title">Sosial Media</h4>
                            <div class="widget-social">
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
    </div>
</section>
<section class="section-sub-banner bg-9">
    <div class="awe-overlay"></div>
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center heading">
                <h2>TABLOID</h2>
            </div>
        </div>
    </div>
</section>

<section class="section-blog bg-white">
    <div class="container">
        <div class="blog">
            <div class="row">

                <div class="col-md-8 col-md-push-4">
                    <div class="blog-content">
                        <h1 class="element-invisible">Blog detail</h1>
                        <?php
                        $tgl     = date('Y-m-d', strtotime($detail->article_post));
                        $tanggal = substr($tgl,8,2);
                        $tahun   = substr($tgl,0,4);
                        ?>
                        <article class="post post-single">
                            <div class="entry-media">
                                <img src="<?=base_url('img/article_folder/'.$detail->article_image);?>" alt="">
                                <span class="posted-on"><strong><?=$tanggal;?></strong><?=getBln(substr($tgl,5,2));?></span>
                            </div>
                            <div class="entry-header">
                                <h2 class="entry-title"><?=$detail->article_title;?></h2>
                                <p class="entry-meta">
                                    <span class="posted-on">
                                        <span class="screen-reader-text">Posted on</span>
                                        <span class="entry-time"><?=tgl_indo($detail->article_post);?></span>
                                    </span>
                                    <span class="entry-author">
                                        <span class="screen-reader-text">Posting oleh </span>
                                        <a href="#" class="entry-author-link">
                                            <span class="entry-author-name"><?=ucwords(strtolower($detail->user_name));?></span>
                                        </a>
                                    </span>
                                    <span class="entry-categories">
                                        <a href="<?=site_url('category/id/'.encrypt($detail->category_id).'/'.$detail->category_seo);?>"><?=ucwords(strtolower($detail->category_name));?></a>
                                    </span>
                                    <span class="entry-tags">
                                        <span class="screen-reader-text"><i class="fa fa-eye"></i></span>
                                        <a href="#"><?=$detail->article_read;?> kali</a>
                                    </span>
                                </p>
                            </div>
                            <div class="entry-content">
                                <p align="justify"><?=$detail->article_desc;?></p>
                            </div>
                        </article>
                    </div>
                </div> 

                <div class="col-md-4 col-md-pull-8">
                    <div class="sidebar">
                        <div class="widget widget_categories">
                            <h4 class="widget-title">KATEGORI</h4>
                            <ul>
                                <?php 
                                $listKategori = $this->menu_m->select_category()->result(); 
                                foreach($listKategori as $r) {
                                ?>
                                <li><a href="<?=site_url('artikel/kategori/'.encrypt($r->category_id).'/'.$r->category_seo);?>"><?=ucwords(strtolower($r->category_name));?></a></li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div class="widget widget_deal">
                            <h4 class="widget-title">PROMO</h4>
                            <div class="widget-deal owl-single">
                                <?php 
                                $listPromo = $this->menu_m->select_promo()->result(); 
                                foreach($listPromo as $r) {
                                ?>
                                <div class="item-isotope">
                                    <div class="gallery_item">
                                        <a href="<?=base_url('img/promo_folder/'.$r->promo_image);?>" class="mfp-image">
                                            <img src="<?=base_url('img/promo_folder/'.$r->promo_image);?>" alt="">
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        
                        <div class="widget widget_recent_entries has_thumbnail">        
                            <h4 class="widget-title">Artikel Terbaru</h4>
                            <ul>
                                <?php 
                                $listArticle = $this->menu_m->select_article()->result(); 
                                foreach($listArticle as $r) {
                                ?>
                                <li>
                                    <div class="img">
                                        <a href="<?=site_url('artikel/id/'.encrypt($r->article_id).'/'.$r->article_seo);?>">
                                            <img src="<?=base_url('img/article_folder/'.$r->article_image);?>" alt="">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <a href="<?=site_url('artikel/id/'.encrypt($r->article_id).'/'.$r->article_seo);?>"><?=word_limiter($r->article_title,3);?></a>
                                        <span class="date"><?=tgl_indo($r->article_post);?></span>
                                    </div>
                                </li>
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

                        <div class="widget">
                            <a href='https://acadooghostwriter.com/'>https://AcadooGhostwriter.com</a><script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=dd4d9711ef515a1e8c0b710020396043fcea5a4b'></script><script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/336909/t/0"></script>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
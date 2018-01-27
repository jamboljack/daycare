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
<section class="section_page-gallery">
    <div class="container">
        <div class="gallery">
            <h1 class="element-invisible">Tabloid</h1>
            <div class="gallery-cat text-center">
                <ul class="list-inline">
                    <li class="active"><a href="#" data-filter="*">Semua</a></li>
                    <?php foreach($listCategory as $r) { ?>
                    <li><a href="#" data-filter=".<?=$r->category_gallery_seo;?>"><?=$r->category_gallery_name;?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="gallery-content">
                <div class="row">
                    <div class="gallery-isotope col-4">
                        <div class="item-size"></div>
                        <?php foreach($listGalery as $r) { ?>
                        <div class="item-isotope <?=$r->category_gallery_seo;?>">
                            <a href="<?=site_url('galeri/id'.'/'.encrypt($r->gallery_id).'/'.$r->gallery_seo);?>" title="Detail Galeri">
                            <div class="gallery_item">
                                <img src="<?=base_url('img/gallery_folder/'.$r->gallery_image);?>" alt="">
                                <h6 class="text"><?=ucwords(strtolower($r->gallery_name));?></h6>
                            </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>       
</section>
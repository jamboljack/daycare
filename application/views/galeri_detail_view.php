<section class="section-sub-banner bg-9">
    <div class="awe-overlay"></div>
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center heading">
                <h2>GALERI</h2>
                <p><?=ucwords(strtolower($detail->gallery_name));?></p>
            </div>
        </div>
    </div>
</section>
<section class="section_page-gallery">
    <div class="container">
        <div class="gallery">
            <h1 class="element-invisible">Galeri</h1>
            <div class="gallery-content">
                <div class="row">
                    <div class="gallery-isotope col-4">
                        <div class="item-size"></div>
                        <?php foreach($listGalery as $r) { ?>
                        <div class="item-isotope">
                            <div class="gallery_item">
                                <a href="<?=base_url('img/gallery_folder/'.$r->detail_image);?>">
                                    <img src="<?=base_url('img/gallery_folder/'.$r->detail_image);?>" alt="">
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>       
</section>
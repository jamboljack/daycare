<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title">Dashboard <small>Informasi Umum</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i><a href="<?=site_url('admin/home');?>"> Dashboard</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt">
                    <i class="icon-calendar">&nbsp; </i><span class="uppercase visible-lg-inline-block"><?=tgl_indo(date('Y-m-d'));?></span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue-madison">
                    <div class="visual">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            
                        </div>
                        <div class="desc">
                            Total Member
                        </div>
                    </div>
                    <a class="more" href="<?=site_url('admin/member');?>">
                    View <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-intense">
                    <div class="visual">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            
                        </div>
                        <div class="desc">
                            Total Toko
                        </div>
                    </div>
                    <a class="more" href="<?=site_url('admin/shop');?>">
                    View <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple-plum">
                    <div class="visual">
                        <i class="fa fa-archive"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            
                        </div>
                        <div class="desc">
                            Total Produk
                        </div>
                    </div>
                    <a class="more" href="<?=site_url('admin/product');?>">
                    View <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green-haze">
                    <div class="visual">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            
                        </div>
                        <div class="desc">
                            Total Invoice
                        </div>
                    </div>
                    <a class="more" href="<?=site_url('admin/order');?>">
                    View <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat yellow-casablanca">
                    <div class="visual">
                        <i class="fa fa-list"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            
                        </div>
                        <div class="desc">
                            Nominal belum Terbayar
                        </div>
                    </div>
                    <a class="more" href="<?=site_url('admin/order');?>">
                    View <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat grey-gallery">
                    <div class="visual">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            
                        </div>
                        <div class="desc">
                            Nominal Terbayar
                        </div>
                    </div>
                    <a class="more" href="<?=site_url('admin/order');?>">
                    View <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-thunderbird">
                    <div class="visual">
                        <i class="fa fa-usd"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            
                        </div>
                        <div class="desc">
                            Total Transaksi
                        </div>
                    </div>
                    <a class="more" href="<?=site_url('admin/order');?>">
                    View <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
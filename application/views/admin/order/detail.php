<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>backend/js/sweetalert2.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">Detail Order #<?=$detail->order_id;?></h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>                
                <li>
                    <a href="#">Transaksi</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/order'); ?>">Daftar Order</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Detail Order Invoice #<?=$detail->order_id;?></a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt">
                    <i class="icon-calendar">&nbsp; </i><span class="uppercase visible-lg-inline-block"><?php echo tgl_indo(date('Y-m-d')); ?></span>
                </div>
            </div>
        </div>            
                        
        <div class="invoice">
        	<div class="row invoice-logo">
				<div class="col-xs-6 invoice-logo-space">
					<img src="<?=base_url('img/logo-login.png');?>" width="150px" class="img-responsive" alt=""/>
				</div>
				<div class="col-xs-6">
					<p>#<?=$detail->order_id;?> / <?=tgl_indo($detail->order_date);?></p>
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-xs-4">
					<h3>Pembeli :</h3>
					<ul class="list-unstyled">
						<li><strong><?=$detail->address_name;?></strong></li>
						<li><?=$detail->address_detail.' Kec. '.$detail->subdistrict_name;?></li>
						<li><?=$detail->city_name.' - '.$detail->province;?></li>
						<li><?=$detail->address_zipcode;?></li>
						<li><?=$detail->address_phone;?></li>
					</ul>
				</div>
				<div class="col-xs-4">
					<h3>Status Invoice :</h3>
					<ul class="list-unstyled">
						<?php 
						if ($detail->order_status=='BB') {
							$status = '<span class="label label-default">BELUM BAYAR</span>';
						} elseif ($detail->order_status=='BK') {
							$status = '<span class="label label-primary">BELUM KIRIM</span>';
						} elseif ($detail->order_status=='BT') {
							$status = '<span class="label label-warning">BELUM TERIMA</span>';
						} elseif ($detail->order_status=='S') {
							$status = '<span class="label label-success">SELESAI</span>';
						} elseif ($detail->order_status=='B') {
							$status = '<span class="label label-danger">BATAL</span>';
						}
						?>
						<li><?=$status;?></li>
						<li><br></li>
						<?php if ($detail->order_status <> 'BB' && $detail->order_status <> 'B') { ?>
						<li><strong>Tgl. Bayar :</strong> <?=date("d-m-Y", strtotime($detail->order_date_payment));?></li>
						<li><strong>Nama Bank :</strong> <?=$detail->order_bank;?></li>
						<li><strong>Atas Nama :</strong> <?=$detail->order_atasnama;?></li>
						<?php } ?>
					</ul>
				</div>
				<div class="col-xs-4 invoice-payment">
					<h3>Detail Pembayaran :</h3>
					<ul class="list-unstyled">
						<li><strong>Jenis :</strong> Transfer Bank</li>
						<li><strong>Bank :</strong> <?=$detailBank->contact_bank;?></li>
						<li><strong>No. Rekening :</strong> <?=$detailBank->contact_norek;?></li>
						<li><strong>Atas Nama :</strong> <?=$detailBank->contact_account;?></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<?php
					$no = 1;
					foreach($listShop as $s) {
						$group_id = $s->group_id;
						if (!empty($s->shop_image)) {
							$logo = base_url('img/shop_folder/'.$s->shop_image);
						} else {
                        	$logo = base_url('img/no-logo.png');
                        }
					?>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th colspan="2">
									<img src="<?=$logo;?>" width="25px" style="display: inline-block; border-radius: 50%;"> <b><?=$s->shop_name;?></b>
                                </th>
                                <th colspan="3">Bank Account : <?=$s->shop_norek.' / '.$s->shop_bank_name;?></th>
							</tr>
							<tr>
								<th width="5%">No</th>
								<th>Nama Barang</th>
								<th width="10%" class="hidden-480">Harga</th>
								<th width="10%" class="hidden-480">Qty</th>
								<th width="10%">Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i     		= 1;
                            $total  	= 0;
                            $listItem 	= $this->order_m->select_all_item($group_id)->result();
                            foreach($listItem as $r) { 
                            	$total  = ($total+$r->detail_total);
                            ?>
							<tr>
								<td><?=$i;?></td>
								<td><?=$r->product_name;?></td>
								<td class="hidden-480" align="right">Rp.<?=number_format($r->detail_price,0,'',',');?></td>
								<td class="hidden-480" align="right"><?=$r->detail_qty;?></td>
								<td align="right">Rp.<?=number_format($r->detail_total,0,'',',');?></td>
							</tr>
							<?php 
								$i++; 
							}
                            ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right">Sub Total :</td>
								<td align="right">Rp.<?=number_format($s->group_subtotal,0,'',',');?></td>
							</tr>
							<tr>
								<td colspan="4" align="right">Pengiriman - <?=$s->courier_name;?> :</td>
								<td align="right">Rp.<?=number_format($s->group_ongkir,0,'',',');?></td>
							</tr>
							<tr>
								<td colspan="4" align="right"><strong>Total (<?=count($listItem);?> Barang) :</strong></td>
								<td align="right"><strong>Rp.<?=number_format($s->group_total,0,'',',');?></strong></td>
							</tr>
						</tfoot>
					</table>
					<?php $no++; } ?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<a href="<?=site_url('admin/order');?>" class="btn btn-warning hidden-print"><i class="fa fa-times"></i> Kembali</a>
					<a class="btn blue hidden-print" onclick="javascript:window.print();">Print <i class="fa fa-print"></i></a>
				</div>
				<div class="col-xs-8 invoice-block">
					<ul class="list-unstyled amounts">
						<li><strong>Sub Total :</strong> <?=number_format($detail->order_subtotal,0,'',',');?></li>
						<li><strong>Ongkos Kirim :</strong> <?=number_format($detail->order_ongkir,0,'',',');?></li>
						<li><strong>Total :</strong> <?=number_format($detail->order_total,0,'',',');?></li>
					</ul>
					<!-- <a class="btn green hidden-print margin-bottom-5">Submit Your Invoice <i class="fa fa-check"></i></a> -->
				</div>
			</div>
		</div>

    </div>            
</div>
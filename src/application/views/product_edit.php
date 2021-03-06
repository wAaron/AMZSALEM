<link rel="stylesheet" href="/css/jquery.fileupload.css">
<div class="row breadcrumb-ct" style="display:none">
	<div class="col-md-12">
		<!--breadcrumbs start -->
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url()?>management"><i class="fa fa-group"></i> Product List</a></li>
			<li class="active"><?php echo 'Edit Product';?> </li>
		</ul>
		<!--breadcrumbs end -->
	</div>
</div>
<div class="row">	
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<span class="glyphicon glyphicon-th" style="padding-right: 6px;"></span><?php echo 'Update Product';?>
				<span class="tools pull-right">
					<a class="fa fa-chevron-down" href="javascript:;"></a>
					<a class="fa fa-cog" href="javascript:;"></a>
					<a class="fa fa-times" href="javascript:;"></a>
				 </span>
			</header>
			<div class="panel-body">
				<?php  $this->load->view('product/price_quantity_edit', $product); ?>
				<div class="col-lg-8">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td>Product Name</td>
								<td><?php echo $product->title; ?></td>
							</tr>
							<tr>
								<td>Item Package Quantity</td>
								<td><?php echo $product->itemPackageQuantity; ?></td>
							</tr>
							<tr>
								<td>Brand</td>
								<td><?php echo $product->brand; ?></td>
							</tr>
							<tr>
								<td>Country</td>
								<td><?php echo $product->country; ?></td>
							</tr>
							<?php if (isset($product->price) && ($product->price->feedStatus == '_SUCCESS_')) {?>
							<tr>
								<td>MSRP (<?php echo $product->price->currency;?>)</td>
								<td><?php echo $product->price->price; ?></td>
							</tr>
							<?php } else if (($product->price->feedStatus == '_SUBMITTED_')){?>
							<tr>
								<td>MSRP (<?php echo $product->price->currency;?>)</td>
								<td><?php echo $product->price->price; ?>(Pending)</td>
							</tr>
							<?php } else {?>
							<tr>
								<td>MSRP (<?php echo $product->currency;?>)</td>
								<td><?php echo $product->MSRP; ?></td>
							</tr>
							<?php }?>
							<tr>
								<td>Manufacturer</td>
								<td><?php echo $product->manufacturer; ?></td>
							</tr>
							<tr>
								<td>Product Description</td>
								<td><?php echo $product->description; ?></td>
							</tr>
							<?php if (isset($product->inventory)) {?>
								<?php if ($product->inventory->feedStatus != '_SUCCESS_') {?>
								<tr>
									<td colspan="2">
										<b>Inventory Pending (waiting amazon verify).</b>
									</td>
								</tr>
								<?php }?>
								<tr>
									<td>Quantity</td>
									<td><?php echo $product->inventory->quantity; ?></td>
								</tr>
								<tr>
									<td>FulfillmentLatency</td>
									<td><?php echo $product->inventory->fulfillmentLatency; ?></td>
								</tr>
							<?php }?>
						</tbody>
					</table>
					<?php  $this->load->view('product/'.$categories.'_edit', $product); ?>
				</div>
				<?php  $this->load->view('product/upload_image', $product); ?>
			</div>
			<form id="hiddenForm" class="hidden" method="POST">
				<input type="hidden" name="SKU" value="<?php echo $product->SKU;?>" />
				<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			</form>
		</section>
	</div>
</div>
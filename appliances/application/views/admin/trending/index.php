<?php $this->load->view('include/header');  ?>
<div class="page">
	<div class="page-main">
		<!--aside open-->
       <?php $this->load->view('include/admin-sidebar');  ?>
        <!--aside closed-->
		<div class="app-content main-content">
			<div class="side-app">
				<!--app header-->
				 <?php $this->load->view('include/app-header');  ?>
				<!--/app header-->	
				<div class="page-header d-xl-flex d-block">
					<div class="page-leftheader">
						<h4 class="page-title"><span class="font-weight-normal text-muted ms-2">Trending Blocks</span></h4>
					</div>
				</div>
				<!--End Page header-->
				
				<!-- Profile Page-->
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="flash-message mb-5">
							 <?php 

								if($this->session->flashdata('message') != '')
								{ 

									echo $this->session->flashdata('message');

								}?>	
						</div>
						<div class="card ">
							<div class="card-header border-0 d-sm-max-flex">
								<h4 class="card-title">Trending Block List</h4>
								<div class="card-options mt-sm-max-2">
									<a href="<?php echo base_url() ?>admin/trending/add" class="btn btn-primary me-3"><i class="feather feather-plus-circle"></i> Add Trending Block</a>
								</div>
							</div>
							<div class="card-body" >
								<div class="table-responsive spruko-delete">
									<table class="table table-vcenter text-nowrap table-bordered table-striped ticketdeleterow w-100" id="sts-table">
										<thead>
											<tr>
												<th width="10">#</th>
												<th >Title</th>
												<th >Description</th>
												<th >Block Img</th>
												<th >Block Link</th>
												<th >Category</th>
												<th >Created date</th>
												<th >Status</th>
												<th >Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php if( count($trendLists) > 0 ) {
													$i = 0; 
													foreach($trendLists as $key => $trend): 
													$i++; 
													$encodeId = base64_encode($trend->trend_id);
													$hexaId = bin2hex($encodeId);
											?>
											<tr>
												<td><?php  echo $i; ?></td>
												<td><?php echo $trend->trend_title; ?></td>
												<td><?php echo $trend->trend_desc; ?></td>
												<td><?php if ($trend->trend_img) { ?><img src="<?php echo base_url(); ?>assets/trending-block-images/<?php echo $trend->trend_img; ?>" height="100px"> <?php } ?></td>
												<td><?php echo $trend->trend_link; ?></td>
												<td><?php echo $trend->cat_name; ?></td>
												<td><?php echo date('d M, Y', strtotime($trend->trend_created)); ?></td>
												<td><?php $status = $trend->trend_status; if($status == 0) { echo '<span class="badge badge-danger">Inactive</span>'; } elseif($status == 1 ){ echo '<span class="badge badge-primary">Active</span>'; } ?></td>
												<td>
													<div class = "d-flex">
													    <a href="<?php echo base_url() ?>admin/trending/edit?trend=<?php echo $hexaId; ?>" class="action-btns1 edit-testimonial"><i class="feather feather-edit text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i></a>
													   <?php echo anchor('/admin/trending/deletetrend/'.$hexaId,'<i class="feather feather-trash-2 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>',array('class'=>'action-btns1','onclick'=>"return confirm('Are you sure want to delete this Trending Block?')"));?>
													</div>
												</td>
											</tr>
											 <?php endforeach; } else { ?>
						                    <tr>
						                      <td colspan="9" align="center">No records found.</td>
						                    </tr>
						                    <?php }  ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('include/footer'); ?>		
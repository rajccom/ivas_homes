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
						<h4 class="page-title"><span class="font-weight-normal text-muted ms-2">Category</span></h4>

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
							<div class="card-header border-0">
								<h4 class="card-title">Edit Category</h4>
								<div class="card-options mt-sm-max-2">
									<a href="<?php echo base_url() ?>admin/category" class="btn btn-primary me-3"><i class="feather feather-corner-up-left"></i> Back</a>
								</div>
							</div>
							 <form class="add-dept" name="edit-cate" method="post" action="<?php //echo $action; ?>" enctype="multipart/form-data">
								<div class="card-body" >
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<div class="form-group">
												<label class="form-label">Category Name <span class="text-red">*</span></label>
												<input type="text" class="form-control" name="cat_name" id="cat_name" value="<?php echo set_value('cat_name', $this->form_data->cat_name); ?>">  <br/>
                          						<?php echo form_error('cat_name'); ?>
											</div>
										</div>
										<div class="col-sm-12 col-md-12">
											<div class="form-group">
												<label class="form-label">Category Description <span class="text-red">*</span></label>
												<textarea class="form-control" name="cat_desc" id="cat_desc" value="<?php echo set_value('cat_desc', $this->form_data->cat_desc); ?>"><?php echo set_value('cat_desc', $this->form_data->cat_desc); ?></textarea> <br/>
                          						<?php echo form_error('cat_desc'); ?>
											</div>
										</div>
										<div class="col-sm-12 col-md-12">
											<div class="form-group">
												<label class="form-label">Upload Category Banner Img</label>
												<img class="mb-3" src="<?php echo base_url(); ?>assets/category-back-img/<?php echo $this->form_data->cat_back_img; ?>" height="70px">
												<div class="input-group file-browser">
													<input class="form-control" name="cat_back_img" type="file">
												</div>
												<small class="text-muted"><i>The file size should not be more than 1MB</i></small>
												<?php echo form_error('cat_back_img'); ?>
											</div>
										</div>
										<div class="col-sm-12 col-md-12">
											<div class="form-group">
												<label class="form-label">Upload Category List Img</label>
												<img class="mb-3" src="<?php echo base_url(); ?>assets/category-list-img/<?php echo $this->form_data->cat_list_img; ?>" height="70px">
												<div class="input-group file-browser">
													<input class="form-control" name="cat_list_img" type="file">
												</div>
												<small class="text-muted"><i>The file size should not be more than 1MB</i></small>
												<?php echo form_error('cat_list_img'); ?>
											</div>
										</div>
										<div class="col-sm-12 col-md-12">
											<div class="form-group">
												<label class="form-label">Meta Title <span class="text-red">*</span></label>
												<input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo set_value('meta_title', $this->form_data->meta_title); ?>">  <br/>
                          						<?php echo form_error('meta_title'); ?>
											</div>
										</div>
										<div class="col-sm-12 col-md-12">
											<div class="form-group">
												<label class="form-label">Meta Description <span class="text-red">*</span></label>
												<textarea class="form-control" name="meta_desc" id="meta_desc" value="<?php echo set_value('meta_desc', $this->form_data->meta_desc); ?>"><?php echo set_value('meta_desc', $this->form_data->meta_desc); ?></textarea> <br/>
                          						<?php echo form_error('meta_desc'); ?>
											</div>
										</div>
										<div class="col-sm-12 col-md-12">
											<div class="form-group">
												<label class="form-label">Meta Keywords <span class="text-red">*</span></label>
												<textarea class="form-control" name="meta_keyword" id="meta_keyword" value="<?php echo set_value('meta_keyword', $this->form_data->meta_keyword); ?>"><?php echo set_value('meta_keyword', $this->form_data->meta_keyword); ?></textarea> <br/>
                          						<?php echo form_error('meta_keyword'); ?>
											</div>
										</div>
										<div class="col-sm-12 col-md-12">
											<div class="form-group">
												<label class="form-label">Status <span class="text-red">*</span></label>
												<?php $status = $this->form_data->cat_status; ?>
												<select class="form-control" name="cat_status" id="cat_status">
												  	<option value="">Please Select</option>
												  	<option value="0" <?php if($status == 0){ echo "selected"; } ?>>Inactive</option>
												 	<option value="1" <?php if($status == 1){ echo "selected"; } ?>>Active</option>
												</select>
												<br/>
						  						<?php echo form_error('cat_status'); ?> 
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12 card-footer">
									<div class="form-group float-end">
										<input type="submit"  name="editcate"  class="btn btn-primary" value="Save Changes">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('include/footer'); ?>		
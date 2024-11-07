<?php $this->load->view('include/header-front'); ?>
<div class="productpagebc homebreadcrumbsec">
	<div class="container">
	    <nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
		    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Electricals</a></li>
		    <li class="breadcrumb-item"><a href="#">Product</a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo $productInfo->pro_name; ?></li>
		  </ol>
		</nav>
	</div>
</div>	
<div class="productdetailsec">
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-lg-7 col-md-12">
				<div class="productimagesblk">
					<div class="zoompro-wrap zoompro-2">
						<div class="zoompro-border zoompro-span">
							<img class="zoompro" src="<?php echo base_url(); ?>assets/product-img/<?php echo $productInfo->pro_img; ?>" data-zoom-image="<?php echo base_url(); ?>assets/product-img/<?php echo $productInfo->pro_img; ?>" alt="<?php echo $productInfo->pro_name; ?>">
						</div>	
					</div>							
					<div id="gallery" class="product-dec-slider-2">
							<a class="thumbimg"  data-image="<?php echo base_url(); ?>assets/product-img/<?php echo $productInfo->pro_img; ?>" data-zoom-image="<?php echo base_url(); ?>assets/product-img/<?php echo $productInfo->pro_img; ?>">
								<img src="<?php echo base_url(); ?>assets/product-img/<?php echo $productInfo->pro_img; ?>" alt="<?php echo $productInfo->pro_name; ?>">
							</a>
							<?php if( count($imagesLists) > 0 ) { 
							foreach($imagesLists as $key => $image): 
							?>
							<a class="thumbimg"  data-image="<?php echo base_url(); ?>assets/product-img/<?php echo $image->pro_glry_img; ?>" data-zoom-image="<?php echo base_url(); ?>assets/product-img/<?php echo $image->pro_glry_img; ?>">
								<img src="<?php echo base_url(); ?>assets/product-img/<?php echo $image->pro_glry_img; ?>" alt="<?php echo $productInfo->pro_name; ?>">
							</a>
							<?php endforeach; } ?>	
					</div>		
				</div>
						
			</div>
			<div class="col-xl-5 col-lg-5 col-md-12">
				<div class="productdetailsblk">
					<h1 class="title"><?php echo $productInfo->pro_name; ?></h1>
					<div class="productattributes">
						<table>
							<tbody>
								<tr><td class="titletd"><strong>Category:</strong></td><td> <?php echo $cateInfo->cat_name; ?></td></tr>
								<?php if( count($subcateLists) > 0 ) { ?>
								<tr><td class="titletd"><strong>type:</strong></td>
									<td> <?php foreach($subcateLists as $key => $subcate):
											echo "<span>".$subcate->sub_cat_name."</span>";
											endforeach;
											?>	
									</td></tr>
								<?php  } ?>
								<?php foreach($attributeLists as $key => $attribute){ ?>
									<tr><td class="titletd"><strong><?php echo $attribute->attr_name; ?>:</strong></td>
										<td>
											<?php 
												 		if($proattributeLists->pro_attributes_list != null)
												 		{
														$proattributeListsary = explode(',', $proattributeLists->pro_attributes_list);
														}
														
														?>
										<?php if($attribute->attr_name == "Color"){ ?>
													<ul class="colorlist">
														<?php foreach($attributevalueLists as $key => $attributevalue){ 
															if($attribute->attr_id == $attributevalue->attr_id){
																if($proattributeLists->pro_attributes_list != null)
												 							{ if(in_array($attributevalue->attr_val_id, $proattributeListsary)) {
												 			?>
												 			<li><div class="clorblk"><span class="clrspan" style="background: <?php echo $attributevalue->attr_val_desc; ?>"></span><span><?php echo $attributevalue->attr_val_name; ?><?php //echo $value_parameter ?></span></div></li>
												 		<?php  } } } } ?>	
													</ul>	
										<?php }else{ ?>	
										<?php foreach($attributevalueLists as $key => $attributevalue){ 
															if($attribute->attr_id == $attributevalue->attr_id){
																if($proattributeLists->pro_attributes_list != null)
												 							{ if(in_array($attributevalue->attr_val_id, $proattributeListsary)) {
												 			?>
																<span><?php echo $attributevalue->attr_val_name; ?><?php //echo $value_parameter ?></span>
															<?php  } } ?>	
										<?php	} } } ?>
									
										</td>
									</tr>						
								<?php	} ?>
							</tbody>
						</table>
					</div>
					

					<?php 
						if($descInfo)
						{
					?>
					<div class="productdetaildesc">
						<?php 
									if($descInfo)
									{
										echo $descInfo->description;
									}
									else
									{ 
									?>
										<p>No Data Found</p>
									<?php	
									}	
									?>
					</div>
					<?php } ?>
					<div class="productdetailtab">
						<div class="accordion" id="accordionPanelsStayOpenExample">
						  <div class="accordion-item">
						    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
						      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#features" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
						        features
						      </button>
						    </h2>
						    <div id="features" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
						      <div class="accordion-body">
						        <div class="productfeatures">
						        	<?php 
									if($profeatureLists)
									{
									?>
									<ul>
										<?php foreach($profeatureLists as $key => $profeature): ?>
										<li>
						        			<div class="featimg">
						        				<img src="<?php echo base_url(); ?>assets/feature-icons/<?php echo $profeature->feat_img; ?>" alt="<?php echo $profeature->feat_name; ?>">
						        			</div>
						        			<p><?php echo $profeature->feat_name; ?></p>
						        		</li>	
										<?php endforeach; ?>	
									</ul>	
									<?php	
									}
									else
									{ 
									?>
										<p>No Data Found</p>
									<?php	
									}	
									?>						  
						        </div>	
						      </div>
						    </div>
						  </div>
						</div>
					</div>
					<div class="productdetailinq">
						<a href="#" data-bs-toggle="modal" data-bs-target="#productModal">Enquire Now</a>
					</div>
					</br>
								</br>
								<?php if (!empty($productInfo->amazon_link) && !empty($productInfo->flipkart_link)): ?>
								<div class="buy-amazon-link">
									<a href="<?php echo htmlspecialchars($productInfo->amazon_link, ENT_QUOTES, 'UTF-8'); ?>" target="_blank">
										Buy online <img src="<?php echo base_url(); ?>res/images/amazon-logo.webp" alt="Buy on Amazon">
									</a>
								</div>
								<div class="buy-flipkart_link">
									<a href="<?php echo htmlspecialchars($productInfo->flipkart_link, ENT_QUOTES, 'UTF-8'); ?>" target="_blank">
										Buy online <img src="<?php echo base_url(); ?>res/images/flipkart-logo.webp" alt="Buy on Flipkart">
									</a>
								</div>
							<?php endif; ?>


								

					<div class="flash-message mt-4">
										 <?php 

											if($this->session->flashdata('profrmmessage') != '')
											{ 

												echo $this->session->flashdata('profrmmessage');

											}?>	
									</div>	
				</div>
			</div>	
		</div>
	</div>
</div>

<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enquire Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<div class="ctafrm">
        							<form method="post" id="productinquiryfrm">
										<div class="formgroup">
											<input type="text" name="pro_inq_name" placeholder="Name">
											<br/>
					  						<?php echo form_error('pro_inq_name'); ?>
										</div>
										<div class="formgroup">
											<input type="email" name="pro_inq_email" placeholder="Email">
											<br/>
					  						<?php echo form_error('pro_inq_email'); ?>
										</div>
										<div class="formgroup">
											<input type="tel" name="pro_inq_phone" placeholder="Phone  no.">
											<br/>
					  						<?php echo form_error('pro_inq_phone'); ?>
										</div>
										<div class="formgroup">
											<input type="text" name="pro_inq_city" placeholder="City">
											<br/>
					  						<?php echo form_error('pro_inq_city'); ?>
										</div>
										<div class="formgroup">
											<select name="pro_inq_category" class="form-control">
											  <option value="" disabled="" selected="">Select Category</option>
											    <option value="modular-kitchen">Modular Kitchen</option>
											    <option value="designer-hardware">Designer Hardware</option>
											    <option value="sanitaryware">Sanitaryware</option>
											    <option value="tiles">Tiles</option>
											    <option value="bath-fittings">Bath Fittings</option>
											    <option value="fans">Fans</option>
											    <option value="lightings">Lightings</option>
											    <option value="appliances">Appliances</option>
											 </select>
											 <?php echo form_error('pro_inq_category'); ?>
										</div>
										<div class="formgroup">
											<textarea name="pro_inq_message" placeholder="Message"></textarea>
										</div>
										<div class="formgroup">
						                  <div class="g-recaptcha" data-sitekey="6LcRyZ4pAAAAADOncJBDMrCaELeQFlOPx7ihWAo_"></div>
						                  <div id="captcha-error" style="color: red;"></div>
						                </div>
										<div class="formgroup">
											<input type="submit" class="sendbtn" name="prosendinquiry" value="Send Us">
										</div>	
									</form>

		</div>							
      </div>
    </div>
  </div>
</div>
<?php 
	if($speciInfo)
{
	?>
<div class="techspecsec">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<h2 class="sec-title text-center"><span>Technical Specification</span></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-10 col-lg-10 col-md-12 me-auto ms-auto text-center">
				<div class="productspecification">
									<?php 
									if($speciInfo)
									{
										echo $speciInfo->specification;
									}
									else
									{ 
									?>
										<p>No Data Found</p>
									<?php	
									}	
									?>
				</div>
			</div>
		</div>		
	</div>
</div>
<?php
}
?>
<div class="relprosec">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<h2 class="sec-title text-center"><span>Related products</span></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-10 col-lg-10 col-md-12 me-auto ms-auto">
				<div class="catlistingblk">
						<div class="row">
							<?php 
								if( count($productlist) > 0 ) { 
									foreach($productlist as $key => $product):
							?>
							<div class="col-xl-3 col-lg-3 col-md-6">
								<div class="productblk">
									<div class="productblkimg">
										<a href="<?php echo base_url(); ?>product/<?php echo $product->pro_slug; ?>"><img src="<?php echo base_url(); ?>assets/product-img/<?php echo $product->pro_img; ?>" alt="<?php echo $product->pro_name; ?>"></a>
									</div>
									<div class="productblkcnt">
										<h3 class="title"><?php echo $product->pro_name; ?></h3>
									</div>
									<div class="productblklink">
										<a href="<?php echo base_url(); ?>product/<?php echo $product->pro_slug; ?>">Explore</a>
									</div>	
								</div>
							</div>
							<?php endforeach; } else { ?>
								<div class="col-xl-12 col-lg-12 col-md-12">
									<p>No Products found.</p>
								</div>	
							<?php }  ?>		
						</div>	
					</div>
			</div>
		</div>		
	</div>	
</div>		
<div class="catalogsec">
	<div class="container">
		<div class="row">
			<div class="catalogdiv">
				<div class="row align-items-center">
					<div class="col-xl-6 col-lg-6 col-md-12">
						<div class="catlogcntblk">
							<p class="supttl">Here is your</p>
							<div class="ttlblk">
								<img src="<?php echo base_url(); ?>res/images/nivas-logo.png" alt="Nivas">
								<span>Catalogue</span>
							</div>
							<p>Flip through our latest catalogue to find the in-trend designs and models of IVAS Appliances. </p>
							<p class="downloadbtn"><span>Download Now</span><a href="<?php echo base_url(); ?>assets/catalog/ivas-home-appliances.pdf" download><i class="fa fa-download" aria-hidden="true"></i></a></p>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-12">
						<img src="<?php echo base_url(); ?>res/images/catalog.png" alt="catalog">
					</div>
				</div>		
			</div>	
		</div>	
	</div>
</div>
<?php /*
<div class="testisec">
	<div class="container">
		<div class="row">
			<div class="col-xxl-11 col-xl-11 col-lg-11 col-md-12 col-sm-12 me-auto ms-auto">
				<div class="testiblk">
					<div class="testittl"><img src="<?php echo base_url(); ?>res/images/curve-text.png" alt="testimonial"></div>
					<div id="testimonial-slider" class="owl-carousel">
		                <?php if( count($testimonialLists) > 0 ) {
							$i = 0; 
							foreach($testimonialLists as $key => $testi): 
							 						
						?>
						<div class="testimonial">
		                    <p class="description">
		                        <?php echo $testi->testimonial; ?>
		                    </p>
		                    <h3 class="testimonial-title">
		                        <span><?php echo $testi->testi_client; ?></span>
		                    </h3>
		                </div>
						<?php 
						$i++;
						endforeach; } ?>
		            </div>
				</div>
			</div>	
		</div>
		<div class="row">			
				<div class="col-xxl-10 col-xl-10 col-lg-10 col-md-12 col-sm-12 me-auto ms-auto">
					<div class="ctatitlblk">
						<p>for any inquiry direct contact us here :</p>
						<ul>
							<li><a href="tel:+919900080007"><i class="fa fa-phone" aria-hidden="true"></i> +91-99000 80007</a></li>
							<li><a href="mailto:contact@ivas.homes"><i class="fa fa-envelope" aria-hidden="true"></i> contact@ivas.homes</a></li>
						</ul>
					</div>
				</div>
		</div>			
	</div>
</div> */ ?>
<div class="homeblogsec">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<h2 class="sec-title text-center"><span>did you know?</span></h2>
			</div>
		</div>
		<div class="row blogdiv">
			<?php if( count($blogLists) > 0 ) { 
					foreach($blogLists as $key => $blog):
					if($blog->cat_name == "Cooking Appliances")
							{	
								$caticon = "cooking-icon.png";
							}elseif ($blog->cat_name == "Kitchen Appliances") {
								$caticon = "kitchen-icon.png";
							}elseif ($blog->cat_name == "Fabric Care Appliances") {
								$caticon = "fabric-icon.png";
							}else{
								$caticon = "ivas-icon.png";
							} 
			?>
			<div class="col-xl-4 col-lg-4 col-md-6">
				<div class="blogblock">
					<div class="blogimg">
						<img src="<?php echo base_url(); ?>assets/blogs/<?php echo $blog->blog_img; ?>" alt="<?php echo $blog->blog_title; ?>">
					</div>
					<div class="blogcnt">
						<div class="blogtitlblk">
							<div class="caticn">
								<img src="<?php echo base_url(); ?>res/images/<?php echo $caticon; ?>" alt="<?php echo $blog->cat_name; ?>">
							</div>	
							<h4 class="title"><a href="<?php echo base_url(); ?>blogs/detail/<?php echo $blog->blog_slug; ?>"><?php echo $blog->blog_title; ?></a></h4>
						</div>
						<p><?php echo $blog->blog_short_content; ?></p>	
						<p class="catlink"><a href="<?php echo base_url(); ?>blogs/detail/<?php echo $blog->blog_slug; ?>">view more <i class="fa fa-angle-right"></i></a></p>
					</div>
				</div>
			</div>
			<?php endforeach; } ?>
		</div>
	</div>
</div>
<div class="ctasec">
	<div class="container">
		<div class="row">			
				<div class="col-xxl-11 col-xl-11 col-lg-11 col-md-12 col-sm-12 me-auto ms-auto">
					<div class="ctablock">
						<div class="row align-items-center">
							<div class="col-xl-7 col-lg-7 col-md-12">
								<div class="row align-items-center">
									<div class="col-xl-5 col-lg-5 col-md-12">
										<div class="ctacntblk">
											<div class="title">
												<span>Transform</span>
												Your Home Today
											</div>
											<p class="subttl">With</p>
											<a href="<?php echo base_url(); ?>cooking" class="catlink">
												<p>cooking<span>appliances</span></p>
												<p class="icn"><i class="fa fa-angle-right" aria-hidden="true"></i></p>
											</a>
											<a href="<?php echo base_url(); ?>kitchen" class="catlink">
												<p>kitchen<span>appliances</span></p>
												<p class="icn"><i class="fa fa-angle-right" aria-hidden="true"></i></p>
											</a>
											<a href="<?php echo base_url(); ?>fabric" class="catlink">
												<p>fabric care<span>appliances</span></p>
												<p class="icn"><i class="fa fa-angle-right" aria-hidden="true"></i></p>
											</a>
										</div>
									</div>	
									<div class="col-xl-7 col-lg-7 col-md-12">
										<div class="ctafrmimg text-center">
										<img src="<?php echo base_url(); ?>res/images/ctaimg.png" alt="cta image">
										</div>
									</div>
								</div>		
							</div>
							<div class="col-xl-5 col-lg-5 col-md-12 ctafrmback">
								<div class="ctafrm">
									<h3 class="title"><span>get in touch</span></h3>
									<p>Got questions? We've got answers for all your home appliance needs!</p>
									<form method="post" id="inquiryfrm">
										<div class="formgroup">
											<input type="text" name="inq_name" placeholder="Name">
											<br/>
					  						<?php echo form_error('inq_name'); ?>
										</div>
										<div class="formgroup">
											<input type="email" name="inq_email" placeholder="Email">
											<br/>
					  						<?php echo form_error('inq_email'); ?>
										</div>
										<div class="formgroup">
											<input type="tel" name="inq_phone" placeholder="Phone  no.">
											<br/>
					  						<?php echo form_error('inq_phone'); ?>
										</div>
										<div class="formgroup">
											<input type="text" name="inq_city" placeholder="City">
											<br/>
					  						<?php echo form_error('inq_city'); ?>
										</div>
										<div class="formgroup">
											<select name="inq_category" class="form-control">
											  <option value="" disabled="" selected="">Select Category</option>
											    <option value="modular-kitchen">Modular Kitchen</option>
											    <option value="designer-hardware">Designer Hardware</option>
											    <option value="sanitaryware">Sanitaryware</option>
											    <option value="tiles">Tiles</option>
											    <option value="bath-fittings">Bath Fittings</option>
											    <option value="fans">Fans</option>
											    <option value="lightings">Lightings</option>
											    <option value="appliances">Appliances</option>
											 </select>
											 <?php echo form_error('inq_category'); ?>
										</div>
										<div class="formgroup">
											<textarea name="inq_message" placeholder="Message"></textarea>
										</div>
										<div class="formgroup">
						                  <div class="g-recaptcha" data-sitekey="6LcRyZ4pAAAAADOncJBDMrCaELeQFlOPx7ihWAo_"></div>
						                  <div id="captcha-error" style="color: red;"></div>
						                </div>
										<div class="formgroup">
											<input type="submit" class="sendbtn" name="sendinquiry" value="Send Us">
										</div>	
									</form>
									<div class="flash-message">
										 <?php 

											if($this->session->flashdata('frmmessage') != '')
											{ 

												echo $this->session->flashdata('frmmessage');

											}?>	
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
		</div>			
	</div>
</div>
<div class="faqsec">
	<div class="container">
			<div class="row">			
				<div class="col-xxl-8 col-xl-8 col-lg-8 col-md-10 col-sm-12 me-auto ms-auto">				<h2 class="sec-title text-center"><span>frequently asked questions</span></h2>
					<div class="accordionCvr">
						<div class="accordion accordion-flush" id="accordionFaq">
							
							  <?php if( count($faqLists) > 0 ) {
									$i = 0; 
									foreach($faqLists as $key => $faq): 
									 
									if($faq->cat_name == "Cooking Appliances")
									{	
										$faqclass = "cooking";
									}elseif ($faq->cat_name == "Kitchen Appliances") {
										$faqclass = "kitchen";
									}elseif ($faq->cat_name == "Fabric Care Appliances") {
										$faqclass = "fabric";
									}else{
										$faqclass = "cooking";
									}
							  ?>
							  <div class="accordion-item">
								<div class="accordion-header <?php echo $faqclass; ?>" id="flush-headingFour">
								  <button class="accordion-button <?php if($i == 0){}else{ echo "collapsed"; }?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $i; ?>" aria-expanded="false" aria-controls="faq<?php echo $i; ?>">
									<h3 class="faq-ques"><?php echo $faq->faq_ques; ?> </h3>
								  </button>
								</div>
								<div id="faq<?php echo $i; ?>" class="accordion-collapse collapse <?php if($i == 0){ echo "show"; }else{ }?>" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFaq">
								  <div class="accordion-body"><?php echo $faq->faq_ans; ?></div>
								</div>
							  </div>
							  <?php 
							    $i++;
								endforeach; } ?>				
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<?php $this->load->view('include/footer-front'); ?>
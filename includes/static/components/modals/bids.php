
<!-- Window-popup Create Bid -->

<div class="modal fade" id="create-new-bid" tabindex="-1" role="dialog" aria-labelledby="create-new-bid" aria-hidden="true">
	<div class="modal-dialog window-popup create-event" role="document">
		<form class="modal-content" id="new-bid" data-method='POST' data-action="<?=$devUrl?>/api/bid">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Create a new bid</h6>
			</div>

			<div class="modal-body">
				<p>Post a bid to connect with construction service providers.
				</p>
			</div>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">Bid Information</h6>
			</div>

			<div class="modal-body">
				<div class="form-group label-floating">
					<label class="control-label">Bid title</label>
					<input class="form-control" placeholder="" name="title" type="text" required="">
				</div>
				<div class="form-group label-floating">
					<label class="control-label">Location</label>
					<input class="form-control" placeholder="" name="location" type="text" required="">
				</div>
				<div class="comment-form">
					<div class="form-group">
						<textarea class="form-control" placeholder="Write detail about the bid (minimum 50 words)" name="details" required="" minlength="50"></textarea>
					</div>			
				</div>
				<br>
				<br>
				<div class="form-group label-floating is-select">
					<label class="control-label">Tags </label>
					<select class="selectpicker form-control" multiple data-live-search="true" data-max-options='3' name="tags" id="bidTag" required>
						<option value='Architect'>Architect</option>
						<option value='Civil Engineer'>Civil Engineer</option>
						<option value='Structural Engineer'>Structural Engineer</option>
						<option value='Electrical Engineer'>Electrical Engineer</option>
						<option value='Quantity Surveyor'>Quantity Surveyor</option>
						<option value='Land Surveyor'>Land Surveyor</option>
						<option value='Estate Valuer'>Estate Valuer</option>
						<option value='Construction Portfolio Manager'>Construction Portfolio Manager</option>
						<option value='Air Conditioning '>Air Conditioning </option>
						<option value='Satellite Installation'>Satellite Installation</option>
						<option value='Restoration'>Restoration</option>
						<option value='Appliance Installation/Repairs'>Appliance Installation/Repairs</option>
						<option value='Suspended Ceilings'>Suspended Ceilings</option>
						<option value='POP'>POP</option>
						<option value='Road Asphalt'>Road Asphalt</option>
						<option value='Scaffolds'>Scaffolds</option>
						<option value='Balustrade/Rails'>Balustrade/Rails</option>
						<option value='Sanitary Fittings'>Sanitary Fittings</option>
						<option value='Tiler'>Tiler</option>
						<option value='Bricklaying'>Bricklaying</option>
						<option value='Mason'>Mason</option>
						<option value='Builder'>Builder</option>
						<option value='Carpenter '>Carpenter </option>
						<option value='Furniture'>Furniture</option>
						<option value='Carports Installations'>Carports Installations</option>
						<option value='Concrete Works'>Concrete Works</option>
						<option value='Pavement Interlocking'>Pavement Interlocking</option>
						<option value='Cable TV Installation'>Cable TV Installation</option>
						<option value='Damp Proofing'>Damp Proofing</option>
						<option value='Drafting'>Drafting</option>
						<option value='Electrician'>Electrician</option>
						<option value='Iron Fencing'>Iron Fencing</option>
						<option value='Floor Coatings, '>Floor Coatings, </option>
						<option value='Wood Flooring'>Wood Flooring</option>
						<option value='Frames & Trusses, '>Frames & Trusses, </option>
						<option value='Roofing'>Roofing</option>
						<option value='Furniture Assembly'>Furniture Assembly</option>
						<option value='Gas Fitting'>Gas Fitting</option>
						<option value='General Labor'>General Labor</option>
						<option value='Glass/Mirror/Glazing'>Glass/Mirror/Glazing</option>
						<option value='Handyman'>Handyman</option>
						<option value='Home Automation'>Home Automation</option>
						<option value='HVAC Installation'>HVAC Installation</option>
						<option value='House Cleaning'>House Cleaning</option>
						<option value='Appliances Installation'>Appliances Installation</option>
						<option value='Interiors Decor'>Interiors Decor</option>
						<option value='Kitchen Wares'>Kitchen Wares</option>
						<option value='Sanitary Wares'>Sanitary Wares</option>
						<option value='Landscape Architect'>Landscape Architect</option>
						<option value='Horticulturist'>Horticulturist</option>
						<option value='Landscaping & Gardening'>Landscaping & Gardening</option>
						<option value='Lighting, Electrician'>Lighting, Electrician</option>
						<option value='Locksmith/Door Locks'>Locksmith/Door Locks</option>
						<option value='Machinery, Equipment'>Machinery, Equipment</option>
						<option value='Welder, Millwork'>Welder, Millwork</option>
						<option value='Pavement'>Pavement</option>
						<option value='Pest Control'>Pest Control</option>
						<option value='Plumber, Piping'>Plumber, Piping</option>
						<option value='Printer'>Printer</option>
						<option value='Roofing'>Roofing</option>
						<option value='Security Systems, Cameras'>Security Systems, Cameras</option>
						<option value='Tiling'>Tiling</option>
						<option value='Upholstery, Sewing'>Upholstery, Sewing</option>
						<option value='Water Treatment'>Water Treatment</option>
						
					</select>
				</div>				
			</div>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">Photos of bid</h6>
			</div>

			<div class="modal-body">
				<div class="create-bid-images">
					<!-- Single image item -->
					<div class="create-bid-image">

						<div class="upload-image-container ">
							<div class="file-upload">
								<label for="uploadBidImage" class="file-upload__label">
									<svg class="#olymp-camera-icon"><use xlink:href="#olymp-camera-icon"></use></svg>
									<br>
									<p class="statusMessage">No images Selected</p>
								</label>
								<input id="uploadBidImage" class="file-upload__input" type="file" name="pictures" accept="image/*" multiple="" required="">
							</div>
						</div>

					</div>
					<!-- --END  -->
				</div>
			
			</div>

			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btn-lg full-width" id="createBid" disabled="">Create Bid</button>
			</div>
		</form>
		</div>

	</div>
</div>	
<!-- END -- Window-popup Create Bid -->

<!-- Window-popup Update Bid -->

<div class="modal fade" id="update-bid" tabindex="-1" role="dialog" aria-labelledby="update-bid" aria-hidden="true">
	<div class="modal-dialog window-popup edit-widget edit-widget-profile" role="document">
		<form class="modal-content" id="edit-bid" data-method='PUT' >
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-header">
				<h6 class="title">Update bid information</h6>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="submit" data-target='custom-function' data-_fnc='updateBid' class="btn btn-primary btn-lg full-width" id="updateBid">Update bid</button>
			</div>
		</form>	
	</div>
</div>

<!-- END -- Window-popup Update Bid -->

<!-- Window-popup Bid Details -->

<div class="modal fade fullheight" id="detailed-bid" tabindex="-1" role="dialog" aria-labelledby="detailed-bid" aria-hidden="true">
	<div class="modal-dialog window-popup event-private-public private-event" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-body">
				<article class="hentry post has-post-thumbnail thumb-full-width private-event">

					<div class="private-event-head inline-items title-information">
						
					</div>

					<!-- Title Section end -->

					<div class="post-thumb">
						<div class="loader-activity">
						  <div class="indeterminate"></div>
						</div>						
						<div class="swiper-container" data-effect="fade" data-autoplay="4000">
							<div class="swiper-wrapper">

							</div>
							<!--Prev Next Arrows-->

							<svg class="btn-next-without olymp-popup-right-arrow"><use xlink:href="#olymp-popup-right-arrow"></use></svg>

							<svg class="btn-prev-without olymp-popup-left-arrow"><use xlink:href="#olymp-popup-left-arrow"></use></svg>

						</div>
					</div>

					<!-- Image section end  -->

					<div class="main-content">
						
					</div>

					<!-- Main content Ends -->


				</article>

				<div id="bidComment">

					<div class="mCustomScrollbar commentBody" data-mcs-theme="dark" >
						<ul class="comments-list">
							
						</ul>
					</div>

					<div class="comment_form_container">						

					</div>

				</div>

			</div>
		</div>
	</div>
</div>

<!-- ... end Window-popup Bid Details -->
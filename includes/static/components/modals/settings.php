
<!-- Window-popup Add work-->

<div class="modal fullheight fade" id="add-new-work" tabindex="-1" role="dialog" aria-labelledby="add-new-work" aria-hidden="true">
	<div class="modal-dialog window-popup create-event" role="document">
		<form class="modal-content" id="new-work-history" action="#" data-action="<?php echo $devUrl ?>/api/employment" data-method='POST'>
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Add Experience</h6>
			</div>

			<div class="modal-body">
				<p>Include a work history to your profile
				</p>
			</div>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">Work Information</h6>
			</div>

			<div class="modal-body">
				<div class="employment-history-container">
					<div class="employment-history">
						<div class="row">
							<div class="col col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Employer </label>
									<input class="form-control" placeholder="" type="text" name="name" required="">
								</div>
							</div>
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Location</label>
									<input class="form-control" placeholder="" type="text" name="location" required="">
								</div>
							</div>
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Role</label>
									<input class="form-control" placeholder="" type="text" name="role" required="" maxlength="100">																					
								</div>
							</div>
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group date-time-picker label-floating">
									<label class="control-label">Start Date</label>
									<input class="form-control" placeholder="" type="month" name="startYear" required="">
								</div>
							</div>
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12" id="end-date">
								<div class="form-group date-time-picker label-floating">
									<label class="control-label">End Date <small><i>(leave blank if still ongoing)</i></small></label>
									<input class="form-control" placeholder="" type="month" name="endYear">
								</div>
							</div>
						</div>										
					</div>
				</div>

			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btn-lg full-width" id="createWorkHistory" disabled="">Add Experience</button>
			</div>
		</form>
		</div>

	</div>
</div>	

<!-- END -- Window-popup Add work-->

<!-- Window-popup Add certificate-->

<div class="modal fullheight fade modal-md" id="add-new-certificate" tabindex="-1" role="dialog" aria-labelledby="add-new-certificate" aria-hidden="true">
	<div class="modal-dialog window-popup create-event" role="document">
		<form class="modal-content" id="new-certificate" action="#" data-action="<?php echo $devUrl ?>/api/education" data-method='POST'>
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Add Certificate</h6>
			</div>

			<div class="modal-body">
				<p>Include a certificate history to your profile
				</p>
			</div>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">Work Information</h6>
			</div>

			<div class="modal-body">
				<div class="employment-history-container">

					<div class="employment-history">
						<div class="row">
							<div class="col col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Institution</label>
									<input class="form-control" placeholder="" type="text" name="name" required="">
								</div>
							</div>
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Location of institution</label>
									<input class="form-control" placeholder="" type="text" name="location" required="">
								</div>
							</div>
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">certificate obtained</label>
									<input class="form-control" placeholder="" type="text" name="degree" required="">
								</div>
							</div>
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group date-time-picker label-floating">
									<label class="control-label">Start Date</label>
									<input class="form-control" placeholder="" type="month" name="startYear" required="">
								</div>
							</div>
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group date-time-picker label-floating">
									<label class="control-label">End Date<small><i>(leave blank if still ongoing)</i></small></label>
									<input class="form-control" placeholder="" type="month" name="endYear">
								</div>
							</div>
						</div>										
					</div>
				</div>

			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btn-lg full-width" id="createCertificate" disabled="">Add Certificate</button>
			</div>
		</form>
		</div>

	</div>
</div>	

<!-- END -- Window-popup Add certificate-->


<!-- Window-popup Identity verification -->

<?php if(!$identity_verified) : ?>

	<div class="modal fullheight fade modal-md" id="identity-verification" tabindex="-1" role="dialog" aria-labelledby="identity-verification" aria-hidden="true">
		<div class="modal-dialog window-popup create-event" role="document">
			
		<form class="modal-content" id="verify-identity-form" action="#" data-action="<?php echo $devUrl ?>/api/verifyuser" data-method='POST'>

			<img src="assets/img/id-verify.svg" alt="Verify user" style='width:100%'>
				<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
					<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
				</a>

				<div class="modal-header">
					<h6 class="title">Identity verification</h6>
				</div>

				<div class="modal-body">
					<p>Provide your details for verification, you will be charged a service fee of $5 for the process, read more of this process <a href="#" title='service charge for identity verification'>here.</a>
					</p>
				</div>

				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Review your name, which we'll use to check your authenticity</h6>
				</div>

				<div class="modal-body">
					<div class="employment-history-container">

						<div class="employment-history">
							<div class="row">
								<div class="col col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">First Name</label>
										<input class="form-control" placeholder="" type="text" name="firstName" required="" value='<?=$user_data["firstName"]?>'>
									</div>
								</div>
								<div class="col col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">First Name</label>
										<input class="form-control" placeholder="" type="text" name="lastName" required="" value='<?=$user_data["lastName"]?>'>
									</div>
								</div>
								<div class="col col-sm-12 col-12">
									<div class="form-group label-floating">
										<label class="control-label">BVN</label>
										<input class="form-control" placeholder="" type="tel" name="bvn" required="" minlength='11' maxlength='11'>
									</div>
								</div>					
							</div>										
						</div>
					</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-lg full-width" id="proceedVerification" disabled="">Proceed to verify</button>
				</div>
			</form>
		</div>
	</div>	
	
<?php endif; ?>
<!-- END -- Window-popup Identity verfication -->

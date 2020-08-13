<?php require 'includes/dynamic/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

	<?php include('includes/static/headcontent.php') ?>

<body class="page-has-left-panels darkmode">

	<style type="text/css">
		#work-cells form,#cert-cells form{
			display: none;
		}
	</style>

	<div id="responsive-container-panel" class="profile-settings-responsive">

		<a href="#" class="js-profile-settings-open profile-settings-open">
			<i class="fa fa-angle-right" aria-hidden="true"></i>
			<i class="fa fa-angle-left" aria-hidden="true"></i>
		</a>
		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<div class="ui-block">
							<!-- Your Profile  -->
							
							<div id="profile-panel" class="your-profile">
								<div id="accordion" role="tablist" aria-multiselectable="true">
									<div class="card">
										<div class="card-header" role="tab" id="headingOne">
											<h6 class="mb-0">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="no-ajaxy">
													Profile Settings
													<svg class="olymp-dropdown-arrow-icon"><use xlink:href="#olymp-dropdown-arrow-icon"></use></svg>
												</a>
											</h6>
										</div>
							
										<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
											<ul class="nav nav-tabs your-profile-menu" id="myTab" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal Information</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="false">Account Settings</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Change Password</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="employment-tab" data-toggle="tab" href="#employment" role="tab" aria-controls="employment" aria-selected="false">Work History</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false">Certifications</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="interests-tab" data-toggle="tab" href="#interests" role="tab" aria-controls="interests" aria-selected="false">Manage Interests</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							
							<!-- ... end Your Profile  -->
			</div>
		</div>
	</div>

	<!-- ... end Profile Settings Responsive -->

	<?php include ('includes/static/sidebar-left.php'); ?>

	<?php include('includes/static/header-top.php') ?>

	<!-- ... end Responsive Header-BP -->
	<div class="header-spacer header-spacer-small"></div>

	<!-- Main Header Account -->

	<div class="main-header web-only">
		<div class="content-bg-wrap bg-badges"></div>
		<div class="container">
			<div class="row">
				<div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
					<!-- <div class="main-header-content">
						<h1>Your Account Dashboard</h1>
						<p>Welcome to your account dashboard! Here you’ll find everything you need to change your profile
						information, settings, read notifications and requests, view your latest messages, change your pasword and much
						more! Also you can create portfolio!</p>
					</div> -->

				</div>
			</div>
		</div>
		<img class="img-bottom" src="assets/img/account-bottom.png" alt="friends">
	</div>

	<div class="mobile-only" style="margin-top: 20px"></div>
	<!-- ... end Main Header Account -->


	<!-- Your Account Personal Information -->

	<div class="container">
		<div class="row">
			<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
						<div class="ui-block">
							<div class="ui-block-title">
								<h6 class="title">Personal Information</h6>
							</div>
							<div class="ui-block-content">
								
								<!-- Personal Information Form  -->
								
								<form action="#" data-action=" <?php echo $devUrl ?>/api/user/<?php echo $user_data['_id'] ?>" data-method='PUT' id='updateUser'>
									<div class="row">
								
										<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
											<div class="form-group label-floating">
												<label class="control-label">First Name</label>
												<input class="form-control" placeholder="" type="text" name="firstName" data-defvalue="<?php echo $user_data['firstName'] ?>" value="<?php echo $user_data['firstName'] ?>" required=''>
											</div>
								
											<div class="form-group label-floating">
												<label class="control-label">Email address</label>
												<input class="form-control" placeholder="" type="email" name="email" data-defvalue="<?php echo $user_data['email'] ?>" value="<?php echo $user_data['email'] ?>" required='' id='emailAddress'>
											</div>
								
											<?php if (empty($user_data['dob'])): ?>
												<div class="form-group date-time-picker label-floating">
													<label class="control-label">date of birth <small><i>(once set, cannot be updated)</i></small></label>
													<input type="date" data-defvalue="<?php echo $user_data['dob'] ?>" value="<?php echo $user_data['dob'] ?>" name="dob" />
													<span class="input-group-addon">
														<svg class="olymp-month-calendar-icon icon"><use xlink:href="#olymp-month-calendar-icon"></use></svg>
													</span>
												</div>											
											<?php endif ?>

											<?php if (!empty($user_data['dob'])): ?>
												<div class="form-group date-time-picker label-floating">
													<label class="control-label">date of birth <small><i>(cannot be updated)</i></small></label>
													<input type="date" data-defvalue="<?php echo $user_data['dob'] ?>" value="<?php echo $user_data['dob'] ?>" name="dob" disabled />
													<span class="input-group-addon">
														<svg class="olymp-month-calendar-icon icon"><use xlink:href="#olymp-month-calendar-icon"></use></svg>
													</span>
												</div>											
											<?php endif ?>
										</div>
								
										<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
											<div class="form-group label-floating">
												<label class="control-label">Last Name</label>
												<input class="form-control" placeholder="" type="text" name="lastName" data-defvalue="<?php echo $user_data['lastName'] ?>" value="<?php echo $user_data['lastName'] ?>" required=''>
											</div>
								
											<div class="form-group label-floating">
												<label class="control-label">Profession/Expertise</label>
												<select class="selectpicker form-control" data-live-search="true"  name="occupation" id="occupation" required>
													<option value="" disabled="" selected="" > Profession/expertise</option>
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
								
								
											<div class="form-group label-floating ">
												<label class="control-label">Your Phone Number</label>
												<input class="form-control" placeholder="" type="text" name="phoneNumber" data-defvalue="<?php echo $user_data['phoneNumber'] ?>" value="<?php echo $user_data['phoneNumber'] ?>" required='' id='phoneNumber'>
											</div>
										</div>
								
										<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="form-group label-floating is-select">
												<label class="control-label">Your Country</label>
												<input class="form-control" type="text" name="country" data-defvalue="<?php echo $user_data['country'] ?>" value="<?php echo $user_data['country'] ?>">
											</div>
										</div>
										<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="form-group label-floating is-select">
												<label class="control-label">Your State / Province</label>
												<input type="text" name="state" data-defvalue="<?php echo $user_data['state'] ?>" value="<?php echo $user_data['state'] ?>">
											</div>
										</div>
										<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
											<div class="form-group label-floating is-select">
												<label class="control-label">Your City</label>
												<input type="text" name="city" data-defvalue="<?php echo $user_data['city'] ?>" value="<?php echo $user_data['city'] ?>">
											</div>
										</div>
										<div class="col col-12">
											<div class="form-group">
												<textarea class="form-control" placeholder="Write a little description about you" name="bio" style="min-height: 60px !important;height: 60px"><?php echo $user_data['bio'] ?></textarea>
											</div>
								
										</div>
										<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
											<button type="button" class="btn btn-secondary btn-lg full-width reset-attributes">Restore all Attributes</button>
										</div>
										<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
											<button type="submit" class="btn btn-primary btn-lg full-width">Save all Changes</button>
										</div>
								
									</div>
								</form>
								
								<!-- ... end Personal Information Form  -->						
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
						<div class="ui-block">
							<div class="ui-block-title">
								<h6 class="title">Account Settings</h6>
							</div>
							<div class="ui-block-content">
								
								<!-- Personal Account Settings Form -->
								
								<form>
									<div class="row">
								
										<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="description-toggle">
												<div class="description-toggle-content">
													<div class="h6">Notifications Sound</div>
													<p>A sound will be played each time you receive a new activity notification</p>
												</div>
								
												<div class="togglebutton">
													<label>
														<input type="checkbox" checked="">
													</label>
												</div>
											</div>
											<div class="description-toggle">
												<div class="description-toggle-content">
													<div class="h6">Notifications Email</div>
													<p>We’ll send you an email to your account each time you receive a new activity notification</p>
												</div>
								
												<div class="togglebutton">
													<label>
														<input type="checkbox" checked="">
													</label>
												</div>
											</div>
											<div class="description-toggle">
												<div class="description-toggle-content">
													<div class="h6">Interests' notification</div>
													<p>Choose whether to receive notifications about new posts that tags your interests'</p>
												</div>
								
												<div class="togglebutton">
													<label>
														<input type="checkbox" checked="">
													</label>
												</div>
											</div>
											<div class="description-toggle">
												<div class="description-toggle-content">
													<div class="h6">Chat Message Sound</div>
													<p>A sound will be played each time you receive a new message on an inactive chat window</p>
												</div>
								
												<div class="togglebutton">
													<label>
														<input type="checkbox" checked="">
													</label>
												</div>
											</div>
										</div>
								
										<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
											<button class="btn btn-secondary btn-lg full-width">Restore all Attributes</button>
										</div>
										<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
											<button class="btn btn-primary btn-lg full-width">Save all Changes</button>
										</div>
									</div>
								</form>
								
								<!-- ... end Personal Account Settings Form  -->
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<div class="ui-block">
							<div class="ui-block-title">
								<h6 class="title">Change Password</h6>
							</div>
							<div class="ui-block-content">

								
								<!-- Change Password Form -->
								
								<form id="resetPassword" data-method="PUT" data-action='<?php echo($devUrl) ?>/api/updatepassword' autocomplete='off'>
									<div class="row">
								
										<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="form-group label-floating">
												<label class="control-label">Confirm Current Password</label>
												<input class="form-control" placeholder="" type="password" value="" name="password" required="" autocomplete="off">
											</div>
										</div>
								
										<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Your New Password</label>
												<input class="form-control" placeholder="" type="password" name="newPassword" required="">
											</div>
										</div>
										<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Confirm New Password</label>
												<input class="form-control" placeholder="" type="password" name="newPassword2" required="">
											</div>
										</div>
								
								
										<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 20px">
											<button type="submit" class="btn btn-primary btn-lg full-width">Change Password Now!</button>
										</div>
								
									</div>
								</form>
								
								<!-- ... end Change Password Form -->
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="employment" role="tabpanel" aria-labelledby="employment-tab">
						<div class="">
							<p class=" c-white text-center">
								Please describe your work-related experiences. If you haven’t had any job experience, just leave this section empty.
							</p>
						</div>

						<div id="work-cells">
							
						</div>					

						<div style="display: block;text-align: center;padding: 10px ">
							<a href="#" data-target='custom-function' data-_fnc='addEmployment' data-_param=''> Add work experience <span class="fa fa-plus"></span></a>
						</div>

					</div>

					<div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
						<div class="">
							<p class=" c-white text-center">
								Please add all your certifications. If you haven’t had any, just leave this section empty.
							</p>
						</div>

						<div id="cert-cells">
							
						</div>					

						<div style="display: block;text-align: center;padding: 10px ">
							<a href="#" data-target='custom-function' data-_fnc='addCertificate' data-_param=''>Add Certificate <span class="fa fa-plus"></span></a>
						</div>
					</div>
					<div class="tab-pane fade" id="interests" role="tabpanel" aria-labelledby="interests-tab">
						<div class="ui-block">
							<div class="ui-block-title">
								<h6 class="title">Manage your interests</h6>
								<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
							</div>

						    <div class="container">
						    	
							    <form class="row estimate-form" style="margin-top: 30px" action="controllers/estimate.php" method="post" id="userInterest">
						          <div class="col-lg-12 mb-5 text-center" data-aos="fade-up" data-aos-delay="">
						          	<p style="margin-bottom: 70px">Your interests are what filters whet we offer you on konstructapp, <br>you can always update what interests you here</p>
						            <div class="row interest-view" id="view_1">
						              <div class="col-6 col-md-3 ">
						                <div class="estimate-box">
						                  <input type="checkbox" name="interest[]" class="i_need" value="buiding">
						                  <div class="icon">
						                    <div class="id">
						                      <span> <svg><use xlink:href="#olymp-cupcake-icon"></use></svg></span>
						                      <p>Building</p>                      
						                    </div>
						                  </div>
						                </div>
						              </div>
						              <div class="col-6 col-md-3">
						                <div class="estimate-box">
						                  <input type="checkbox" name="interest[]" class="i_need" value="infrastructure">
						                  <div class="icon">
						                    <div class="id">
						                      <span class=""><svg><use xlink:href="#olymp-headphones-icon"></use></svg></span>
						                      <p>Infrastructure</p>                      
						                    </div>
						                  </div>
						                </div>
						              </div>
						              <div class=" col-6 col-md-3">
						                <div class="estimate-box">
						                  <input type="checkbox" name="interest[]" class="i_need" value="industrial">
						                  <div class="icon">
						                    <div class="id">
						                      <span class=""><svg><use xlink:href="#olymp-heart-icon"></use></svg></span>
						                      <p>Industrial</p>                      
						                    </div>
						                  </div>
						                </div>
						              </div><!-- 
						              <div class=" col-6 col-md-3">
						                <div class="estimate-box">
						                  <input type="checkbox" name="interest[]" class="i_need" value="marketplace">
						                  <div class="icon">
						                    <div class="id">
						                      <span class=""><svg><use xlink:href="#olymp-heart-icon"></use></svg></span>
						                      <p>Market Place</p>                      
						                    </div>
						                  </div>
						                </div>
						              </div> -->
						              <div class="clear"></div>
						            </div>   
						            <div class="row">
						              <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
											<button type="button" class="btn btn-secondary btn-md full-width">Reset changes</button>
										</div>
										<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
											<button type="submit" class="btn btn-primary btn-md full-width">Save changes</button>
										</div>					            	
						            </div>       
						          </div>

						        </form>	
						    </div>					
						</div>
					</div>
				</div>

			</div>

			<div id="desktop-container-panel" class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display-none">
				<div class="crumina-sticky-sidebar">
					<div class="sidebar__inner">			
						<div class="ui-block">

							<!-- Your Profile  -->
							
							<div id="profile-panel" class="your-profile">
								<div class="ui-block-title ui-block-title-small">
									<h6 class="title">Your PROFILE</h6>
								</div>
							
								<div id="accordion" role="tablist" aria-multiselectable="true">
									<div class="card">
										<div class="card-header" role="tab" id="headingOne">
											<h6 class="mb-0">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="no-ajaxy">
													Profile Settings
													<svg class="olymp-dropdown-arrow-icon"><use xlink:href="#olymp-dropdown-arrow-icon"></use></svg>
												</a>
											</h6>
										</div>
							
										<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
											<ul class="nav nav-tabs your-profile-menu" id="myTab" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal Information</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="false">Account Settings</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Change Password</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="employment-tab" data-toggle="tab" href="#employment" role="tab" aria-controls="employment" aria-selected="false">Work History</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false">Certifications</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="interests-tab" data-toggle="tab" href="#interests" role="tab" aria-controls="interests" aria-selected="false">Manage Interests</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							
							<!-- ... end Your Profile  -->
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ... end Your Account Personal Information -->

	<?php include('includes/static/components/modals/settings.php') ?>

	<?php include('includes/static/scripts.php') ?>

	<!-- ## -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha256-+BEKmIvQ6IsL8sHcvidtDrNOdZO3C9LtFPtF2H0dOHI=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>

	<?php include('models/settings.php') ?>
	<?php include('includes/app/settings.php') ?>


	</body>
</html>

$(function(){
	let token 	= Cookies.get('token');
	let userId	= Cookies.get('_id');
	let reqUrl 	= 'https://konstructapps.herokuapp.com';
	let root 	= document.getElementById('root');
	let content = '';

	$.getJSON(`${reqUrl}/api/user/${userId}`)

	.done(function(response){
		content += `<div class="main-header">
			<div class="content-bg-wrap bg-account"></div>
			<div class="container">
				<div class="row">
					<div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
						<div class="main-header-content">
							<h1>Your Account Dashboard</h1>
							<p>Welcome to your account dashboard! Here you’ll find everything you need to change your profile
							information, settings, read notifications and requests, view your latest messages, change your pasword and much
			more! Also you can create portfolio!</p>
						</div>
					</div>
				</div>
			</div>
			<img class="img-bottom" src="assets/img/account-bottom.png" alt="friends">
		</div>`
		content += `<div class="container">
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
									
									<form>
										<div class="row">
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating">
													<label class="control-label">First Name</label>
													<input class="form-control" placeholder="" type="text" name="firstName" data-defvalue="<?php echo $user_data['firstName'] ?>" value="<?php echo $user_data['firstName'] ?>">
												</div>
									
												<div class="form-group label-floating">
													<label class="control-label">Your Email</label>
													<input class="form-control" placeholder="" type="email" name="email" data-defvalue="<?php echo $user_data['email'] ?>" value="<?php echo $user_data['email'] ?>">
												</div>
									
												<div class="form-group date-time-picker label-floating">
													<label class="control-label">Your Birthday</label>
													<input name="datetimepicker" data-defvalue="<?php echo $user_data['dob'] ?>" value="<?php echo $user_data['dob'] ?>" name="dob" />
													<span class="input-group-addon">
														<svg class="olymp-month-calendar-icon icon"><use xlink:href="#olymp-month-calendar-icon"></use></svg>
													</span>
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating">
													<label class="control-label">Last Name</label>
													<input class="form-control" placeholder="" type="text" name="lastName" data-defvalue="<?php echo $user_data['lastName'] ?>" value="<?php echo $user_data['lastName'] ?>">
												</div>
									
												<div class="form-group label-floating">
													<label class="control-label">Your Website</label>
													<input class="form-control" placeholder="" type="email" name="website" data-defvalue="<?php echo $user_data['website'] ?>" value="<?php echo $user_data['website'] ?>">
												</div>
									
									
												<div class="form-group label-floating is-empty">
													<label class="control-label">Your Phone Number</label>
													<input class="form-control" placeholder="" type="text" name="phoneNumber" data-defvalue="<?php echo $user_data['phoneNumber'] ?>" value="<?php echo $user_data['phoneNumber'] ?>">
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
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<textarea class="form-control" placeholder="Write a little description about you" name="bio">
														<?php echo $user_data['bio'] ?>
													</textarea>
												</div>
									
											</div>
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating is-empty">
													<label class="control-label">Your Birthplace</label>
													<input class="form-control" name="birthPlace" type="text" data-defvalue="<?php echo $user_data['birthPlace'] ?>" value="<?php echo $user_data['birthPlace'] ?>">
												</div>
									
												<div class="form-group label-floating">
													<label class="control-label">Your Occupation</label>
													<input class="form-control" type="text" name="occupation" data-defvalue="<?php echo $user_data['occupation'] ?>" value="<?php echo $user_data['occupation'] ?>">
												</div>
											</div>
											<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group with-icon label-floating">
													<label class="control-label">Your Facebook Account</label>
													<input class="form-control" type="text" name="facebook" data-defvalue="<?php echo $user_data['facebook'] ?>" value="<?php echo $user_data['facebook'] ?>">
													<i class="fab fa-facebook-f c-facebook" aria-hidden="true"></i>
												</div>
												<div class="form-group with-icon label-floating">
													<label class="control-label">Your Twitter Account</label>
													<input class="form-control" type="text" name="twitter" data-defvalue="<?php echo $user_data['twitter'] ?>" value="<?php echo $user_data['twitter'] ?>">
													<i class="fab fa-twitter c-twitter" aria-hidden="true"></i>
												</div>
												<div class="form-group with-icon label-floating is-empty">
													<label class="control-label">Your RSS Feed Account</label>
													<input class="form-control" type="text" name="rss" data-defvalue="<?php echo $user_data['rss'] ?>" value="<?php echo $user_data['rss'] ?>">
													<i class="fa fa-rss c-rss" aria-hidden="true"></i>
												</div>
												<div class="form-group with-icon label-floating is-empty">
													<label class="control-label">Your LinkedIn Account</label>
													<input class="form-control" type="text" name="linkedin" data-defvalue="<?php echo $user_data['linkedin'] ?>" value="<?php echo $user_data['linkedin'] ?>">
													<i class="fab fa-linkedin c-spotify" aria-hidden="true"></i>
												</div>
											</div>
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<button type="button" class="btn btn-secondary btn-lg full-width">Restore all Attributes</button>
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
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating is-select">
													<label class="control-label">Who Can Friend You?</label>
													<select class="selectpicker form-control">
														<option value="EO">Everyone</option>
														<option value="NO">No One</option>
													</select>
												</div>
											</div>
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating is-select">
													<label class="control-label">Who Can View Your Posts</label>
													<select class="selectpicker form-control">
														<option value="US">Friends Only</option>
														<option value="EO">Everyone</option>
													</select>
												</div>
											</div>
									
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
														<div class="h6">Friend’s Birthdays</div>
														<p>Choose wheather or not receive notifications about your friend’s birthdays on your newsfeed</p>
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
									
									<form id="resetPassword" data-method="UPDATE" data-action='<?php echo($devurl) ?>/api/users' autocomplete='off'>
										<div class="row">
									
											<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group label-floating">
													<label class="control-label">Confirm Current Password</label>
													<input class="form-control" placeholder="" type="password" value="" name="currentPassword">
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating is-empty">
													<label class="control-label">Your New Password</label>
													<input class="form-control" placeholder="" type="password" name="newPassword">
												</div>
											</div>
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating is-empty">
													<label class="control-label">Confirm New Password</label>
													<input class="form-control" placeholder="" type="password" name="new_password2">
												</div>
											</div>
									
											<div class="col col-lg-12 col-sm-12 col-sm-12 col-12">
												<div class="remember">
									
													<a href="#" class="forgot" data-toggle="modal" data-target="#restore-password">Forgot my Password</a>
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

							<div class="ui-block">
								<div class="ui-block-title">
									<h6 class="title">Your Employement History</h6>
								</div>
								<div class="ui-block-content">

									
									<!-- Employement History Form -->
									
									<form>
										<div class="row">
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating">
													<label class="control-label">Title or Place</label>
													<input class="form-control" placeholder="" type="text" value="Digital Design Intern">
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating">
													<label class="control-label">Period of Time</label>
													<input class="form-control" placeholder="" type="text" value="2006 - 2008">
												</div>
											</div>
									
											<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group">
													<textarea class="form-control" placeholder="Description">Digital Design Intern for the “Multimedz” agency. Was in charge of the communication with the clients.</textarea>
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating">
													<label class="control-label">Title or Place</label>
													<input class="form-control" placeholder="" type="text" value="UI/UX Designer">
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating">
													<label class="control-label">Period of Time</label>
													<input class="form-control" placeholder="" type="text" value="2008 - 2013">
												</div>
											</div>
									
											<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group">
													<textarea class="form-control" placeholder="Description">UI/UX Designer for the “Daydreams” agency.</textarea>
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating is-empty">
													<label class="control-label">Title or Place</label>
													<input class="form-control" placeholder="" type="text">
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating is-empty">
													<label class="control-label">Period of Time</label>
													<input class="form-control" placeholder="" type="text">
												</div>
											</div>
									
											<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group">
													<textarea class="form-control" placeholder="Description"></textarea>
												</div>
									
												<a href="#" class="add-field">
													<svg class="olymp-plus-icon"><use xlink:href="#olymp-plus-icon"></use></svg>
													<span>Add Education Field</span>
												</a>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<button class="btn btn-secondary btn-lg full-width">Cancel</button>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<button class="btn btn-primary btn-lg full-width">Save all Changes</button>
											</div>
										</div>
									</form>
									
									<!-- ... end Employement History Form -->
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
							<div class="ui-block">
								<div class="ui-block-title">
									<h6 class="title">Your Education History</h6>
								</div>
								<div class="ui-block-content">

									
									<!-- Education History Form -->
									
									<form>
										<div class="row">
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating">
													<label class="control-label">Title or Place</label>
													<input class="form-control" placeholder="" type="text" value="The New College of Design">
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating">
													<label class="control-label">Period of Time</label>
													<input class="form-control" placeholder="" type="text" value="2001 - 2006">
												</div>
											</div>
									
											<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group">
													<textarea class="form-control" placeholder="Description">Bachelor of Interactive Design in the New College. It was a five years intensive career. Average: A+</textarea>
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating">
													<label class="control-label">Title or Place</label>
													<input class="form-control" placeholder="" type="text" value="Rembrandt Institute">
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating">
													<label class="control-label">Period of Time</label>
													<input class="form-control" placeholder="" type="text" value="2008">
												</div>
											</div>
									
											<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group">
													<textarea class="form-control" placeholder="Description">Five months Digital Illustration course. Professor: Leonardo Stagg.</textarea>
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating is-empty">
													<label class="control-label">Title or Place</label>
													<input class="form-control" placeholder="" type="text">
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating is-empty">
													<label class="control-label">Period of Time</label>
													<input class="form-control" placeholder="" type="text">
												</div>
											</div>
									
											<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group">
													<textarea class="form-control" placeholder="Description"></textarea>
												</div>
									
												<a href="#" class="add-field">
													<svg class="olymp-plus-icon"><use xlink:href="#olymp-plus-icon"></use></svg>
													<span>Add Education Field</span>
												</a>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<button class="btn btn-secondary btn-lg full-width">Cancel</button>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<button class="btn btn-primary btn-lg full-width">Save all Changes</button>
											</div>
										</div>
									</form>
									
									<!-- ... end Education History Form -->
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
							<div class="ui-block">
								<div class="ui-block-title">
									<h6 class="title">Notifications</h6>
									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
								</div>

								
								<!-- Notification List -->
								
								<ul class="notification-list">
									<li>
										<div class="author-thumb">
											<img src="assets/img/avatar1-sm.jpg" alt="author">
										</div>
										<div class="notification-event">
											<a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.
											<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
										</div>
										<span class="notification-icon">
																<svg class="olymp-comments-post-icon"><use xlink:href="#olymp-comments-post-icon"></use></svg>
															</span>
								
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
											<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
										</div>
									</li>
								
									<li class="un-read">
										<div class="author-thumb">
											<img src="assets/img/avatar2-sm.jpg" alt="author">
										</div>
										<div class="notification-event">
											You and <a href="#" class="h6 notification-friend">Nicholas Grissom</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.
											<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 hours ago</time></span>
										</div>
										<span class="notification-icon">
																<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
															</span>
								
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
											<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
										</div>
									</li>
								
									<li class="with-comment-photo">
										<div class="author-thumb">
											<img src="assets/img/avatar3-sm.jpg" alt="author">
										</div>
										<div class="notification-event">
											<a href="#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="#" class="notification-link">photo</a>.
											<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
										</div>
										<span class="notification-icon">
																<svg class="olymp-comments-post-icon"><use xlink:href="#olymp-comments-post-icon"></use></svg>
															</span>
								
										<div class="comment-photo">
											<img src="assets/img/comment-photo.jpg" alt="photo">
											<span>“She looks incredible in that outfit! We should see each...”</span>
										</div>
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
											<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
										</div>
									</li>
								
									<li>
										<div class="author-thumb">
											<img src="assets/img/avatar4-sm.jpg" alt="author">
										</div>
										<div class="notification-event">
											<a href="#" class="h6 notification-friend">Chris Greyson</a> liked your <a href="#" class="notification-link">profile status</a>.
											<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 18th at 8:22pm</time></span>
										</div>
										<span class="notification-icon">
															<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
														</span>
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
											<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
										</div>
									</li>
								
									<li>
										<div class="author-thumb">
											<img src="assets/img/avatar5-sm.jpg" alt="author">
										</div>
										<div class="notification-event">
											<a href="#" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="#" class="notification-link">Gotham Bar</a>.
											<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
										</div>
										<span class="notification-icon">
																<svg class="olymp-calendar-icon"><use xlink:href="#olymp-calendar-icon"></use></svg>
															</span>
								
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
											<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
										</div>
									</li>
								
									<li>
										<div class="author-thumb">
											<img src="assets/img/avatar6-sm.jpg" alt="author">
										</div>
										<div class="notification-event">
											<a href="#" class="h6 notification-friend">James Summers</a> commented on your new <a href="#" class="notification-link">profile status</a>.
											<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
										</div>
										<span class="notification-icon">
																<svg class="olymp-comments-post-icon"><use xlink:href="#olymp-comments-post-icon"></use></svg>
															</span>
								
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
											<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
										</div>
									</li>
								
									<li>
										<div class="author-thumb">
											<img src="assets/img/avatar7-sm.jpg" alt="author">
										</div>
										<div class="notification-event">
											<a href="#" class="h6 notification-friend">Marina Valentine</a> commented on your new <a href="#" class="notification-link">profile status</a>.
											<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 10:07am</time></span>
										</div>
										<span class="notification-icon">
																<svg class="olymp-comments-post-icon"><use xlink:href="#olymp-comments-post-icon"></use></svg>
															</span>
								
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
											<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
										</div>
									</li>
								</ul>
								
								<!-- ... end Notification List -->

							</div>

							
							<!-- Pagination -->
							
							<nav aria-label="Page navigation">
								<ul class="pagination justify-content-center">
									<li class="page-item disabled">
										<a class="page-link" href="#" tabindex="-1">Previous</a>
									</li>
									<li class="page-item"><a class="page-link" href="#">1<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div></div></a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">...</a></li>
									<li class="page-item"><a class="page-link" href="#">12</a></li>
									<li class="page-item">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul>
							</nav>
							
							<!-- ... end Pagination -->
						</div>
						<div class="tab-pane fade" id="chat-message" role="tabpanel" aria-labelledby="chat-message-tab">
							<div class="ui-block">
								<div class="ui-block-title">
									<h6 class="title">Chat / Messages</h6>
									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
								</div>

								<div class="row">
									<div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 padding-r-0">

										
										<!-- Notification List Chat Messages -->
										
										<ul class="notification-list chat-message">
											<li>
												<div class="author-thumb">
													<img src="assets/img/avatar8-sm.jpg" alt="author">
												</div>
												<div class="notification-event">
													<a href="#" class="h6 notification-friend">Diana Jameson</a>
													<span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
													<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
												</div>
												<span class="notification-icon">
																				<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
																			</span>
										
												<div class="more">
													<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
												</div>
											</li>
										
											<li>
												<div class="author-thumb">
													<img src="assets/img/avatar9-sm.jpg" alt="author">
												</div>
												<div class="notification-event">
													<a href="#" class="h6 notification-friend">Jake Parker</a>
													<span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
													<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
												</div>
												<span class="notification-icon">
																				<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
																			</span>
										
												<div class="more">
													<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
												</div>
											</li>
											<li>
												<div class="author-thumb">
													<img src="assets/img/avatar10-sm.jpg" alt="author">
												</div>
												<div class="notification-event">
													<a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
													<span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with...</span>
													<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
												</div>
												<span class="notification-icon">
																			<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
																		</span>
												<div class="more">
													<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
												</div>
											</li>
										
											<li class="chat-group">
												<div class="author-thumb">
													<img src="assets/img/avatar11-sm.jpg" alt="author">
													<img src="assets/img/avatar12-sm.jpg" alt="author">
													<img src="assets/img/avatar13-sm.jpg" alt="author">
													<img src="assets/img/avatar10-sm.jpg" alt="author">
												</div>
												<div class="notification-event">
													<a href="#" class="h6 notification-friend">You, Faye, Ed & Jet +3</a>
													<span class="last-message-author">Ed:</span>
													<span class="chat-message-item">Yeah! Seems fine by me!</span>
													<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
												</div>
												<span class="notification-icon">
																			<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
																		</span>
												<div class="more">
													<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
												</div>
											</li>
										</ul>
										
										<!-- ... end Notification List Chat Messages -->

										
										<!-- Popup Chat -->
										
										<div class="ui-block popup-chat">
											<div class="ui-block-title">
												<span class="icon-status online"></span>
												<h6 class="title">Mathilda Brinker</h6>
												<div class="more">
													<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
													<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
												</div>
											</div>
											<div class="mCustomScrollbar" data-mcs-theme="dark">
												<ul class="notification-list chat-message chat-message-field">
													<li>
														<div class="author-thumb">
															<img src="assets/img/avatar14-sm.jpg" alt="author">
														</div>
														<div class="notification-event">
															<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
															<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
														</div>
													</li>
										
													<li>
														<div class="author-thumb">
															<img src="assets/img/author-page.jpg" alt="author">
														</div>
														<div class="notification-event">
															<span class="chat-message-item">Don’t worry Mathilda!</span>
															<span class="chat-message-item">I already bought everything</span>
															<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
														</div>
													</li>
										
													<li>
														<div class="author-thumb">
															<img src="assets/img/avatar14-sm.jpg" alt="author">
														</div>
														<div class="notification-event">
															<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
															<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
														</div>
													</li>
												</ul>
											</div>
										
											<form>
										
												<div class="form-group label-floating is-empty">
													<textarea class="form-control" placeholder="Press enter to post..."></textarea>
													<div class="add-options-message">
														<a href="#" class="options-message">
															<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
														</a>
														<div class="options-message smile-block">
										
															<svg class="olymp-happy-sticker-icon"><use xlink:href="#olymp-happy-sticker-icon"></use></svg>
										
															<ul class="more-dropdown more-with-triangle triangle-bottom-right">
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat1.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat2.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat3.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat4.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat5.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat6.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat7.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat8.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat9.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat10.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat11.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat12.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat13.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat14.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat15.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat16.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat17.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat18.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat19.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat20.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat21.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat22.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat23.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat24.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat25.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat26.png" alt="icon">
																	</a>
																</li>
																<li>
																	<a href="#">
																		<img src="assets/img/icon-chat27.png" alt="icon">
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
										
											</form>
										
										
										</div>
										
										<!-- ... end Popup Chat -->
										

									</div>

									<div class="col col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12 padding-l-0">

										
										<!-- Chat Field -->
										
										<div class="chat-field">
											<div class="ui-block-title">
												<h6 class="title">Elaine Dreyfuss</h6>
												<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
											</div>
											<div class="mCustomScrollbar" data-mcs-theme="dark">
												<ul class="notification-list chat-message chat-message-field">
													<li>
														<div class="author-thumb">
															<img src="assets/img/avatar10-sm.jpg" alt="author">
														</div>
														<div class="notification-event">
															<div class="event-info-wrap">
																<a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
																<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
															</div>
															<span class="chat-message-item">Hi James, How are your doing? Please remember that next week we are going to Gotham Bar to celebrate Marina’s Birthday.</span>
														</div>
													</li>
										
													<li>
														<div class="author-thumb">
															<img src="assets/img/author-page.jpg" alt="author">
														</div>
														<div class="notification-event">
															<div class="event-info-wrap">
																<a href="#" class="h6 notification-friend">James Spiegel</a>
																<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:30pm</time></span>
															</div>
															<span class="chat-message-item">Hi Elaine! I have a question, do you think that tomorrow we could talk to
																					the client to iron out some details before the presentation? I already finished the first screen but
																					I need to ask him something before moving on. Anyway, here’s a preview!
																				</span>
															<div class="added-photos">
																<img src="assets/img/photo-message1.jpg" alt="photo">
																<img src="assets/img/photo-message2.jpg" alt="photo">
																<span class="photos-name">icons.jpeg; bunny.jpeg</span>
															</div>
														</div>
													</li>
										
													<li>
														<div class="author-thumb">
															<img src="assets/img/avatar10-sm.jpg" alt="author">
														</div>
														<div class="notification-event">
															<div class="event-info-wrap">
																<a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
																<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
															</div>
															<span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with it. I think That looks really good!</span>
														</div>
													</li>
												</ul>
											</div>
										
											<form>
										
												<div class="form-group">
													<textarea class="form-control" placeholder="Write your reply here..."></textarea>
												</div>
										
												<div class="add-options-message">
													<a href="#" class="options-message">
														<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
													</a>
													<a href="#" class="options-message">
														<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
													</a>
													<div class="options-message smile-block">
														<svg class="olymp-happy-sticker-icon"><use xlink:href="#olymp-happy-sticker-icon"></use></svg>
										
														<ul class="more-dropdown more-with-triangle triangle-bottom-right">
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat1.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat2.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat3.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat4.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat5.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat6.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat7.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat8.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat9.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat10.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat11.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat12.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat13.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat14.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat15.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat16.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat17.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat18.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat19.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat20.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat21.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat22.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat23.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat24.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat25.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat26.png" alt="icon">
																</a>
															</li>
															<li>
																<a href="#">
																	<img src="assets/img/icon-chat27.png" alt="icon">
																</a>
															</li>
														</ul>
													</div>
										
													<button class="btn btn-primary btn-sm">Post Reply</button>
												</div>
										
											</form>
										
										</div>
										
										<!-- ... end Chat Field -->

									</div>
								</div>

							</div>

							
							<!-- Pagination -->
							
							<nav aria-label="Page navigation">
								<ul class="pagination justify-content-center">
									<li class="page-item disabled">
										<a class="page-link" href="#" tabindex="-1">Previous</a>
									</li>
									<li class="page-item"><a class="page-link" href="#">1<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div></div></a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">...</a></li>
									<li class="page-item"><a class="page-link" href="#">12</a></li>
									<li class="page-item">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul>
							</nav>
							
							<!-- ... end Pagination -->
						</div>
						<div class="tab-pane fade" id="friend" role="tabpanel" aria-labelledby="friend-tab">
							<div class="ui-block">
								<div class="ui-block-title">
									<h6 class="title">Friend Requests</h6>
									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
								</div>

								
								<!-- Notification List Frien Requests -->
								
								<ul class="notification-list friend-requests">
									<li>
										<div class="author-thumb">
											<img src="assets/img/avatar15-sm.jpg" alt="author">
										</div>
										<div class="notification-event">
											<a href="#" class="h6 notification-friend">Tamara Romanoff</a>
											<span class="chat-message-item">Mutual Friend: Sarah Hetfield</span>
										</div>
										<span class="notification-icon">
															<a href="#" class="accept-request">
																<span class="icon-add">
																	<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
																</span>
																Accept Friend Request
															</a>
								
															<a href="#" class="accept-request request-del">
																<span class="icon-minus">
																	<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
																</span>
															</a>
								
														</span>
								
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
											<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
										</div>
									</li>
								
									<li>
										<div class="author-thumb">
											<img src="assets/img/avatar16-sm.jpg" alt="author">
										</div>
										<div class="notification-event">
											<a href="#" class="h6 notification-friend">Tony Stevens</a>
											<span class="chat-message-item">4 Friends in Common</span>
										</div>
										<span class="notification-icon">
															<a href="#" class="accept-request">
																<span class="icon-add">
																	<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
																</span>
																Accept Friend Request
															</a>
								
															<a href="#" class="accept-request request-del">
																<span class="icon-minus">
																	<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
																</span>
															</a>
								
														</span>
								
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
											<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
										</div>
									</li>
								
									<li class="accepted">
										<div class="author-thumb">
											<img src="assets/img/avatar17-sm.jpg" alt="author">
										</div>
										<div class="notification-event">
											You and <a href="#" class="h6 notification-friend">Mary Jane Stark</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.
										</div>
										<span class="notification-icon">
															<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
														</span>
								
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
											<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
										</div>
									</li>
								
									<li>
										<div class="author-thumb">
											<img src="assets/img/avatar18-sm.jpg" alt="author">
										</div>
										<div class="notification-event">
											<a href="#" class="h6 notification-friend">Stagg Clothing</a>
											<span class="chat-message-item">9 Friends in Common</span>
										</div>
										<span class="notification-icon">
															<a href="#" class="accept-request">
																<span class="icon-add">
																	<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
																</span>
																Accept Friend Request
															</a>
								
															<a href="#" class="accept-request request-del">
																<span class="icon-minus">
																	<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
																</span>
															</a>
								
														</span>
								
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
											<svg class="olymp-little-delete"><use xlink:href="#olymp-little-delete"></use></svg>
										</div>
									</li>
								
								</ul>
								
								<!-- ... end Notification List Frien Requests -->
							</div>
						</div>
						<div class="tab-pane fade" id="create-fav" role="tabpanel" aria-labelledby="create-fav-tab">
							<div class="ui-block">
								<div class="ui-block-title">
									<h6 class="title">Favorite Page Information</h6>
								</div>
								<div class="ui-block-content">

									
									<!-- Form Favorite Page Information -->
									
									<form>
										<div class="row">
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating">
													<label class="control-label">First Name</label>
													<input class="form-control" placeholder="" type="text" value="Green Goo">
												</div>
									
												<div class="form-group label-floating">
													<label class="control-label">Your Email</label>
													<input class="form-control" placeholder="" type="email" value="greengoo_gigs@yourmail.com">
												</div>
									
												<div class="form-group date-time-picker label-floating">
													<label class="control-label">Since</label>
													<input name="datetimepicker" value="10/24/1984" />
													<span class="input-group-addon">
																			<svg class="olymp-calendar-icon icon"><use xlink:href="#olymp-calendar-icon"></use></svg>
																		</span>
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating">
													<label class="control-label">Last Name</label>
													<input class="form-control" placeholder="" type="text" value="Rock">
												</div>
									
												<div class="form-group label-floating">
													<label class="control-label">Your Website</label>
													<input class="form-control" placeholder="" type="email" value="www.ggrock.com">
												</div>
									
									
												<div class="form-group label-floating">
													<label class="control-label">Your Phone Number</label>
													<input class="form-control" placeholder="" type="text">
												</div>
											</div>
									
											<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
												<div class="form-group label-floating is-select">
													<label class="control-label">Your Country</label>
													<select class="selectpicker form-control">
														<option value="US">United States</option>
														<option value="AU">Australia</option>
													</select>
												</div>
											</div>
											<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
												<div class="form-group label-floating is-select">
													<label class="control-label">Your State / Province</label>
													<select class="selectpicker form-control">
														<option value="CA">California</option>
														<option value="TE">Texas</option>
													</select>
												</div>
											</div>
											<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
												<div class="form-group label-floating is-select">
													<label class="control-label">Your City</label>
													<select class="selectpicker form-control">
														<option value="SF">San Francisco</option>
														<option value="NY">New York</option>
													</select>
												</div>
											</div>
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<textarea class="form-control" placeholder="Write a little description about the page">We are Rock Band from Los Angeles, now based in San Francisco, come and listen to us play!</textarea>
												</div>
											</div>
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
									
												<div class="form-group label-floating is-empty">
													<label class="control-label">Based In</label>
													<input class="form-control" placeholder="" type="text">
												</div>
									
												<div class="form-group label-floating is-select">
													<label class="control-label">Category</label>
													<select class="selectpicker form-control">
														<option value="MA">Rock Band</option>
														<option value="FE">Pop Band</option>
														<option value="FE">Jazz Band</option>
													</select>
												</div>
											</div>
									
											<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group">
													<textarea class="form-control" placeholder="Additional Info">We are open for gigs all over the country. If you are interested, please contact us via our website or send us an email to gigs@ggrock.com</textarea>
												</div>
											</div>
									
											<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group with-icon label-floating">
													<label class="control-label">Your Facebook Account</label>
													<input class="form-control" type="text" value="www.facebook.com/greengoo_rock">
													<i class="fab fa-facebook-f c-facebook" aria-hidden="true"></i>
												</div>
												<div class="form-group with-icon label-floating">
													<label class="control-label">Your Twitter Account</label>
													<input class="form-control" type="text" value="www.twitter.com/greengoo_rock">
													<i class="fab fa-twitter c-twitter" aria-hidden="true"></i>
												</div>
												<div class="form-group with-icon label-floating is-empty">
													<label class="control-label">Your RSS Feed Account</label>
													<input class="form-control" type="text">
													<i class="fa fa-rss c-rss" aria-hidden="true"></i>
												</div>
												<div class="form-group with-icon label-floating is-empty">
													<label class="control-label">Your Dribbble Account</label>
													<input class="form-control" type="text" value="">
													<i class="fab fa-dribbble c-dribbble" aria-hidden="true"></i>
												</div>
												<div class="form-group with-icon label-floating">
													<label class="control-label">Your Spotify Account</label>
													<input class="form-control" type="text" value="green_goo@spotify.com">
													<i class="fab fa-spotify c-spotify" aria-hidden="true"></i>
												</div>
											</div>
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<a href="#" class="btn btn-secondary btn-lg full-width">Restore all Attributes</a>
											</div>
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<a href="#" class="btn btn-primary btn-lg full-width">Save all Changes</a>
											</div>
										</div>
									</form>
									
									<!-- ... end Form Favorite Page Information -->
									

								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="settings-fav" role="tabpanel" aria-labelledby="settings-fav-tab">
							<div class="ui-block">
								<div class="ui-block-title">
									<h6 class="title">Favourite Page Settings</h6>
								</div>
								<div class="ui-block-content">

									
									<!-- Form Favorite Page Settings -->
									
									<form>
										<div class="row">
									
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating is-select">
													<label class="control-label">Who Can Friend You?</label>
													<select class="selectpicker form-control">
														<option value="EO">Everyone</option>
														<option value="NO">No One</option>
													</select>
												</div>
											</div>
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group label-floating is-select">
													<label class="control-label">Who Can View Your Posts</label>
													<select class="selectpicker form-control">
														<option value="US">Friends Only</option>
														<option value="EO">Everyone</option>
													</select>
												</div>
											</div>
									
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
														<div class="h6">Friend’s Birthdays</div>
														<p>Choose wheather or not receive notifications about your friend’s birthdays on your newsfeed</p>
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
												<a href="#" class="btn btn-secondary btn-lg full-width">Restore all Attributes</a>
											</div>
											<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
												<a href="#" class="btn btn-primary btn-lg full-width">Save all Changes</a>
											</div>
										</div>
									</form>
									
									<!-- ... end Form Favorite Page Settings -->
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
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
														<a class="nav-link" id="employment-tab" data-toggle="tab" href="#employment" role="tab" aria-controls="employment" aria-selected="false">Employment History</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false">Education History</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								
									<ul class="nav nav-tabs your-profile-menu main" id="myTab1" role="tablist">
										<li class="nav-item">
											<a class="nav-link" id="notifications-tab" data-toggle="tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false">
												<div class="ui-block-title">
													<div class="h6 title">Notifications</div>
													<div class="items-round-little bg-primary">8</div>
												</div>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="chat-message-tab" data-toggle="tab" href="#chat-message" role="tab" aria-controls="chat-message" aria-selected="false">
												<div class="ui-block-title">
													<div class="h6 title">Chat / Messages</div>
												</div>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="friend-tab" data-toggle="tab" href="#friend" role="tab" aria-controls="friend" aria-selected="false">
												<div class="ui-block-title">
													<div class="h6 title">Friend Requests</div>
													<div class="items-round-little bg-blue">4</div>
												</div>
											</a>
										</li>
										
									</ul>
								</div>
								
								<!-- ... end Your Profile  -->
								

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>`
		console.log(content)
	})
	.fail(function(jqXHR){
		if (jqXHR.status == 500) {
			$(root).html(`<section class="page-500-content medium-padding120">
				<div class="container">
					<div class="row">
						<div class="col col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
							<img src="assets/img/500.png" alt="error_500">
						</div>
						<div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
							<div class="crumina-module crumina-heading">
								<h1 class="page-500-sup-title">500</h1>
								<h2 class="h1 heading-title">Internal Server Error</h2>
								<p class="heading-text">If you like, you can return to our homepage, or if the problem persists, send us an email to:
									<a href="mailto:support@konstructapp.com" class="no-ajaxify" target="_blank">support@konstructapp.com</a>
								</p>
							</div>
							<a href="index" class="btn btn-primary btn-lg">Go to Homepage</a>
						</div>
					</div>
				</div>
			</section>
			`)
		}
	})

	$(root).html(content)
	$(root).after(`
	<a class="back-to-top" href="#">
		<img src="assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
	</a>`)
})
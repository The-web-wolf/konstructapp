<?php 
	$page_name = 'Connections';
	$page_mode = 'user';
 	require 'includes/dynamic/header.php';
?>
<!DOCTYPE html>
<html lang="en">

	<?php include('includes/static/headcontent.php') ?>

<body class="page-has-left-panels">

<!-- ... end Profile Settings Responsive -->

<?php include ('includes/static/sidebar-left.php'); ?>

<?php include('includes/static/header-top.php') ?>

<!-- ... end Responsive Header-BP -->
<div class="header-spacer"></div>

<!-- Main Header Account -->

<!-- Top Header-Profile -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="<?php echo $req_user_data['backgroundPic'] ?>"  alt="Dawn at south dusk" style='max-height: 480px;width: 100%'>
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="user?id=<?php echo $req_user_data['_id'] ?>">Timeline</a>
									</li>
									<li>
										<a href="user-about?id=<?php echo $req_user_data['_id'] ?>">About</a>
									</li>
									<li class="active-li">
										<a href="user-connections?id=<?php echo $req_user_data['_id'] ?>">Connections</a>
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="user-bids?id=<?php echo $req_user_data['_id'] ?>">Bids</a>
									</li>
									<li>
										<a href="user-badges?id=<?php echo $req_user_data['_id'] ?>">Badges</a>
									</li>
									<li>
										<a href="user-portfolio?id=<?php echo $req_user_data['_id'] ?>">Portfolio</a>
									</li>
								</ul>
							</div>
						</div>

						<?php if ($self_user): ?>
							<div class="control-block-button">
								<div class="btn btn-control bg-primary more">
									<svg class="olymp-settings-icon"><use xlink:href="#olymp-settings-icon"></use></svg>

									<ul class="more-dropdown more-with-triangle triangle-bottom-right">
										<li>
											<a href="#" data-toggle="modal" data-target="#update-profile-photo">Update Profile Photo</a>
										</li>
										<li>
											<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Header Photo</a>
										</li>
										<li>
											<a href="profile-settings">Account Settings</a>
										</li>
									</ul>
								</div>
							</div>							
						<?php endif ?>
					</div>
					<div class="top-header-author">
						<a href="#" class="author-thumb">
							<img src="<?php echo $req_user_data['userPic'] ?>" alt="avatar">
						</a>
						<div class="author-content">
							<a href="#" class="h4 author-name"><?php echo $req_user_data['firstName'] ?> <?php echo $req_user_data['lastName'] ?></a>
							<div class="country"><?php echo $req_user_data['occupation'] ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Top Header-Profile -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title"><?php echo $req_user_data['firstName'] ?>’s Connections (86)</div>
					<form class="w-search">
						<div class="form-group with-button">
							<input class="form-control" type="text" placeholder="Search Friends...">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="#olymp-magnifying-glass-icon"></use></svg>
							</button>
						</div>
					</form>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Friends -->

<div class="container">
	<div class="row">
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">
				
				<!-- Friend Item -->
				
				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="assets/img/friend1.jpg" alt="friend">
					</div>
				
					<div class="friend-item-content">
				
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="assets/img/avatar1.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Nicholas Grissom</a>
								<div class="country">San Francisco, CA</div>
							</div>
						</div>
				
						<div class="swiper-container" data-slide="fade">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">52</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">240</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">16</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
										</a>
				
										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
										</a>
				
									</div>
								</div>
				
								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>
				
									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>
				
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				
				<!-- ... end Friend Item -->			</div>
		</div>
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">
				
				<!-- Friend Item -->
				
				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="assets/img/friend2.jpg" alt="friend">
					</div>
				
					<div class="friend-item-content">
				
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="assets/img/avatar2.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Marina Valentine</a>
								<div class="country">Long Island, NY</div>
							</div>
						</div>
				
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">52</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">240</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">16</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
										</a>
				
										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
										</a>
				
									</div>
								</div>
				
								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>
				
									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>
				
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				
				<!-- ... end Friend Item -->			</div>
		</div>
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">
				
				<!-- Friend Item -->
				
				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="assets/img/friend3.jpg" alt="friend">
					</div>
				
					<div class="friend-item-content">
				
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="assets/img/avatar3.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Nicholas Grissom</a>
								<div class="country">Los Angeles, CA</div>
							</div>
						</div>
				
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">49</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">132</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">5</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
										</a>
				
										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
										</a>
				
									</div>
								</div>
				
								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>
				
									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>
				
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				
				<!-- ... end Friend Item -->			</div>
		</div>
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">
				
				<!-- Friend Item -->
				
				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="assets/img/friend4.jpg" alt="friend">
					</div>
				
					<div class="friend-item-content">
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
				
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="assets/img/avatar4.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Chris Greyson</a>
								<div class="country">Austin, TX</div>
							</div>
						</div>
				
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">65</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">104</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">12</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
										</a>
				
										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
										</a>
				
									</div>
								</div>
				
								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>
				
									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>
				
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				
				<!-- ... end Friend Item -->			</div>
		</div>

		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">
				
				<!-- Friend Item -->
				
				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="assets/img/friend5.jpg" alt="friend">
					</div>
				
					<div class="friend-item-content">
				
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="assets/img/avatar5.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Elaine Dreifuss</a>
								<div class="country">New York, NY</div>
							</div>
						</div>
				
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">82</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">204</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">27</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
										</a>
				
										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
										</a>
				
									</div>
								</div>
				
								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>
				
									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>
				
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				
				<!-- ... end Friend Item -->			</div>
		</div>
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">
				
				<!-- Friend Item -->
				
				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="assets/img/friend6.jpg" alt="friend">
					</div>
				
					<div class="friend-item-content">
				
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="assets/img/avatar6.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Bruce Peterson</a>
								<div class="country">Austin, TX</div>
							</div>
						</div>
				
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">73</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">360</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">11</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
										</a>
				
										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
										</a>
				
									</div>
								</div>
				
								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>
				
									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>
				
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				
				<!-- ... end Friend Item -->			</div>
		</div>
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">
				
				<!-- Friend Item -->
				
				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="assets/img/friend7.jpg" alt="friend">
					</div>
				
					<div class="friend-item-content">
				
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="assets/img/avatar7.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Carol Summers</a>
								<div class="country">Los Angeles, CA</div>
							</div>
						</div>
				
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">49</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">132</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">5</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
										</a>
				
										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
										</a>
				
									</div>
								</div>
				
								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>
				
									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>
				
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				
				<!-- ... end Friend Item -->			</div>
		</div>
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">
				
				<!-- Friend Item -->
				
				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="assets/img/friend8.jpg" alt="friend">
					</div>
				
					<div class="friend-item-content">
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
				
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="assets/img/avatar8.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Michael Maximoff</a>
								<div class="country">Portland, OR</div>
							</div>
						</div>
				
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">58</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">304</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">19</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
										</a>
				
										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
										</a>
				
									</div>
								</div>
				
								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>
				
									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>
				
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				
				<!-- ... end Friend Item -->			</div>
		</div>
	</div>
</div>

<!-- ... end Friends -->


<a class="back-to-top" href="#">
	<img src="assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>


<?php include('includes/static/scripts.php') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js" integrity="sha256-EuV9YMxdV2Es4m9Q11L6t42ajVDj1x+6NZH4U1F+Jvw=" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function(){
		profilePictures();
	})
</script>
</body>
</html>

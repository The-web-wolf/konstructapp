<?php if (isset($page_mode) && $page_mode == 'user'): ?>

<div class="modal fade" id="update-profile-photo" tabindex="-1" role="dialog" aria-labelledby="update-profile-photo" aria-hidden="true">
	<div class="modal-dialog modal-sm window-popup update-header-photo" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Update profile Photo</h6>
			</div>
			<form action="#" data-action="<?php echo $devUrl ?>/api/user/profileimage/<?php echo $_COOKIE['_id'] ?>" data-method='PUT' id='userPictureUpload' enctype="multipart/form-data" class='profilePicUpload'>
				<div class="modal-body">
					<div  class="upload-photo-item">
						<div class="modal_data" style="padding-bottom: 20px">
							<input type="file" accept="image/*" name="userPic" class="newUpload">
							<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>

							<h6>Upload Photo</h6>
							<span>Browse your device.</span>
						</div>
						<div class="modal_preview" >
							<img src="" class="imagePreview" >
						</div>

					</div>
				</div>
				<div class="modal-footer upload-action-btns">		
					<button class="btn btn-sm image_ok" type="submit" style="float: right;"><svg><use xlink:href="#olymp-check-icon"></use></svg></button>
					<button class="btn btn-sm push-right image_null" type="button" style="float: left"><svg><use xlink:href="#olymp-close-icon"></use></svg></button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
	<div class="modal-dialog modal-sm window-popup update-header-photo" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Update Header Photo</h6>
			</div>
			<form action="#" data-action="<?php echo $devUrl ?>/api/user/backgroundImage/<?php echo $_COOKIE['_id'] ?>" data-method='PUT' id='userHeaderUpload' enctype="multipart/form-data" class='headerPicUpload'>
				<div class="modal-body">
					<div  class="upload-photo-item">
						<div class="modal_data" style="padding-bottom: 20px">
							<input type="file" accept="image/*" name="backgroundPic" class="newUpload">
							<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>

							<h6>Upload Photo</h6>
							<span>Browse your device.</span>
						</div>
						<div class="modal_preview" >
							<img src="" class="imagePreview">
						</div>

					</div>
				</div>
				<div class="modal-footer upload-action-btns">		
					<button class="btn btn-sm image_ok"  type="submit" style="float: right;"><svg><use xlink:href="#olymp-check-icon"></use></svg></button>
					<button class="btn btn-sm push-right image_null" type="button" style="float: left"><svg><use xlink:href="#olymp-close-icon"></use></svg></button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php endif ?>

<!-- Window-popup Coming soon -->

<div class="modal fade" id="coming-soon" tabindex="-1" role="dialog" aria-labelledby="coming-soon" aria-hidden="true">
	<div class="modal-dialog window-popup event-private-public private-event" style="width: 470px;" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-body">
				<article class="hentry post has-post-thumbnail thumb-full-width private-event">

					<div class="private-event-head inline-items title-information">
						<img src="assets/img/badge8.png" alt="author">
						<div class="author-date">
							<a class="h4 event-title" href="#null">To commence soon!</a>
							<div class="event__date">
								<span class="published">
									We'll let you know when this is active
								</span>
							</div>
						</div>						
					</div>

					<!-- Title Section end -->

					<div class="post-thumb container text-center">
						<img src="assets/img/coming_soon.svg" alt="Coming soon">
					</div>

				</article>

			</div>
		</div>
	</div>
</div>

<!-- ... end Window-popup Coming soon -->

<!-- JS Scripts -->
<script src="assets/js/libs/jquery.appear.js"></script>
<script src="assets/js/libs/jquery.mousewheel.js"></script>
<script src="assets/js/libs/perfect-scrollbar.js"></script>
<script src="assets/js/libs/jquery.matchHeight.js"></script>
<script src="assets/js/libs/svgxuse.js"></script>
<script src="assets/js/libs/imagesloaded.pkgd.js"></script>
<script src="assets/js/libs/Headroom.js"></script>
<script src="assets/js/libs/velocity.js"></script>
<script src="assets/js/libs/ScrollMagic.js"></script>
<script src="assets/js/libs/jquery.waypoints.js"></script>
<!-- <script src="assets/js/libs/jquery.countTo.js"></script> -->
<script src="assets/js/libs/popper.min.js"></script>
<script src="assets/js/libs/material.min.js"></script>
<script src="assets/js/libs/bootstrap-select.js"></script>
<script src="assets/js/libs/smooth-scroll.js"></script>
<script src="assets/js/libs/isotope.pkgd.js"></script>
<script src="assets/js/libs/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>

<script src="assets/js/libs/swiper.jquery.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/app.js"></script>
<!-- <script src='assets/js/index.js'></script> -->
<script src="assets/js/libs-init/libs-init.js"></script>
<script defer src="assets/fonts/fontawesome-all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>

<script src="assets/Bootstrap/dist/js/bootstrap.bundle.js"></script>

<!-- SVG icons loader -->
<script src="assets/js/svg-loader.js"></script>
<!-- /SVG icons loader -->
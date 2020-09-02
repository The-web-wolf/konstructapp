
<!-- Window-popup Portfolio Details -->

<div class="modal fade fullheight" id="detailed-portfolio" tabindex="-1" role="dialog" aria-labelledby="detailed-portfolio" aria-hidden="true">
	<div class="modal-dialog has-widgets window-popup event-private-public private-event" role="document">
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
						<div class="swiper-container auto-height" data-loop='false' data-effect="fade" data-crossfade='crossfade' data-autoplay="4000" >
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

				<div id="PortfolioComment">

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

<!-- ... end Window-popup Portfolio Details -->

<!-- Window-popup Share for review -->

<div class="modal fade " id="review-portfolio" tabindex="-1" role="dialog" aria-labelledby="review-portfolio" aria-hidden="true">
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
							<a class="h4 event-title" href="#null">Share for review</a>
							<div class="event__date">
								<span class="published">
									Client review would be made public on your portfolio
								</span>
							</div>
						</div>						
					</div>

					<!-- Title Section end -->

					<div class="post-thumb container text-center"><!-- 
						<img src="assets/img/client_survey.svg" alt="share for review"> -->
					</div>

					<!-- Image section end  -->

					<div class="main-content">

					</div>

					<!-- Main content Ends -->


				</article>

			</div>
		</div>
	</div>
</div>

<!-- ... end Window-popup Share for review -->

<!-- Window-popup Create Portfolio -->

<div class="modal fade" id="create-new-portfolio" tabindex="-1" role="dialog" aria-labelledby="create-new-portfolio" aria-hidden="true">
	<div class="modal-dialog window-popup edit-widget edit-widget-profile" role="document">
		<form class="modal-content" id="new-portfolio" data-method='POST' data-action="<?=$devUrl?>/api/portfolio">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Create a new portfolio</h6>
			</div>

			<div class="modal-body">
				<p>Use portfolio to display your achievements and sell yourself with them and  impress your profile visitors
				</p>
			</div>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">Portfolio Information</h6>
			</div>

			<div class="modal-body">
				<div class="form-group label-floating">
					<label class="control-label">Give a portfolio title</label>
					<input class="form-control" placeholder="" name="title" type="text" required="">
				</div>
				<div class="form-group label-floating">
					<label class="control-label">Role held in portfolio</label>
					<input class="form-control" placeholder="" name="role" type="text" required="">
				</div>

				<div class="form-group label-floating">
					<label class="control-label">Name of client (eg : Twitter Inc.)</label>
					<input class="form-control" placeholder="" name="client" type="text" required="">
				</div>
				<div class="form-group label-floating">
					<label class="control-label">Location of portfolio</label>
					<input class="form-control" placeholder="" name="location" type="text" required="">
				</div>
				<div class="comment-form">
					<div class="form-group">
						<textarea class="form-control" placeholder="Write detail about the portfolio (maximum : 25 words)" name="details" required=""></textarea>
					</div>			
				</div>
			</div>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">Photos of portfolio</h6>
			</div>

			<div class="modal-body">
				<div class="create-portfolio-images">
					<!-- Single image item -->
					<div class="create-portfolio-image">
						<!-- <div class="form-group with-button">
							<input class="form-control" placeholder="First day of the portfolio" type="text">

							<button style="background: transparent;padding-top:5px;padding-right:10px;border-left: 1px dashed rgba(52, 55, 75, .61)">
								<div class="file-upload" style="right: 10px">
									<label for="upload" class="file-upload__label"><svg class="olymp-multimedia-icon"><use xlink:href="#olymp-multimedia-icon"></use></svg></label>
									<input id="upload" class="file-upload__input" type="file" name="file-upload">
								</div>
							</button>
						</div> -->

						<div class="upload-image-container ">
							<div class="file-upload">
								<label for="uploadPortfolioImage" class="file-upload__label">
									<svg class="#olymp-camera-icon"><use xlink:href="#olymp-camera-icon"></use></svg>
									<br>
									<p class="statusMessage">No image Selected</p>
								</label>
								<input id="uploadPortfolioImage" class="file-upload__input" type="file" name="pictures" accept="image/*" multiple="" required="">
							</div>
						</div>

					</div>
					<!-- --END  -->
				</div>
			
			</div>

			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btn-lg full-width" id="createPortfolio" disabled>Create Portfolio</button>
			</div>
		</form>
		</div>

	</div>
</div>

<!-- Window-popup Create Portfolio -->

<!-- Window-popup Update Portfolio -->

<div class="modal fade" id="update-portfolio" tabindex="-1" role="dialog" aria-labelledby="update-portfolio" aria-hidden="true">
	<div class="modal-dialog window-popup edit-widget edit-widget-profile" role="document">
		<form class="modal-content" id="edit-portfolio" data-method='PUT' >
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-header">
				<h6 class="title">Update portfolio information</h6>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="submit" data-target='custom-function' data-_fnc='updatePortfolio' class="btn btn-primary btn-lg full-width" id="updatePortfolio">Update portfolio</button>
			</div>
		</form>	
	</div>
</div>

<!-- Window-popup Update Portfolio -->
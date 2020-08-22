<!-- Window-popup Create Event -->

<div class="modal fade" id="choose-portfolio" tabindex="-1" role="dialog" aria-labelledby="choose-portfolio" aria-hidden="true">
	<div class="modal-dialog window-popup create-event" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-header">
				<h6 class="title">Choose portfolio to tag</h6>
			</div>

			<div class="modal-body">
				<div class="form-group is-select tagPortfolioContainer">
					<select class="selectpicker form-control style-2 show-tick" data-live-search="true" id="chosenPortfolio">

					</select>
				</div>
				<div class="loader-activity"><div class="indeterminate"></div></div>
				<button class="btn btn-breez btn-md full-width" id="useChosenPortfolio" data-dismiss='modal'>Continue!</button>
				
			</div>
		</div>
	</div>
</div>

<!-- ... end Window-popup Create Event -->

<!-- Window-popup Update Status -->

<div class="modal fade" id="update-status" tabindex="-1" role="dialog" aria-labelledby="update-status" aria-hidden="true">
	<div class="modal-dialog window-popup edit-widget edit-widget-profile" role="document">
		<form class="modal-content" id="edit-status"  data-method='PUT' >
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-header">
				<h6 class="title">Update status information</h6>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="submit" data-target='custom-function' data-_fnc='updateStatus' class="btn btn-primary btn-lg full-width" id="updateStatus">Update status</button>
			</div>
		</form>	
	</div>
</div>

<!-- END -- Window-popup Update Status -->

<!-- Window-popup Status Details -->

<div class="modal fade" id="detailed-status" tabindex="-1" role="dialog" aria-labelledby="detailed-status" aria-hidden="true">
	<div class="modal-dialog window-popup event-private-public private-event" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-body">
				<article class="hentry post has-post-thumbnail thumb-full-width private-event">

					<div class="private-event-head inline-items" style='margin-bottom:0px' id="title-information">
						
					</div>

					<!-- Title Section end -->

					<div class="post-thumb">
						<div class="loader-activity">
						  <div class="indeterminate"></div>
						</div>						
						<div class="swiper-container auto-height" data-effect="fade" data-autoplay="4000">
							<div class="swiper-wrapper">

							</div>
							<!--Prev Next Arrows-->

							<svg class="btn-next-without olymp-popup-right-arrow"><use xlink:href="#olymp-popup-right-arrow"></use></svg>

							<svg class="btn-prev-without olymp-popup-left-arrow"><use xlink:href="#olymp-popup-left-arrow"></use></svg>

						</div>
					</div>

					<!-- Image section end  -->

					<div id="main-content">
						
					</div>

					<!-- Main content Ends -->


				</article>

				<div id="statusComment">

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

<!-- ... end Window-popup Status Details -->
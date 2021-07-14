<script type="text/javascript">

	function createBidHandler(){
	  $("#new-bid [name='pictures']").on('change', function(){
	      var $fileUpload = $("#new-bid [name='pictures']");
	      var fileUploadCount = parseInt($fileUpload.get(0).files.length);
	      if (fileUploadCount > 3){
	       	talert("You can only upload a maximum of 3 files");        
	       	update_btn_state('createBid', 'disable')
	       	$("#new-bid [name='pictures']").val('');
	       	$('#new-bid .upload-image-container .file-upload .file-upload__label svg').css('fill', '#AAAAAA')
	      	$('#new-bid .upload-image-container .file-upload .file-upload__label p').css('color', '#AAAAAA')
	      	$("#new-bid .statusMessage").text(`No images selected`)
	      }
	      else if (fileUploadCount == 0){
	     		$("#new-bid .statusMessage").text(`No images selected`)
	       	$('#new-bid .upload-image-container .file-upload .file-upload__label svg').css('fill', '#AAAAAA')
	      	$('#new-bid .upload-image-container .file-upload .file-upload__label p').css('color', '#AAAAAA')
	      }
	      else{
	      	$("#new-bid .statusMessage").text(`${fileUploadCount} image(s) selected`)
	      	$('#new-bid .upload-image-container .file-upload .file-upload__label svg').css('fill', '#F8AC09')
	      	$('#new-bid .upload-image-container .file-upload .file-upload__label p').css('color', '#F8AC09')
	      }
	  });  	
	  $("#new-bid input,#new-bid select, #new-bid textarea").each(function(){
	  	$(this).on('keyup change', function(){
				if (!$("#new-bid").valid()) {
	    		update_btn_state('createBid', 'disable');
	    	}
	    	else{
	    		update_btn_state('createBid', 'enable')
	    	}
	  	})
	  })
	  $('#createBid').click(function(ev){
	  	ev.preventDefault()
			let selectVal = $('#new-bid select').val()
	  	if (selectVal.length !== 0) {submitForm('new-bid', 'bidCreated');} 	
	  	else{talert(`Choose atleast a tag`); $('#bidTag').focus()}
	  })			
	}

	function expandBid(params){
		let modal 			= $('#detailed-bid');
		let modal_top 	= $('#detailed-bid .title-information')
		let modal_body	= $('#detailed-bid .modal-body 	.main-content');
		let images_cont = $('#detailed-bid .modal-body 	.swiper-wrapper');
		let modal_loader= $('#detailed-bid .modal-body 	.loader-activity');
		let comment_list= $('#detailed-bid .commentBody .comments-list');
		let imagesNav 	= $('#detailed-bid .modal-body .btn-prev-without, #detailed-bid .modal-body .btn-next-without')

		$(modal).addClass('fullheight')
		$(modal).data('resource', 'dynamic')
		$(modal_loader).fadeIn('linear')		
		$(modal_top).html('').fadeOut()
		$(images_cont).html('')
		$(modal_body).html('')
		$(comment_list).html('')
		$(modal).modal('show')

		let bid_details = fetch(`${devUrl}/api/bid/${params.id}`)
		.then( response => response.json())
		.then(handleErrors)
		.then( response  => {
			bid 	= response.data;
			let relative_date	= moment(bid.createdAt).format('LLLL');


			//update history

			history.pushState('', `${bid.title} | KonstructApp | Demand And Supply Start  Here`, `./bids?id=${bid._id}`)
			document.title = `${bid.title} | KonstructApp | Demand And Supply Start  Here`		

			var $isPicture 	 	= bid.pictures.length === 1 && bid.pictures[0].length ? true : false;
			var $isPictures 	= bid.pictures.length > 1 ? true : false;

			let tag_colors = ['bg-primary', 'bg-blue', 'bg-purple','bg-violet', 'bg-grey', 'bg-grey-light', 'bg-grey-lighter', 'bg-orange'];
			let bid_tags = ' ' ;

			for (var i = bid.tags.length - 1; i >= 0; i--) {
				let tag = bid.tags[i]; 
				let random_color 	= tag_colors[Math.floor(Math.random() * tag_colors.length)];
				let tag_compile 	= '<span class="badge ' + random_color + '">' + tag + '</span>';
				bid_tags += tag_compile;
			}

			let statusUi;

			switch(bid.status){
				case 'open' :
					statusUi = `<a href="#null" class="post-category bg-green">OPEN</a>`;
					break;
				case 'awarded' : 
					statusUi = `<a href="#" class="post-category bg-red">AWARDED</a>`;
					break;
				default :
					statusUi = `<a href="#" class="post-category bg-green">OPEN</a>`;
					break;
			}	

			let self_user = bid.user._id === Cookies.get('_id')	? true : false;

			let makeAwarded = bid.status === 'open' ? `<li><a href="#null" data-target='custom-function' data-_fnc='awardBid' data-_param='{"id":"${bid._id}"}'>Mark Awarded</a></li>` : '';

			let topContent = `
				<img src="assets/img/badge8.png" class='web-only' alt="bid">
				<div class="author-date">
					<a class="h4 event-title" href="#null">${bid.title} <span style='padding-left:10px'> ${statusUi}</span></a>
					<div class="event__date">
						<time class="published" datetime="${bid.createdAt}">
							${relative_date}
						</time>
					</div>
				</div>	
			`;

			if (self_user) {
				topContent += `
				<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
					<ul class="more-dropdown">
						<li>
							<a href="#null"  data-target='custom-function' data-_fnc='editBid' data-_param='{"id":"${bid._id}"}'>Edit bid</a>
						</li>
						<li>
							<a href="#null" data-target='custom-function' data-_fnc='deleteBid' data-_param='{"id":"${bid._id}"}'>Delete Bid</a>
						</li>
						<li>
							<a href="#null"  data-target='custom-function' data-_fnc='shareLink' 
							data-_param='{"text":"${bid.title}", "url" : "bids?id=${bid._id}"}'>Share Bid</a>
						</li>
						${makeAwarded}
					</ul>
				</div>`
			}

			else{
				topContent += `
				<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
					<ul class="more-dropdown">
						<li>
							<a href="#null"  data-target='custom-function' data-_fnc='shareLink' 
							data-_param='{"text":"${bid.title}", "url" : "bids?id=${bid._id}"}'>Share Bid</a>
						</li>
					</ul>
				</div>`				
			}

			$(modal_top).html(topContent).slideDown('easeIn')

			bid.pictures.map(function(currentPicture){
				$(images_cont).append(`							
					<div class="swiper-slide">
						<div class="photo-item" data-swiper-parallax="-300" data-swiper-parallax-duration="500">
							<img src="${currentPicture}" alt="Portfolio banner">
							<div class="overlay overlay-dark"></div>

							<div class="content">
								<a href="#" class="h6 title">${bid.title}</a>
								<span class="published" style='color:#F8AC09'><span class='fa fa-map-marker'></span> ${bid.location}</span>
							</div>
						</div>
					</div>`
				)				
			})

			activateSwiper()
						
			if ($isPictures) {
				$(imagesNav).show()				
			}
			else{
				$(imagesNav).hide()// hide swiper navigation if only one image
			}

			$(modal_loader).hide()

			let likes_count 		= bid.likes.length;
			let comments_count 	= response.commentsCount;
			let content 	= `				
				<div class="row">
					<div class="col col-lg-7 col-md-7 col-sm-12 col-12">
						<div class="post__author author vcard inline-items">
							<img src="${bid.user.userPic}" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" href="user?id=${bid.user._id}">${bid.user.firstName} ${bid.user.lastName} </a> created this <a href="#">Bid</a>
								<div class="post__date">
									<time class="published" datetime="${bid.createdAt}">
										${relative_date}
									</time>
								</div>
							</div>

						</div>
					</div>
					<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
						<div class="event-description">
							<h6 class="event-description-title c-yellow" style='margin-bottom:20px'>Bid Requirements</h6>
							<div class="place inline-items">
								<svg class="olymp-add-a-place-icon"><use xlink:href="#olymp-add-a-place-icon"></use></svg>
								<span>${bid.location}</span>
							</div>

							<div class="place inline-items">
								<span>${bid_tags}</span>
							</div>
						</div>
					</div>
					<p class="bidDetails" style='max-height:130px !important; overflow-y:scroll'>
						${bid.details}
					</p>
				</div>

				<div class="post-additional-info inline-items">

					<a href="#like" class="post-add-icon inline-items likeText ${bid._id}" data-target='custom-function' data-_fnc="likeBid"	data-_param='{"id":"${bid._id}"}'>
						<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
						<span> ${likes_count} Like(s)</span>
					</a>


					<div class="comments-shared">
						<a href="#" class="post-add-icon inline-items">
							<svg class="olymp-speech-balloon-icon"><use xlink:href="#olymp-speech-balloon-icon"></use></svg>
							<span class='${bid._id}'>${comments_count} Comment(s)</span>
						</a>
					</div>


				</div>

				<div class="control-block-button post-control-button">


					<a href="#" class=" btn btn-control close icon-close" data-dismiss="modal" aria-label="Close">
						<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
					</a>


				</div>				
				`;

			$(modal_body).html(content)
			return bid
		})
		.then(bid => {
			refreshLikes(bid)
			return bid
		})
		.then(bid => loadBidComments(bid._id))
		.catch(err => {
			$(modal).data('resource', 'static')// make modal static to avoid going back on close
			$(modal).removeClass('fullheight') // remove fullheight to look better

			$(modal_loader).fadeOut('linear')		
			$(comment_list).hide()
			$(modal_body).html(`
			<div class='row ml-auto mr-auto text-center'>
				<div class="col col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">								
					<svg id="f20e0c25-d928-42cc-98d1-13cc230663ea" class='svg-error-icon' data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="820.16" height="780.81" viewBox="0 0 820.16 780.81"><defs><linearGradient id="07332201-7176-49c2-9908-6dc4a39c4716" x1="539.63" y1="734.6" x2="539.63" y2="151.19" gradientTransform="translate(-3.62 1.57)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="gray" stop-opacity="0.25"/><stop offset="0.54" stop-color="gray" stop-opacity="0.12"/><stop offset="1" stop-color="gray" stop-opacity="0.1"/></linearGradient><linearGradient id="0ee1ab3f-7ba2-4205-9d4a-9606ad702253" x1="540.17" y1="180.2" x2="540.17" y2="130.75" gradientTransform="translate(-63.92 7.85)" xlink:href="#07332201-7176-49c2-9908-6dc4a39c4716"/><linearGradient id="abca9755-bed1-4a97-b027-7f02ee3ffa09" x1="540.17" y1="140.86" x2="540.17" y2="82.43" gradientTransform="translate(-84.51 124.6) rotate(-12.11)" xlink:href="#07332201-7176-49c2-9908-6dc4a39c4716"/><linearGradient id="2632d424-e666-4ee4-9508-a494957e14ab" x1="476.4" y1="710.53" x2="476.4" y2="127.12" gradientTransform="matrix(1, 0, 0, 1, 0, 0)" xlink:href="#07332201-7176-49c2-9908-6dc4a39c4716"/><linearGradient id="97571ef7-1c83-4e06-b701-c2e47e77dca3" x1="476.94" y1="156.13" x2="476.94" y2="106.68" gradientTransform="matrix(1, 0, 0, 1, 0, 0)" xlink:href="#07332201-7176-49c2-9908-6dc4a39c4716"/><linearGradient id="7d32e13e-a0c7-49c4-af0e-066a2f8cb76e" x1="666.86" y1="176.39" x2="666.86" y2="117.95" gradientTransform="matrix(1, 0, 0, 1, 0, 0)" xlink:href="#07332201-7176-49c2-9908-6dc4a39c4716"/></defs><title>no data</title><rect x="317.5" y="142.55" width="437.02" height="603.82" transform="translate(-271.22 62.72) rotate(-12.11)" fill="#e0e0e0"/><g opacity="0.5"><rect x="324.89" y="152.76" width="422.25" height="583.41" transform="translate(-271.22 62.72) rotate(-12.11)" fill="url(#07332201-7176-49c2-9908-6dc4a39c4716)"/></g><rect x="329.81" y="157.1" width="411.5" height="570.52" transform="translate(-270.79 62.58) rotate(-12.11)" fill="#fafafa"/><rect x="374.18" y="138.6" width="204.14" height="49.45" transform="translate(-213.58 43.93) rotate(-12.11)" fill="url(#0ee1ab3f-7ba2-4205-9d4a-9606ad702253)"/><path d="M460.93,91.9c-15.41,3.31-25.16,18.78-21.77,34.55s18.62,25.89,34,22.58,25.16-18.78,21.77-34.55S476.34,88.59,460.93,91.9ZM470.6,137A16.86,16.86,0,1,1,483.16,117,16.66,16.66,0,0,1,470.6,137Z" transform="translate(-189.92 -59.59)" fill="url(#abca9755-bed1-4a97-b027-7f02ee3ffa09)"/><rect x="375.66" y="136.55" width="199.84" height="47.27" transform="translate(-212.94 43.72) rotate(-12.11)" fill="#2c304a"/><path d="M460.93,91.9a27.93,27.93,0,1,0,33.17,21.45A27.93,27.93,0,0,0,460.93,91.9ZM470.17,135a16.12,16.12,0,1,1,12.38-19.14A16.12,16.12,0,0,1,470.17,135Z" transform="translate(-189.92 -59.59)" fill="#2c304a"/><rect x="257.89" y="116.91" width="437.02" height="603.82" fill="#e0e0e0"/><g opacity="0.5"><rect x="265.28" y="127.12" width="422.25" height="583.41" fill="url(#2632d424-e666-4ee4-9508-a494957e14ab)"/></g><rect x="270.65" y="131.42" width="411.5" height="570.52" fill="#dee2e6"/><rect x="374.87" y="106.68" width="204.14" height="49.45" fill="url(#97571ef7-1c83-4e06-b701-c2e47e77dca3)"/><path d="M666.86,118c-15.76,0-28.54,13.08-28.54,29.22s12.78,29.22,28.54,29.22,28.54-13.08,28.54-29.22S682.62,118,666.86,118Zm0,46.08a16.86,16.86,0,1,1,16.46-16.86A16.66,16.66,0,0,1,666.86,164Z" transform="translate(-189.92 -59.59)" fill="url(#7d32e13e-a0c7-49c4-af0e-066a2f8cb76e)"/><rect x="377.02" y="104.56" width="199.84" height="47.27" fill="#2c304a"/><path d="M666.86,118a27.93,27.93,0,1,0,27.93,27.93A27.93,27.93,0,0,0,666.86,118Zm0,44.05A16.12,16.12,0,1,1,683,145.89,16.12,16.12,0,0,1,666.86,162Z" transform="translate(-189.92 -59.59)" fill="#2c304a"/><g opacity="0.5"><rect x="15.27" y="737.05" width="3.76" height="21.33" fill="#47e6b1"/><rect x="205.19" y="796.65" width="3.76" height="21.33" transform="translate(824.47 540.65) rotate(90)" fill="#47e6b1"/></g><g opacity="0.5"><rect x="451.49" width="3.76" height="21.33" fill="#47e6b1"/><rect x="641.4" y="59.59" width="3.76" height="21.33" transform="translate(523.63 -632.62) rotate(90)" fill="#47e6b1"/></g><path d="M961,832.15a4.61,4.61,0,0,1-2.57-5.57,2.22,2.22,0,0,0,.1-.51h0a2.31,2.31,0,0,0-4.15-1.53h0a2.22,2.22,0,0,0-.26.45,4.61,4.61,0,0,1-5.57,2.57,2.22,2.22,0,0,0-.51-.1h0a2.31,2.31,0,0,0-1.53,4.15h0a2.22,2.22,0,0,0,.45.26,4.61,4.61,0,0,1,2.57,5.57,2.22,2.22,0,0,0-.1.51h0a2.31,2.31,0,0,0,4.15,1.53h0a2.22,2.22,0,0,0,.26-.45,4.61,4.61,0,0,1,5.57-2.57,2.22,2.22,0,0,0,.51.1h0a2.31,2.31,0,0,0,1.53-4.15h0A2.22,2.22,0,0,0,961,832.15Z" transform="translate(-189.92 -59.59)" fill="#4d8af0" opacity="0.5"/><path d="M326.59,627.09a4.61,4.61,0,0,1-2.57-5.57,2.22,2.22,0,0,0,.1-.51h0a2.31,2.31,0,0,0-4.15-1.53h0a2.22,2.22,0,0,0-.26.45,4.61,4.61,0,0,1-5.57,2.57,2.22,2.22,0,0,0-.51-.1h0a2.31,2.31,0,0,0-1.53,4.15h0a2.22,2.22,0,0,0,.45.26,4.61,4.61,0,0,1,2.57,5.57,2.22,2.22,0,0,0-.1.51h0a2.31,2.31,0,0,0,4.15,1.53h0a2.22,2.22,0,0,0,.26-.45A4.61,4.61,0,0,1,325,631.4a2.22,2.22,0,0,0,.51.1h0a2.31,2.31,0,0,0,1.53-4.15h0A2.22,2.22,0,0,0,326.59,627.09Z" transform="translate(-189.92 -59.59)" fill="#fdd835" opacity="0.5"/><path d="M855,127.77a4.61,4.61,0,0,1-2.57-5.57,2.22,2.22,0,0,0,.1-.51h0a2.31,2.31,0,0,0-4.15-1.53h0a2.22,2.22,0,0,0-.26.45,4.61,4.61,0,0,1-5.57,2.57,2.22,2.22,0,0,0-.51-.1h0a2.31,2.31,0,0,0-1.53,4.15h0a2.22,2.22,0,0,0,.45.26,4.61,4.61,0,0,1,2.57,5.57,2.22,2.22,0,0,0-.1.51h0a2.31,2.31,0,0,0,4.15,1.53h0a2.22,2.22,0,0,0,.26-.45,4.61,4.61,0,0,1,5.57-2.57,2.22,2.22,0,0,0,.51.1h0a2.31,2.31,0,0,0,1.53-4.15h0A2.22,2.22,0,0,0,855,127.77Z" transform="translate(-189.92 -59.59)" fill="#fdd835" opacity="0.5"/><circle cx="812.64" cy="314.47" r="7.53" fill="#f55f44" opacity="0.5"/><circle cx="230.73" cy="746.65" r="7.53" fill="#f55f44" opacity="0.5"/><circle cx="735.31" cy="477.23" r="7.53" fill="#f55f44" opacity="0.5"/><circle cx="87.14" cy="96.35" r="7.53" fill="#4d8af0" opacity="0.5"/><circle cx="7.53" cy="301.76" r="7.53" fill="#47e6b1" opacity="0.5"/></svg>
				</div>
				<div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
					<div class="crumina-module crumina-heading">
						<h2 class="h3 heading-title">Something went wrong</h2>
						<p class="heading-text">Our squirrels coudn't find you this resource. if you think this is not right, kindly send us a mail to:
							<a href="mailto:support@konstructapp.com" class="no-ajaxify" target="_blank">support@konstructapp.com</a>
						</p>
					</div>
					
					</div>
				</div>`
			)			
		})		

	}	

	function likeBid(params){
		let bid 	= params;
		let user 	= Cookies.get('_id');
		let reqData = {likes : user};
		let likeBtn = $(document).find(`.likeBtn.${bid.id}`);	
		let likeText= $(document).find(`.likeText.${bid.id}`);	
		let count 	= $(likeText).children('span');
		let method 	= 'PUT'	;
		let action 	= `${devUrl}/api/bid/${bid.id}`;
		submitData(reqData,method,action, (error, response) => {
			if(error){
				$(likeBtn).blur().removeClass('liked')
				$(likeText).blur().removeClass('liked')
				talert('Could not complete')
			}
			else{
				// Successful
				$(likeBtn).addClass('liked');
				$(likeText).addClass('liked');
				let new_count = response.likesCount;
				$(count).html(`${new_count} like(s) `)				
			}
		})
	}

	function updateBid(){
		submitForm('edit-bid', 'bidUpdated')
	}

	function editBid(params){
		let edit_body = $('#update-bid .modal-body');
		let edit_main	= $('#update-bid');
		let edit_foot	= $('#update-bid .modal-footer');

		$(edit_foot).fadeOut('fast')
		$(edit_body).html(`<div class="loader-activity"><div class="indeterminate"></div></div>`);
		$(edit_main).modal('show')
		$(edit_main).find('form').attr('data-action', `${devUrl}/api/bid/${params.id}`)

		let bid_details = fetch(`${devUrl}/api/bid/${params.id}`)
		.then( response => response.json())
		.then(bid => {
			bid = bid.data;
			let modal_content = 
			`<div class="form-group label-floating">
					<label class="control-label">Give a bid title</label>
					<input class="form-control" placeholder="" name="title" type="text" required="" value='${bid.title}'>
				</div>

				<div class="form-group label-floating is-select">
					<label class="control-label">Tags </label>
					<select class="selectpicker form-control" multiple data-live-search="true" data-max-options='3' name="tags" id="editBidTag" required>
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
						<option value='Solar Energy/Installation '>Solar Energy/Installation </option>
						<option value='Renewable Energy '>Renewable Energy </option>
						<option value='Green Energy '>Green Energy </option>
						<option value='Hydro Engineering'>Hydro Engineering</option>
						<option value='Bio Energy'>Bio Energy</option>
						<option value='Inverter installation'>Inverter installation</option>
						<option value='Solar Panels'>Solar Panels</option>	
						<option value="Art, Graffiti, Morals ">Art, Graffiti, Morals </option>
						<option value="Ceiling">Ceiling</option>
						<option value="Facility Management "> Facility Management  </option>
						<option value="Tourism, Environment"> Tourism, Environment </option>													
					</select>
				</div>

				<div class="form-group label-floating">
					<label class="control-label">Location of bid</label>
					<input class="form-control" placeholder="" name="location" type="text" required="" value='${bid.location}'>
				</div>
				<div class="comment-form">
					<div class="form-group">
						<textarea class="form-control" placeholder="Write detail about the bid (minimum 100 characters)" name="details" required="" minlength="100">${bid.details}</textarea>
					</div>			
				</div>`;
				$(edit_body).html(modal_content)
				$('#editBidTag').val(bid.tags)
				$('#editBidTag').selectpicker('render')
				$(edit_foot).fadeIn('slow')
		})
	}

	function awardBid(params){

		let bid = params;
		let reqData = {status : 'awarded'}
		let method 	= 'PUT';
		let action 	= `${devUrl}/api/bid/${bid.id}`;
		swal({
		  text: `Proceed to mark bid awarded? you cannot unmark it`,		  
		  icon: "info",
		  buttons: {
		  	cancel : 'Cancel',
		  	proceed : {
		  		text : 'Proceed!',
		  		value : 'proceed',
		  		closeModal : false
		  	}
		  }
		})
		.then((value) => {
		  if (value == 'proceed') {
		  	submitData(reqData,method,action, (error, response) => {
		  		if(error){
		  			talert(error)
		  		}
		  		else{
		  			// Successful
		  			talert( 'Marked Awarded');
		  			swal.stopLoading();
	    			swal.close();	 
	    			hideModals() 			
		  			loadBids('sub')
		  		}
		  	})
		  } else {
		    
		  }
		});
	}		

	function deleteBid(params){
		let bid = params;
		let reqData = {id : bid.id}
		let method 	= 'DELETE';
		let action 	= `${devUrl}/api/bid/${bid.id}`;
		swal({
		  text: `Are you sure you want to delete this bid?`,
		  icon: "warning",
		  buttons: {
		  	cancel : 'Cancel',
		  	proceedDelete : {
		  		text : 'Yeaah!',
		  		value : 'proceedDelete',
		  		closeModal : false
		  	}
		  },
		  dangerMode : true,
		})
		.then((value) => {
		  if (value == 'proceedDelete') {
		  	submitData(reqData,method,action, (error, response) => {
		  		if(error){
		  			talert(error)
		  		}
		  		else{
		  			// Successful
		  			talert('Bid deleted');
		  			swal.stopLoading();
	    			swal.close();
	    			hideModals()
		  			loadBids('sub');
		  		}
		  	})
		  } else {
		    
		  }
		});
	}

	/* Bid comments */

	function makeBidComment(params){
		let commentField = $('#commentForm [name="bidComments"]');
		if (commentField.val() < 1) {
			talert('Write a comment')
		}
		else{
			submitForm('commentForm', 'bidCommentMade')
		}
	}	

	function deleteBidComment(params){
		let comment = params;
		let bidId 	= params.bid_id;
		let reqData = {id : comment.id}
		let method 	= 'DELETE';
		let action 	= `${devUrl}/api/bidcomment/${comment.id}`;

  	submitData(reqData,method,action, (error, response) => {
  		if(error){
  			talert(error)
  		}
  		else{
  			// Successful
  			talert('comment deleted');
  			loadComments(bidId, 'sub');
  		}
  	})
	}


	function loadBidComments(bid, callType){
		let root = $('#bidComment');

		if(callType === 'sub'){
			$(root).find('.commentBody .comments-list').html('')
		}
		// Show the comment form
		$('#bidComment .comment_form_container').html(`
		<form class="comment-form inline-items " action='#' data-action='${devUrl}/api/bidcomment' data-method='POST' id='commentForm'>

			<div class="post__author author vcard inline-items">
				<img src="<?php echo $user_data['userPic'] ?>" alt="author">

				<div class="form-group with-icon-right ">
					<textarea class="form-control" placeholder="" name='bidComments' required></textarea>
					<input type='hidden' name='bid' value='${bid}'></input>
					<div class="add-options-message">
						<button class="btn options-message" style='padding:0px' data-target='custom-function' data-_fnc='makeBidComment'>
							<svg class="olymp-camera-icon"><use xlink:href="#olymp-play-icon"></use></svg>
						</button>
					</div>
				</div>
			</div>

		</form>`); 

		let requestComment = fetch(`${devUrl}/api/bidcomment/${bid}`)
		.then(response => response.json())
		.then(comment => {
			let commentData 	= comment.data;
			let commentCount 	= comment.commentsCount;

			/*Update the count of the comments*/
			$(document).find(`.comments-shared a span`).each(function(){
				if (commentData.length > 0) {
					if ($(this).hasClass(commentData[0].bid)) {
						$(this).html(`${commentCount} Comment(s)`);
					}					
				}
				else{
						$(this).html(`0 Comment(s)`);					
				}
			})

			/*Write the comments */

			let comments_container = $(root).find('.commentBody .comments-list');

			let writeComments = new Promise(function(resolve){
			 commentData.map(function(comment){
					let relative_date	= moment(comment.createdAt);
					relative_date 		= relative_date.fromNow();
					let threedots 		= `
						<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#null" data-target='custom-function' data-_fnc='deleteBidComment' data-_param='{"id":"${comment._id}", "bid_id" : "${comment.bid}" }'>Delete Comment</a>
								</li>
							</ul>
						</div>
					`;
					let show_dots			= comment.user._id === Cookies.get('_id') ? threedots : '';

					let writeComment 	= $(comments_container).append(
						`<li class="comment-item">
							<div class="post__author author vcard inline-items">
								<img src="${comment.user.userPic}" alt="author">

								<div class="author-date">
									<a class="h6 post__author-name fn" href="user?id=${comment.user._id}">${comment.user.firstName} ${comment.user.lastName}</a>
									<div class="post__date">
										<time class="published" datetime="${comment.createdAt}">
											${relative_date}
										</time>
									</div>
								</div>

								${show_dots}

							</div>

							<p>${comment.bidComments}</p>
						</li>`
					)
					if (writeComment) {resolve('done!')}
				})			
			})
			writeComments.then(() => $(".commentBody").animate({ scrollTop: $('.commentBody').prop("scrollHeight")}, 1000) )
		})
	}				

</script>
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


		$(modal_loader).fadeIn('linear')		
		$(modal_top).html('').fadeOut()
		$(images_cont).html('')
		$(modal_body).html('')
		$(comment_list).html('')
		$(modal).modal('show')

		let bid_details = fetch(`${devUrl}/api/bid/${params.id}`)
		.then( response => response.json())
		.then( response  => {
			bid 	= response.data;
			let relative_date	= moment(bid.createdAt).format('LLLL');

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
				<img src="assets/img/badge8.png" class='web-only' alt="author">
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
						${makeAwarded}
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

			$(modal_loader).hide()

			// Activate swipe if more than 1 image available

			if ($isPictures) {
				$(imagesNav).show()
				activateSwiper()
			}
			else{
				$(imagesNav).hide()
			}

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

					<a href="#" class="btn btn-control likeBtn ${bid._id}" data-target='custom-function' data-_fnc="likeBid"	data-_param='{"id":"${bid._id}"}'>
						<svg class="olymp-like-post-icon"><use xlink:href="#olymp-like-post-icon"></use></svg>
					</a>

					<a href="#" class="btn btn-control commentBtn">
						<svg class="olymp-comments-post-icon"><use xlink:href="#olymp-comments-post-icon"></use></svg>
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
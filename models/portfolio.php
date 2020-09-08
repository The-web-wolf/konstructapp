<script type="text/javascript">

	/* Portfolio*/
	function createPortfolioHandler(){

	  $("#new-portfolio [name='pictures']").on('change', function(){
	      var $fileUpload = $("#new-portfolio [name='pictures']");
	      var fileUploadCount = parseInt($fileUpload.get(0).files.length);
	      if (fileUploadCount > 5){
	       	talert("You can only upload a maximum of 5 files");        
	       	update_btn_state('createPortfolio', 'disable')
	       	$("#new-portfolio [name='pictures']").val('');
	       	$('#new-portfolio .upload-image-container .file-upload .file-upload__label svg').css('fill', '#AAAAAA')
	      	$('#new-portfolio .upload-image-container .file-upload .file-upload__label p').css('color', '#AAAAAA')
	      	$("#new-portfolio .statusMessage").text(`No images selected`)
	      }
	      else if (fileUploadCount == 0){
	     		$("#new-portfolio .statusMessage").text(`No images selected`)
	       	$('#new-portfolio .upload-image-container .file-upload .file-upload__label svg').css('fill', '#AAAAAA')
	      	$('#new-portfolio .upload-image-container .file-upload .file-upload__label p').css('color', '#AAAAAA')
	      }
	      else{
	      	$("#new-portfolio .statusMessage").text(`${fileUploadCount} image(s) selected`)
	      	$('#new-portfolio .upload-image-container .file-upload .file-upload__label svg').css('fill', '#F8AC09')
	      	$('#new-portfolio .upload-image-container .file-upload .file-upload__label p').css('color', '#F8AC09')
	      }
	  });  	

	  $("#new-portfolio input,#new-portfolio textarea").each(function(){
	  	$(this).on('keyup change', function(){
				if (!$("#new-portfolio").valid()) {
	    		update_btn_state('createPortfolio', 'disable');
	    	}
	    	else{
	    		update_btn_state('createPortfolio', 'enable')
	    	}
	  	})
	  })

	  $('#createPortfolio').click(function(ev){
	  	ev.preventDefault()
	  	submitForm('new-portfolio', 'portfolioCreated');
	  })			
	}

	function makePortfolioFeatured(params){
		let portfolio = params;
		let reqData = {featured : true}
		let method 	= 'PUT';
		let action 	= `${devUrl}/api/portfolio/${portfolio.id}`;
		swal({
		  title: portfolio.title,
		  text: `Are you sure you want to make this your featured portfolio?`,
		  icon: "info",
		  buttons: {
		  	cancel : 'Cancel',
		  	makeFeatured : {
		  		text : 'Yeaah!',
		  		value : 'makeFeatured',
		  		closeModal : false
		  	}
		  }
		})
		.then((value) => {
		  if (value == 'makeFeatured') {
		  	submitData(reqData,method,action, (error, response) => {
		  		if(error){
		  			talert(error)
		  		}
		  		else{
		  			// Successful
		  			talert(portfolio.title + ' has been made featured portfolio');
		  			swal.stopLoading();
	    			swal.close();	  			
		  			loadPortfolio('sub')
		  		}
		  	})
		  } else {
		    
		  }
		});
	}		

	function shareForReview(params){
		let modal = $('#review-portfolio');		
		let root 	= $(modal).find('.main-content');
		let portfolio 	= params.id;
		$(modal).modal('show')
		$(root).html(
			`<div class="formBox">
				<p>Give Information of contact person</p>
				<form action="#" id="sendInvite">
					<div class="form-group label-floating">
						<label class="control-label"> Client name</label>
						<input class="form-control" placeholder="" name="client_name" type="text" required="">
					</div>
					<button class="btn btn-primary btn-md btn-block" type="submit"> Continue! </button>						
				</form>
			</div>
			<div class="sendBox">
				<p>Choose how to send invite for review</p>										
			</div>`)

		let form 	= $('#sendInvite');
		$(form).submit(function(e){
			e.preventDefault();
			let formData 		= $(form).serializeArray();
			if (formData['client_name'] === '') {
				talert('All fields are required :D');
				return false;
			}
			else{
				let clientName 	= formData[0]['value'];
				let reviewLink 	= `https://app.konstructapp.com/review?ref=${portfolio}`;
				let message 		= ` ${reviewLink} \nThanks.`	;
				let whatsapp		= `<button 
										class="btn bg-green btn-block btn-md no-ajaxy" 
										data-sharer="whatsapp" 
										data-title="Hi ${clientName},\nkindly provide a portfolio review & rating for my portfolio on Konstructapp" 
										data-url = '${reviewLink}'
										>Send on Whatsapp														
									</button>`;
				let email 			= `<button 
										class ='btn bg-dribbble btn-block btn-md no-ajaxy' 
										data-sharer	='email' 
										data-title='Hi ${clientName},\nkindly provide a portfolio review & rating for my portfolio on Konstructapp'
										data-subject	= 'Invite for review'
										data-url = '${reviewLink}'
										data-to = ''> Share via email 
									</button>`

				let temp = `${whatsapp}  ${email} <br> <button class='btn btn-primary btn-block' data-dismiss='modal'> Close </button>`;
				$(root).find('.formBox').slideUp()
				$(root).find('.sendBox').append(temp).slideDown()
				window.Sharer.init();
			}
		})
	}		

	function deletePortfolio(params){
		let portfolio = params;
		let reqData = {id : portfolio.id}
		let method 	= 'DELETE';
		let action 	= `${devUrl}/api/portfolio/${portfolio.id}`;
		swal({
		  text: `Are you sure you want to delete this portfolio?`,
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
		  			if (response.status === 400) {
		  				loadPortfolio('sub')
		  			}
		  		}
		  		else{
		  			// Successful
		  			talert('Portfolio deleted');
	    			hideModals()
		  			loadPortfolio('sub');
		  		}
	  			swal.stopLoading();
    			swal.close();		  		
		  	})
		  } else {
		    
		  }
		});
	}		

	function updatePortfolio(){
		submitForm('edit-portfolio', 'portfolioUpdated')
	}

	function editPortfolio(params){
		let edit_body = $('#update-portfolio .modal-body');
		let edit_main	= $('#update-portfolio');
		let edit_foot	= $('#update-portfolio .modal-footer');

		$(edit_foot).fadeOut('fast')
		$(edit_body).html(`<div class="loader-activity"><div class="indeterminate"></div></div>`);
		$(edit_main).modal('show')
		$(edit_main).find('form').attr('data-action', `${devUrl}/api/portfolio/${params.id}`)

		let portfolio_details = fetch(`${devUrl}/api/portfolio/${params.id}`)
		.then( response => response.json())
		.then(portfolio => {
			portfolio = portfolio.data;
			let modal_content = 
			`<div class="form-group label-floating">
					<label class="control-label">Give a portfolio title</label>
					<input class="form-control" placeholder="" name="title" type="text" required="" value='${portfolio.title}'>
				</div>

				<div class="form-group label-floating">
					<label class="control-label">Name of client (eg : Twitter Inc.)</label>
					<input class="form-control" placeholder="" name="client" type="text" required="" value='${portfolio.client}'>
				</div>
				<div class="form-group label-floating">
					<label class="control-label">Location of portfolio</label>
					<input class="form-control" placeholder="" name="location" type="text" required="" value='${portfolio.location}'>
				</div>
				<div class="comment-form">
					<div class="form-group">
						<textarea class="form-control" placeholder="Write detail about the portfolio (minimum 100 characters)" name="details" required="" minlength="100">${portfolio.details}</textarea>
					</div>			
				</div>`;
				$(edit_body).html(modal_content)
				$(edit_foot).fadeIn('slow')
		})
	}

	function expandPortfolio(params){
		let modal 			= $('#detailed-portfolio');
		let modal_top 	= $('#detailed-portfolio .title-information')
		let modal_body	= $('#detailed-portfolio .modal-body 	.main-content');
		let images_cont = $('#detailed-portfolio .modal-body 	.swiper-wrapper');
		let modal_loader= $('#detailed-portfolio .modal-body 	.loader-activity');
		let comment_list= $('#detailed-portfolio .commentBody .comments-list');
		let imagesNav 	= $('#detailed-portfolio .modal-body .btn-prev-without, #detailed-portfolio .modal-body .btn-next-without')

		$(modal_loader).fadeIn('linear')		
		$(modal_top).html('').fadeOut()
		$(images_cont).html('')
		$(modal_body).html('')
		$(comment_list).html('')
		$(modal).modal('show')

		let portfolio_details = fetch(`${devUrl}/api/portfolio/${params.id}`)
		.then( response => response.json())
		.then( portfolio  => {
			portfolio 	= portfolio.data;
			let relative_date	=  moment(portfolio.createdAt).format('LLLL');

			var $isPicture 	 	= portfolio.pictures.length === 1 && portfolio.pictures[0].length ? true : false;
			var $isPictures 	= portfolio.pictures.length > 1 ? true : false;

			let self_user_menu = portfolio.user._id === Cookies.get('_id') ? `
				<div class="more" style='display:inline;'><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
					<ul class="more-dropdown">
						<li>
							<a href="#null"  data-target='custom-function' data-_fnc='editPortfolio' data-_param='{"id":"${portfolio._id}"}'>Edit Portfolio</a>
						</li>
						<li>
							<a href="#null" data-target='custom-function' data-_fnc='deletePortfolio' data-_param='{"id":"${portfolio._id}"	}'>Delete Portfolio</a>
						</li>
						<li>
							<a href="#null" data-target='custom-function' data-_fnc="makePortfolioFeatured" 
							data-_param='{"id":"${portfolio._id}"}'>Select as Featured</a>
						</li>
						<li>
							<a href="#null" data-target='custom-function' data-_fnc="shareForReview" 
							data-_param='{"id":"${portfolio._id}"}'>Share for review</a>
						</li>
					</ul>
				</div>` : ''
			;			

			let topContent = `
				<img src="assets/img/badge8.png" class='web-only' alt="portfolio">
				${self_user_menu}
				<div class="author-date">
					<a class="h4 event-title" href="#null">${portfolio.title}</a>
					<div class="event__date">
						<time class="published" datetime="${portfolio.createdAt}">
							${relative_date}
						</time>
					</div>
					
				</div>	
			`;

			$(modal_top).html(topContent).slideDown('easeIn')

			portfolio.pictures.map(function(currentPicture){
				$(images_cont).append(`							
					<div class="swiper-slide">
						<div class="photo-item" data-swiper-parallax="-300" data-swiper-parallax-duration="500">
							<img src="${currentPicture}" alt="${portfolio.title}">
							<div class="overlay overlay-dark"></div>

							<div class="content">
								<a href="#" class="h6 title">${portfolio.title} <br> (${portfolio.role}) </a>
								<span class="published" style='color:#F8AC09'>${portfolio.client} - <span class='fa fa-map-marker'></span> ${portfolio.location}</span>
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

			let likes_count = portfolio.likes.length

			let writeContent = new Promise(function(resolve){

				let content 	= `				
				<div class="row">
					<div class="col col-lg-7 col-md-7 col-sm-12 col-12">
						<div class="post__author author vcard inline-items">
							<img src="${portfolio.user.userPic}" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" href="user?id=${portfolio.user._id}">${portfolio.user.firstName} ${portfolio.user.lastName} </a> created this <a href="#">portfolio</a>
								<div class="post__date">
									<time class="published" datetime="${portfolio.createdAt}">
										${relative_date}
									</time>
								</div>
							</div>

						</div>


					</div>
					<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
					
						<div class="event-description">
							<br>
							<h6 class="event-description-title c-yellow" style='margin-bottom:20px'>Portfolio Details</h6>
							<div class="place inline-items">
								<svg class="olymp-add-a-place-icon"><use xlink:href="#olymp-add-a-place-icon"></use></svg>
								<span>${portfolio.location}</span>
							</div>

							<div class="place inline-items">
								<svg class="olymp-badge-icon"><use xlink:href="#olymp-badge-icon"></use></svg>
								<span>${portfolio.role}</span>
							</div>
						</div>
						<p class="portfolioDetails" style='max-height:130px !important; overflow-y:scroll'>
							${portfolio.details}
						</p>
					</div>
				</div>

				<div class="post-additional-info inline-items">

					<a href="#like" class="post-add-icon inline-items likeText ${portfolio._id}" data-target='custom-function' data-_fnc="likePortfolio"	data-_param='{"id":"${portfolio._id}"}'>
						<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
						<span> ${likes_count} Like(s)</span>
					</a>


				</div>

				<div class="control-block-button post-control-button">

					<a href="#" class="btn btn-control likeBtn ${portfolio._id}" data-target='custom-function' data-_fnc="likePortfolio"	data-_param='{"id":"${portfolio._id}"}'>
						<svg class="olymp-like-post-icon"><use xlink:href="#olymp-like-post-icon"></use></svg>
					</a>

				</div>				
				`;	
				content = $(modal_body).html(content);

				if(content){resolve('done')}		
			})

			writeContent.then(function(){
				refreshLikes(portfolio)
			})			
		})

	}

	function likePortfolio(params){
		let portfolio = params;
		let user 		= Cookies.get('_id');
		let reqData = {likes : user};
		let likeBtn = $(document).find(`.likeBtn.${portfolio.id}`);	
		let likeText= $(document).find(`.likeText.${portfolio.id}`);	
		let count 	= $(likeText).children('span');
		let method 	= 'PUT'	;
		let action 	= `${devUrl}/api/portfolio/${portfolio.id}`;
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
				let new_count = response.likescount;				
				$(count).html(`${new_count} like(s) `)
			}
		})
	}
	
</script>
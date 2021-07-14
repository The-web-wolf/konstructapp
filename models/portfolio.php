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
										data-title="Hi ${clientName},\nkindly provide review & rating for my project with you. Thank you." 
										data-url = '${reviewLink}'
										>Send on Whatsapp														
									</button>`;
				let email 			= `<button 
										class ='btn bg-dribbble btn-block btn-md no-ajaxy' 
										data-sharer	='email' 
										data-title='Hi ${clientName},\nkindly provide review & rating for my project with you. Thank you.'
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
		let modal 		= $('#detailed-portfolio');
		let modal_top 	= $('#detailed-portfolio .title-information')
		let modal_body	= $('#detailed-portfolio .modal-body 	.main-content');
		let images_cont = $('#detailed-portfolio .modal-body 	.swiper-wrapper');
		let modal_loader= $('#detailed-portfolio .modal-body 	.loader-activity');
		let comment_list= $('#detailed-portfolio .commentBody .comments-list');
		let imagesNav 	= $('#detailed-portfolio .modal-body .btn-prev-without, #detailed-portfolio .modal-body .btn-next-without')

		$(modal).addClass('fullheight')
		$(modal).data('resource', 'dynamic')
		$(modal_loader).fadeIn('linear')		
		$(modal_top).html('').fadeOut()
		$(images_cont).html('')
		$(modal_body).html('')
		$(comment_list).html('').show()
		$(modal).modal('show')

		let portfolio_details = fetch(`${devUrl}/api/portfolio/${params.id}`)
		.then( response => response.json())
		.then(handleErrors)
		.then( portfolio  => {
			portfolio 	= portfolio.data;
			
			//update history

			history.pushState('', `${portfolio.title} | KonstructApp | Demand And Supply Start  Here`, `./portfolio?id=${portfolio._id}`)
			document.title = `${portfolio.title} | KonstructApp | Demand And Supply Start  Here`

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
						<li>
							<a href="#null"  data-target='custom-function' data-_fnc='shareLink' 
							data-_param='{"text":"${portfolio.title}", "url" : "portfolio?id=${portfolio._id}"}'>Share Portfolio</a>
						</li>
					</ul>
				</div> ` : 
				`<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
					<ul class="more-dropdown">
						<li>
							<a href="#null"  data-target='custom-function' data-_fnc='shareLink' 
							data-_param='{"text":"${portfolio.title}", "url" : "portfolio?id=${portfolio._id}"}'>Share Portfolio</a>
						</li>
					</ul>
				</div>`			

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
							<img src="${portfolio.user.userPic}" alt="${portfolio.user.firstName}">

							<div class="author-date">
								<a class="h6 post__author-name fn" href="user?id=${portfolio.user._id}">${portfolio.user.firstName} ${portfolio.user.lastName} </a> created this <a href="#">portfolio</a>
								<div class="post__date">
									<time class="published" datetime="${portfolio.createdAt}">
										${relative_date}
									</time>
								</div>
							</div>

						</div>
						<p class="portfolioDetails web-only" style='max-height:130px !important; overflow-y:scroll'>
							${portfolio.details}
						</p>

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
						<p class="portfolioDetails mobile-only" style='max-height:130px !important; overflow-y:scroll'>
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

					<a href="#" class=" btn btn-control close icon-close" data-dismiss="modal" aria-label="Close">
						<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
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
				let new_count = response.likesCount;				
				$(count).html(`${new_count} like(s) `)
			}
		})
	}
	
</script>
<script type="text/javascript">
	function portfolioToChoose(target,proofUi){
		$('#choose-portfolio .tagPortfolioContainer').hide()		
		$('#choose-portfolio .loader-activity').show()
		$('#choose-portfolio').modal('show');
		let container = $('#chosenPortfolio');		
		let user_id 	= Cookies.get('_id');
		let targetUrl = `${devUrl}/api/user/${user_id}/portfolio`;	
		target 		= document.querySelector(target);
		proofUi 	= document.querySelector(proofUi);
		let getPortfolio = fetch(targetUrl)
			.then( response => response.json())
			.then( portfolio => {
				if (portfolio.count === 0) {
					talert('You have no portfolio')
					$('#create-new-portfolio').modal('show');
				}
				else{
					$(container).html(`
						<option title="None" value='' data-content='<div class="inline-items">
							<div class="author-thumb">
								<img src="assets/img/none.png" alt="None">
							</div>
								<div class="h6 author-title">None</div>

							</div>'>None
						</option>
					`)
					portfolio.data.map(function(portfolio){						
						$(container).append(`
							<option title="${portfolio.title}" value='${portfolio._id}' data-content='<div class="inline-items">
								<div class="author-thumb">
									<img src="${portfolio.pictures[0]}" alt="${portfolio.title}">
								</div>
									<div class="h6 author-title">${portfolio.title}</div>

								</div>'>${portfolio.title}
							</option>
						`)
					})
					$('#choose-portfolio .tagPortfolioContainer').show()		
					$('#choose-portfolio .loader-activity').hide()
				}
			})
			.then( () => {
				$(container).selectpicker('refresh');
			})

		$('#useChosenPortfolio').click(function(){
			let writeTarget = new Promise(function(resolve){
				$(target).val($(container).val());
				let selected_text = container.children("option:selected").attr('title');
				return resolve(selected_text)
			})
			writeTarget.then(function(text){
				let _pid = $("#new-status [name='portfolio']").val()
				if(_pid.length === 0){
					$('#taggedPortfolio').html('').slideUp()
					$(proofUi).css('fill', '#c2c5d9');
				}
				else{
					$(proofUi).css('fill', '#F8AC09');
					$('#taggedPortfolio').html(text).slideDown()
				}				
			})
		})
	}

	function createStatusHandler(){
	  $("#new-status [name='pictures']").on('change', function(){
      var $fileUpload 		= $("#new-status [name='pictures']");
      var $uploadMessage 	= $("#new-status #imageUploadStatus") 
      var fileUploadCount = parseInt($fileUpload.get(0).files.length);
      if (fileUploadCount > 3){
       	talert("You can only upload a maximum of 3 files"); 
       	$fileUpload.value('');
      	$($uploadMessage).text(`No images selected`)
      	$($uploadMessage).css('color', '#c2c5d9')      	
	      $('#new-status .add-options-message .image-upload svg').css('fill', '#c2c5d9')      	    		
      }
      else if (fileUploadCount == 0){
     		$($uploadMessage).text(`No images selected`)
      	$($uploadMessage).css('color', '#c2c5d9') 
	      $('#new-status .add-options-message .image-upload svg').css('fill', '#c2c5d9')      	    		
      }
      else{
      	$($uploadMessage).text(`${fileUploadCount} image(s) selected`)
      	$($uploadMessage).css('color', '#f8ac09')
	      $('#new-status .add-options-message .image-upload svg').css('fill', '#F8AC09')      	    		
      }
	  });  

	  /*Show modal of portfolio on call*/
	  $('#new-status .choose-portfolio-tag').click(function(){	
	  	let tag_portfolio = portfolioToChoose("#new-status [name='portfolio']","#new-status .add-options-message .choose-portfolio-tag svg"); // show portfolio	  	
	  })

	  $('#createStatus').click(function(e){
	  	e.preventDefault();
	  	let statusText = document.querySelector(".status-form [name='statusText']");
	  	let pictures 	 = document.querySelector(".status-form [name='pictures']");

	  	if ( pictures.value === '' && statusText.value === '' ) {
	  		talert('cannot make empty status');
	  		return
	  	}
	  	else{	  		
	  		let form = $('#new-status');
	  		let portfolio = $(form).find('[name=portfolio]');

	  		if ( $(portfolio).val().length === 0) {
	  			$(form).find('[name=portfolio]').remove()
	  		}
			submitForm('new-status', 'statusCreated')
			  
			if ( $(portfolio).val().length === 0) {
				$(form).append(`<input type="hidden" name="portfolio">`);		
				// recreate the portfolio input field if it was removed		
			}
	  	}
	  })
	}	


	function deleteStatus(params){
		let status = params;
		let reqData = {id : status.id}
		let method 	= 'DELETE';
		let action 	= `${devUrl}/api/status/${status.id}`;
		swal({
		  text: `Are you sure you want to delete this status?`,
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
		  			talert(error);
		  			if (response.status === 400) {
		  				loadStatus('sub')
		  			}
		  		}
		  		else{
		  			// Successful
		  			talert('Status deleted');
		  			swal.stopLoading();
	    			swal.close();
	    			hideModals()
		  			loadStatus('sub');
		  		}
		  	})
		  } else {
		    
		  }
		});
	}		

	function updateStatus(){
		submitForm('edit-status', 'statusUpdated')
	}

	function editStatus(params){
		let edit_body = $('#update-status .modal-body');
		let edit_main	= $('#update-status');
		let edit_foot	= $('#update-status .modal-footer');

		$(edit_foot).fadeOut('fast')
		$(edit_body).html(`<div class="loader-activity"><div class="indeterminate"></div></div>`);
		$(edit_main).modal('show')
		$(edit_main).find('form').attr('data-action', `${devUrl}/api/status/${params.id}`)

		let status_details = fetch(`${devUrl}/api/status/${params.id}`)
		.then( response => response.json())
		.then(status => {
			status = status.data;
			let modal_content = 
			`<div class="form-group label-floating">
					<label class="control-label">Edit Status Text</label>
					<textarea class='form-control' name='statusText' minlength="10">${status.statusText}</textarea>
				</div>
				`;
				$(edit_body).html(modal_content)
				$(edit_foot).fadeIn('slow')
		})
	}


	function expandStatus(params){
		let modal 			= $('#detailed-status');
		let modal_top 	= $('#title-information')
		let modal_body	= $('#detailed-status .modal-body #main-content');
		let images_cont = $('#detailed-status .modal-body .swiper-wrapper');
		let modal_loader= $('#detailed-status .modal-body .loader-activity');
		let comment_list= $('#detailed-status .commentBody .comments-list');
		let imagesNav 	= $('#detailed-status .modal-body .btn-prev-without, #detailed-status .modal-body .btn-next-without')


		$(modal).addClass('fullheight')
		$(modal).data('resource', 'dynamic')
		$(modal_loader).fadeIn('linear')		
		$(modal_top).html('').fadeOut()
		$(images_cont).html('').hide()
		$(modal_body).html('')
		$(comment_list).html('')
		$(modal).modal('show')

		let authtk  = Cookies.get('_token')		

		let status_details = fetch(`${devUrl}/api/status/${params.id}`, {
			headers : {
				Authorization : `Bearer ${authtk}` 
			}
		})
		.then( response => response.json())
		.then(response => {

			return response;			
		})
		.then( response  => {
			let status 	= response.data;

			//update history
			history.pushState('', `${status.statusText} | KonstructApp | Demand And Supply Start  Here`, `./feed?id=${status._id}`)
			document.title = `${status.statusText} | KonstructApp | Demand And Supply Start  Here`;

			let relative_date	= moment(status.createdAt).fromNow();			
			let self_user 		= status.user._id === Cookies.get('_id')	? true : false;

			var $isText 	 	= status.statusText.length ? true : false;
			var $isPicture 	 	= status.pictures.length === 1 && status.pictures[0].length ? true : false;
			var $isPictures 	= status.pictures.length > 1 ? true : false;
			var $isPortfolio 	= status.portfolio && typeof status.portfolio === 'object' ?  true : false;

			let poster = '' ;
			let portfolioContent = '';
			let pictureContent = '';

			if ($isPicture) {
				poster 	= 'posted a photo';
			}
			if ($isPictures){
				poster 	= 'posted ' + status.pictures.length + ' photos';				
			}

			if($isPortfolio){
				poster = 'tagged a portfolio';

				if (!$isPictures && !$isPicture) {
					portfolioContent = `					
						<div class="post-video" style='border: 1px solid #34374b;'>
							<div class="video-thumb">
								<img src="${status.portfolio.pictures[0]}" alt="photo" style='height:194px;width:100%;display:inline;object-fit:cover'>
								<a href="#" class="play-video" data-target='custom-function' data-_fnc='expandPortfolio' data-_param='{"id":"${status.portfolio._id}"}'>
									<svg class="olymp-magnifying-glass-icon">
										<use xlink:href="#olymp-magnifying-glass-icon"></use>
									</svg>
								</a>
							</div>
				
							<div class="video-content">
								<a href="#" class="h4 title">${status.portfolio.title}</a>
							</div>
						</div>`				
				}
				else{
					// Show a mini expand to view portfolio button
					portfolioContent = `<a href="#" data-target='custom-function' data-_fnc='expandPortfolio' data-_param='{"id":"${status.portfolio._id}"}' class="more-comments">View Tagged Portfolio <span>+</span></a>`
				}
			}

			let topContent = `
				<div class="post__author author vcard inline-items">
					<img src="${status.user.userPic}" alt="author">

					<div class="author-date">
						<a class="h6 post__author-name fn" href="user?id=${status.user._id}">${status.user.firstName} ${status.user.lastName} </a> ${poster}
						<div class="post__date">
							<time class="published" datetime="${status.createdAt}">
								${relative_date}
							</time>
						</div>
					</div>

				</div>
			`;

			if (self_user) {
				topContent += `
				<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
					<ul class="more-dropdown">
						<li>
							<a href="#null"  data-target='custom-function' data-_fnc='editStatus' data-_param='{"id":"${status._id}"}'>Edit status</a>
						</li>
						<li>
							<a href="#null" data-target='custom-function' data-_fnc='deleteStatus' data-_param='{"id":"${status._id}"}'>Delete status</a>
						</li>
						<li>
							<a href="#null"  data-target='custom-function' data-_fnc='shareLink' 
							data-_param='{"text":"${status.statusText}", "url" : "feed?id=${status._id}"}'>Share Status</a>
						</li>
					</ul>
				</div>`
			}
			else{
				topContent += `
				<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
					<ul class="more-dropdown">
						<li>
							<a href="#null"  data-target='custom-function' data-_fnc='shareLink' 
							data-_param='{"text":"${status.statusText}", "url" : "feed?id=${status._id}"}'>Share Status</a>
						</li>
					</ul>
				</div>`				
			}

			if ($isText) {
				topContent += `
				<br>
				<p class="statusDetails">
					${status.statusText}
				</p>`				
			}

			$(modal_top).html(topContent).slideDown('easeIn')

			if($isPicture || $isPictures){
				status.pictures.map(function(currentPicture){
					$(images_cont).append(`							
						<div class="swiper-slide">
							<div class="photo-item" data-swiper-parallax="-300" data-swiper-parallax-duration="500">
								<img src="${currentPicture}" alt="Status Image">
								<div class="overlay overlay-dark"></div>
							</div>
						</div>`
					)				
				})	
				$(images_cont).show()		
			}
			activateSwiper()		
			if ($isPictures) {
				$(imagesNav).show()				
			}
			else{
				$(imagesNav).hide()// hide swiper navigation if only one image
			}

			$(modal_loader).hide()

			let likes_count 	= status.likes.length;
			let content 	= `				
				${portfolioContent}

				<div class="post-additional-info inline-items">

					<a href="#like" class="post-add-icon inline-items likeText ${status._id}" data-target='custom-function' data-_fnc="likeStatus"	data-_param='{"id":"${status._id}"}'>
						<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
						<span> ${likes_count} Like(s)</span>
					</a>


					<div class="comments-shared">
						<a href="#" class="post-add-icon inline-items">
							<svg class="olymp-speech-balloon-icon"><use xlink:href="#olymp-speech-balloon-icon"></use></svg>
							<span class='${status._id}'></span>
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
			return status
		})
		.then(status => {
			refreshLikes(status)
			return status
		})
		.then(status => loadStatusComments(status._id))
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

	function likeStatus(params){
		let status 	= params;
		let user 	= Cookies.get('_id');
		let reqData = {likes : user};
		let likeBtn = $(document).find(`.likeBtn.${status.id}`);	
		let likeText= $(document).find(`.likeText.${status.id}`);	
		let count 	= $(likeText).children('span');
		let method 	= 'PUT'	;
		let action 	= `${devUrl}/api/status/${status.id}`;
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

	function makeStatusComment(params){
		let commentField = $('#commentForm [name="statusComments"]');
		if (commentField.val() < 1) {
			talert('Write a comment')
		}
		else{
			submitForm('commentForm', 'statusCommentMade')
		}
	}	

	function deleteStatusComment(params){
		let comment = params;
		let statusId 	= params.status_id;
		let reqData = {id : comment.id}
		let method 	= 'DELETE';
		let action 	= `${devUrl}/api/statuscomment/${comment.id}`;

  	submitData(reqData,method,action, (error, response) => {
  		if(error){
  			talert(error)
  		}
  		else{
  			// Successful
  			talert('comment deleted');
  			loadComments(statusId, 'sub');
  		}
  	})
	}


	function loadStatusComments(status, callType){
		let root = $('#statusComment');

		if(callType === 'sub'){
			$(root).find('.commentBody .comments-list').html('')
		}

		// Show the comment form
		$(root).find('.comment_form_container').html(`
		<form class="comment-form inline-items " action='#' data-action='${devUrl}/api/statuscomment' data-method='POST' id='commentForm'>

			<div class="post__author author vcard inline-items">
				<img src="<?php echo $user_data['userPic'] ?>" alt="author">

				<div class="form-group with-icon-right ">
					<textarea class="form-control" placeholder="" name='statusComments' required></textarea>
					<input type='hidden' name='status' value='${status}'></input>
					<div class="add-options-message">
						<button class="btn options-message" style='padding:0px' data-target='custom-function' data-_fnc='makeStatusComment'>
							<svg class="olymp-camera-icon"><use xlink:href="#olymp-play-icon"></use></svg>
						</button>
					</div>
				</div>
			</div>

		</form>`); 

		let requestComment = fetch(`${devUrl}/api/statuscomment/${status}`)
		.then(response => response.json())
		.then(comment => {
			let commentData 	= comment.data;
			let commentCount 	= comment.statusComment;

			/*Update the count of the comments*/
			$(document).find(`.comments-shared a span`).each(function(){
				if (commentData.length > 0) {
					if ($(this).hasClass(commentData[0].status)) {
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
									<a href="#null" data-target='custom-function' data-_fnc='deleteStatusComment' data-_param='{"id":"${comment._id}", "status_id" : "${comment.status}" }'>Delete Comment</a>
								</li>
							</ul>
						</div>
					`;
					let show_dots		= comment.user._id === Cookies.get('_id') ? threedots : '';

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

							<p>${comment.statusComments}</p>
						</li>`
					)
					if (writeComment) {resolve('done!')}
				})			
			})
			writeComments.then(() => $(".commentBody").animate({ scrollTop: $('.commentBody').prop("scrollHeight")}, 1000) )
		})
	}				

</script>
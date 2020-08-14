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
				if (portfolio.length === 0) {
					talert('You have no portfolio')
					$('#create-new-portfolio').modal('show');
				}
				else{
					portfolio.data.map(function(portfolio){
						$(container).html(`
							<option title="None" value='' data-content='<div class="inline-items">
								<div class="author-thumb">
									<img src="assets/img/none.png" alt="None">
								</div>
									<div class="h6 author-title">None</div>

								</div>'>None
							</option>
						`)
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
	  		submitForm('new-status', 'statusCreated')
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
		let modal 		= $('#detailed-status');
		let modal_top 	= $('#title-information')
		let modal_body	= $('#detailed-status .modal-body #main-content');
		let images_cont = $('#detailed-status .modal-body .swiper-wrapper');
		let modal_loader= $('#detailed-status .modal-body .loader-activity');
		let comment_list= $('#detailed-status .commentBody .comments-list');
		let imagesNav 	= $('#detailed-status .modal-body .btn-prev-without, #detailed-status .modal-body .btn-next-without')

		$(modal_loader).fadeIn('linear')		
		$(modal_top).html('').fadeOut()
		$(images_cont).html('')
		$(modal_body).html('')
		$(comment_list).html('')
		$(modal).modal('show')

		let authtk  = Cookies.get('token')		

		let status_details = fetch(`${devUrl}/api/status/${params.id}`, {
			headers : {
				Authorization : `Bearer ${authtk}` 
			}
		})
		.then( response => response.json())
		.then( response  => {
			let status 	= response.data;
			let relative_date	= moment(status.createdAt).fromNow();
			
			let self_user = status.user._id === Cookies.get('_id')	? true : false;

			var $isText 	 	= status.statusText.length ? true : false;
			var $isPicture 	 	= status.pictures.length === 1 && status.pictures[0].length ? true : false;
			var $isPictures 	= status.pictures.length > 1 ? true : false;
			var $isPortfolio 	= 'portfolio' in status && status.portfolio ? true : false;

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

				let portfolio_details = status.portfolio.details.match(/(.{0,150}\w)\s/)[1]+` <a href='#' class='readmore' data-target='custom-function' data-_fnc='expandStatus' data-_param='{"id":"${status.portfolio._id}"}'> <b> ... </b> </a>`;

				portfolioContent = `					
					<div class="post-video">
						<div class="video-thumb">
							<img src="${status.portfolio.pictures[0]}" alt="photo" style='height:194px;width:197px;display:inline'>
							<a href="#" class="play-video">
								<svg class="olymp-magnifying-glass-icon">
									<use xlink:href="#olymp-magnifying-glass-icon"></use>
								</svg>
							</a>
						</div>
			
						<div class="video-content">
							<a href="#" class="h4 title">${status.portfolio.title}</a>
							<p>${portfolio_details}</p>
						</div>
					</div>`				
			
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
					</ul>
				</div>`
			}

			if ($isText) {
				topContent += `
				<br>
				<p class="statusDetails" style='max-height:130px !important; overflow-y:scroll'>
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
			}

			if ($isPictures) {
				$(imagesNav).show()
				activateSwiper()
			}
			else{
				$(imagesNav).hide()
			}

			$(modal_loader).hide()


			let likes_count 	= status.likes.length;
			let content 	= `				
				<div class="row">
					<div class="col col-lg-7 col-md-7 col-sm-12 col-12">

					</div>
				</div>

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

					<a href="#" class="btn btn-control likeBtn ${status._id}" data-target='custom-function' data-_fnc="likeStatus"	data-_param='{"id":"${status._id}"}'>
						<svg class="olymp-like-post-icon"><use xlink:href="#olymp-like-post-icon"></use></svg>
					</a>

					<a href="#" class="btn btn-control commentBtn" >
						<svg class="olymp-comments-post-icon"><use xlink:href="#olymp-comments-post-icon"></use></svg>
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
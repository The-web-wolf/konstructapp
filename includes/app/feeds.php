<script type="text/javascript">


	$(document).ready(function(){

	// check if bid is  passed in the url

	let singleStatus = findGetParameter('id')

	if(singleStatus){
		let pushData = {id : singleStatus}
		expandStatus(pushData)
	}		
	})

	/* CORE SCRIPTS */
	let status_page = 1;
	let users_page 	= 1;	

	function loadBids(callType){
		if (callType === 'sub') {
			$('#bids-section').html(`
			<div class="ui-block-title no-border">
				<div class="h5 title">Bids</div>
					<div class="align-right">
						<a href="bids" class="more" >See all &nbsp <span class="fa fa-long-arrow-right">	</span></a>
					</div>			
			</div>
			<div class="loader-activity">
			  <div class="indeterminate"></div>
			</div>
			<div class="owl-carousel ui-blocks">
	
			</div>`)
		}
		let targetUrl = `${devUrl}/api/bid`;
		$.ajax({
			url : targetUrl,	  
			processData : false,
		  contentType : false,
		}).done(function(response){

			let response_data		= response.data
			let response_count	= response.count;

			response_data.map(function(currentValue){
				writeFeedBids(currentValue)
			})

			$('#bids-section .loader-activity').fadeOut('slow', function(){
				$('#bids-section').fadeIn('linear');
				
				$('#portfolio-section').show()
			})				

		})
		.fail(function(){
			$('#bids-section').fadeOut();
		})
	}

	function loadPortfolio(callType){
		let root = $('#portfolio-section');
		if (callType === 'sub') {
			$(root).html(`
			<div class="ui-block-title no-border" style="padding-left: 0px">
				<div class="h5 title">Portfolio</div>
					<div class="align-right">
						<a href="portfolio" class="more" >See all &nbsp <span class="fa fa-long-arrow-right">	</span></a>
					</div>			
			</div>
			<div class="loader-activity">
			  <div class="indeterminate"></div>
			</div>			
			<div class="owl-carousel ui-blocks">
			
			</div>	`)
		}
		let targetUrl = `${devUrl}/api/portfolio`;
		$.ajax({
			url : targetUrl,	  
			processData : false,
		  contentType : false,
		}).done(function(response){

			let response_data	= response.data
			let response_count= response.count;
			response_data.map(function(currentValue){
				writeFeedPortfolio(currentValue)
			})

			$(root).find('.loader-activity').fadeOut('slow', function(){
				$(root).fadeIn('linear');
			})	

		})
		.fail(function(){
			$('#portfolio-section').fadeOut();
		})
	}
	
	function shuffle(array) {
		var currentIndex = array.length, temporaryValue, randomIndex;

		// While there remain elements to shuffle...
		while (0 !== currentIndex) {

			// Pick a remaining element...
			randomIndex = Math.floor(Math.random() * currentIndex);
			currentIndex -= 1;

			// And swap it with the current element.
			temporaryValue = array[currentIndex];
			array[currentIndex] = array[randomIndex];
			array[randomIndex] = temporaryValue;
		}

		return array;
		}



	function loadUsers(callType){
		let root = $('#users-section');
		if (callType === 'sub') {
			$(root).html(`
			<div class="loader-activity">
			  <div class="indeterminate"></div>
			</div>			
			<div class="owl-carousel ui-blocks">
			
			</div>	`)
		}
		let page 	= Math.floor(Math.random() * 6) // update manuallly until dedicated route for feeds users
		let limit 	= 50;
		let targetUrl = `${devUrl}/api/usersprofilepic?limit=${limit}&page=${page}`;
		$.ajax({
			url : targetUrl,	  
			processData : false,
		  	contentType : false,
		  	type : 'GET',
		}).done(function(response){

			let response_data	= response.data
			let response_count= response.count;
			var keyArray = $.map(response_data, function (value, key) { return value; });
			shuffle(keyArray);
			
			response_data = JSON.stringify(keyArray); // convert back to json
			response_data = JSON.parse(response_data);

			response_data.map(function(currentValue){			
				writeFeedUsers(currentValue)
			})

			$(root).find('.loader-activity').fadeOut('slow', function(){
				$(root).fadeIn('linear');
			})	

		})
		.fail(function(){
			$(root).find('.loader-activity').hide()
		})
	}

	function loadStatus(callType){

		let root = document.getElementById('newsfeed-items-grid');
		let loader = $('#load-more-feed-status');

		$(loader).fadeOut('slow');

		if (callType === 'sub') {
			$(root).html('<div class="loader-activity"><div class="indeterminate"></div></div>');
			status_page = 1;
			// reset container if call is re trigerred
		}

		let _id = Cookies.get('req_id'); // user ID in the request
		let uid = Cookies.get('_id'); // session user ID;

		// get token

		let authtk  = Cookies.get('_token')

		/* Load Bids */  

		let targetUrl = `${devUrl}/api/status?limit=5&page=${status_page}`;

	$.ajax({
		url : targetUrl,	  
		type : 'GET',
		processData : false,
		contentType : false,
		headers: { 'Authorization': `Bearer ${authtk}` },
		}).done(function(response){
			$(root).find('.loader-activity').slideUp()
			let response_data	= response.data
			let response_count= response.data.length;

			response_data.map(function(currentValue){
				writeFeedStatus(currentValue, response)
			})

			if (response_count == 0) {
				talert('Caught up with the latest content')
				$(root).addClass('caught-up')
			}
			else{
				$(loader).html(
					`<svg class="olymp-three-dots-icon">
						<use xlink:href="#olymp-three-dots-icon"></use>
					</svg>`
				).fadeIn()		
			}
		})
		.fail(function(){
			$('#newsfeed-items-grid').html(`<section class="" style='padding-top:120px;padding-bottom:120px'>
				<div class="container">
					<div class="row">
						<div class="col col-xl-4 col-lg-12 col-md-12 col-12 m-auto">
							<div class="logout-content">
								<div class="logout-icon">
									<i class="fas fa-network-wired"></i>
								</div>
								<h6>Uh Oh!</h6>
								<p class="heading-text">
									Sorry, KonstructApp requires an active internet connection
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>`)
		})
	}

	let loadMoreFeedStatus = () => {
		if( !$("#newsfeed-items-grid").hasClass("caught-up") ){
			status_page++;
			$('#load-more-feed-status').html('<div class="loader-activity"><div class="indeterminate"></div></div>');
			loadStatus();				
		}
		else{
			talert('Caught up with the latest content')
		}
	}

	// load more content when scrolled to bottom of the page
	$(window).scroll(function() {
		if($(window).scrollTop() === $(document).height() - $(window).height()) {
			loadMoreFeedStatus();
		}
	});

	// alternatively, load content on load more button click
	$('#load-more-feed-status').on('click', function(e) {
		e.preventDefault()
		loadMoreFeedStatus()
	})

	function writeFeedBids(current_bid){
		let relative_date	= moment(current_bid.createdAt);
		relative_date 		= relative_date.fromNow();

		let statusUi;

		switch(current_bid.status){
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

		let $bidsOwl = $('#bids-section .ui-blocks').owlCarousel({
			margin:15,
	    responsiveClass:true,
	    dots : false,
	    responsive:{
	        0:{
	          items:1,	            
	        },
	        300:{
	        	items : 1,
	        	stagePadding: 30,
	        },
	        500:{
	        	items : 2,
	        	stagePadding: 13,
	        },
	        850:{
	            items:3,
	            stagePadding :15
	        },
	        1000:{
	        	items : 3,
	        	stagePadding: 20
	        },
	        1400:{
	            items:4,
	            stagePadding: 20,
	        }
	    }
		})		

		let writeContent = new Promise (function(resolve,reject){
			let writeData = `	
			<!-- Single post item -->
				<ul class="widget w-last-video">
					<li data-target='custom-function' data-_fnc='expandBid' data-_param='{"id":"${current_bid._id}"}'><img src="${current_bid.pictures[0]}" alt="${current_bid.title}" class='custom-bg'></li>
					<div class="outside-content">
						<h5>${current_bid.title}</h5>
						<h5>${statusUi} - <time class="published" datetime="${current_bid.createdAt}">${relative_date}</time></h5>
					</div>
				</ul>
				<!-- END -- Single post item -->`
			let write = $bidsOwl.trigger('add.owl.carousel', [writeData])
			if (write) { resolve('done')}
		})
		writeContent.then(function(){
			$bidsOwl.trigger('refresh.owl.carousel');		
		})					
	}

	function writeFeedUsers(current_user){
		let relative_date	= moment(current_user.createdAt);
		relative_date 		= relative_date.fromNow();

		let starRating = 5;

		let $bidsOwl = $('#users-section .ui-blocks').owlCarousel({
			margin:15,
			responsiveClass:true,
			dots : false,
			nav	: false,
			loop : false,
			responsive:{
				0:{
				items:2,	
				stagePadding : 10,            
				},
				300:{
					items : 2,
					stagePadding: 50,
				},
				500:{
					items : 4,
					stagePadding: 13,
				},
				850:{
					items:5,
					stagePadding :15
				},
				1000:{
					items : 5,
					stagePadding: 20
				},
				1400:{
					items:7,
					stagePadding: 50,
				}
			}
		})		

		let writeContent = new Promise (function(resolve,reject){
			let userIsVerified = current_user.userIdentityVerify ? '<span class="fa fa-check-circle text-primary">' : '';
			let writeData = `	
			<!-- Single post item -->
				<ul class="widget w-last-video">
					<li>
						<a href="user?id=${current_user._id}">						
							<img src="${current_user.userPic}" class='custom-bg' alt="User picture">
						</a>
					</li>
					<div class="outside-content">
						<a href="user?id=${current_user._id}">	
							<h5 class='name'>${current_user.firstName} ${current_user.lastName} ${userIsVerified} </h5> 
							<h5 class='profession'>${current_user.occupation}</h5>
						</a>
					</div>
				</ul>
				<!-- END -- Single post item -->`
			let write = $bidsOwl.trigger('add.owl.carousel', [writeData])
			if (write) { resolve('done')}
		})
		writeContent.then(function(){
			$bidsOwl.trigger('refresh.owl.carousel');		
		})					
	}		

	function writeFeedPortfolio(current_portfolio){
		let relative_date	= moment(current_portfolio.createdAt);
		relative_date 		= relative_date.fromNow();
		let portfolio_user 	= current_portfolio.user;

		let $portfolioOwl = $('#portfolio-section .ui-blocks').owlCarousel({
			margin:10,
	    responsiveClass:true,
	    dots : false,
	    responsive:{
	        0:{
	          items:1,
	        	stagePadding: 5,		            
	        },
	        300:{
	        	items : 1,
	        	stagePadding: 25,
	        },
	        500:{
	        	items : 2,
	        	stagePadding: 13,
	        },
	        850:{
	            items:2,
	            stagePadding :15
	        },
	        1000:{
	        	items : 2,
	        	stagePadding: 20
	        },
	        1400:{
	            items:3,
	            stagePadding: 20,
	        }
	    }
		})	



		let writeContent = new Promise (function(resolve,reject){

			let writeData = `	
				<div class="ui-block">

					<!-- Single portfolio -->
					
					<article class="hentry blog-post">
					
						<div class="post-thumb">
							<a href="#expand" data-target='custom-function' data-_fnc='expandPortfolio' data-_param='{"id":"${current_portfolio._id}"}'>
								<img src="${current_portfolio.pictures[0]}" class='custom-bg' alt="photo">
							</a>
						</div>
					
						<div class="post-content">
							<a href="#expand" data-target='custom-function' data-_fnc='expandPortfolio' data-_param='{"id":"${current_portfolio._id}"}' class="h5 post-title">${current_portfolio.title}</a>
					
							<div class="author-date">
								by
								<a class="h6 post__author-name fn" href="user?id=${portfolio_user._id}">${portfolio_user.firstName + ' ' + portfolio_user.lastName}</a>
								<div class="post__date">
									<time class="published" datetime="${current_portfolio.createdAt}">
										- ${relative_date}
									</time>
								</div>
							</div>
					
						</div>
					
					</article>
					
					<!-- ... end single portfolio -->
				</div>	`
			let write = $portfolioOwl.trigger('add.owl.carousel', [writeData])
			if (write) { resolve('done')}
		})
		writeContent.then(function(){
			$portfolioOwl.trigger('refresh.owl.carousel');		
		})					
	}	

	function writeFeedStatus(current_status, all_data){
		let root = document.getElementById('newsfeed-items-grid');
		
		let status_details= current_status.statusText.replace(/(<([^>]+)>)/ig,"");
		let relative_date	= moment(current_status.createdAt);
		relative_date 		= relative_date.fromNow();

		let self_user = current_status.user._id === Cookies.get('_id')	? true : false;

		let statusText = current_status.statusText; ;
		var length = 200;
		statusText = statusText.length > length ? statusText.substring(0, length - 3) + `<a href='#' class='readmore' data-target='custom-function' data-_fnc='expandStatus' data-_param='{"id":"${current_status._id}"}'> <b> ... </b> </a>` : statusText;

		let self_user_menu = self_user === true ? 
		`<div class="more" style='float:right'><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
			<ul class="more-dropdown">
				<li>
					<a href="#null"  data-target='custom-function' data-_fnc='editStatus' data-_param='{"id":"${current_status._id}"}'>Edit</a>
				</li>
				<li>
					<a href="#null" data-target='custom-function' data-_fnc='deleteStatus' data-_param='{"id":"${current_status._id}"}'>Delete</a>
				</li>
				<li>
					<a href="#null"  data-target='custom-function' data-_fnc='shareLink' 
					data-_param='{"text":"${current_status.statusText}", "url" : "feed?id=${current_status._id}"}'>Share Status</a>
				</li>
			</ul>
		</div>` 
		: 
		`<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
			<ul class="more-dropdown">
				<li>
					<a href="#null"  data-target='custom-function' data-_fnc='shareLink' 
					data-_param='{"text":"${current_status.statusText}", "url" : "feed?id=${current_status._id}"}'>Share Status</a>
				</li>
			</ul>
		</div>`			
		;

		let likes_count = current_status.likes.length;

		let comments_count = all_data.count;

		var $isPicture 	  	= current_status.pictures.length === 1 ? true : false;
		$isPicture 			=	current_status.pictures[0].length > 1 ? true : false; // check if array first child is empty
		var $isPictures 	= current_status.pictures.length > 1 ? true : false;
		var $isPortfolio 	= current_status.portfolio  ?  true : false;

		let poster = '' ;
		let portfolioContent = '';
		let pictureContent = '';

		if ($isPicture) {
			poster 	= 'posted a photo';
			pictureContent = `
				<div class="post-thumb">
					<a href="#expand" data-target='custom-function' data-_fnc='expandStatus' data-_param='{"id":"${current_status._id}"}'> 
						<img src="${current_status.pictures[0]}" class='custom-bg' alt="photo">
					</a>
				</div>`
		}

		if ($isPictures){
			poster 	= 'posted ' + current_status.pictures.length + ' photos';
			let pictureGrid = '';
			var temp = "<div class='cell' style='width:{width}px; height: {height}px; background-image: url({index});'></div>";
			var w = 1;
			var h = 100;

			current_status.pictures.map(function(currentPicture){
				w = 80 +  80 * Math.random() << 0;
				if ($(window).width() >= 800) {
					w = 180 + 180 * Math.random() << 0;
					h = 200;
				}
				pictureGrid  += temp.replace(/\{height\}/g, h).replace(/\{width\}/g, w).replace("{index}", currentPicture);
			})

			pictureContent = `<div class='statusImages' data-target='custom-function' data-_fnc='expandStatus' data-_param='{"id":"${current_status._id}"}'>
					${pictureGrid}
				</div>`
			
		}

		if($isPortfolio){
			poster = 'tagged a portfolio';

				// Show a mini expand to view portfolio button
				portfolioContent = `<a href="#" data-target='custom-function' data-_fnc='expandPortfolio' data-_param='{"id":"${current_status.portfolio}"}' class="more-comments">View Tagged Portfolio <span>+</span></a>`
			
		}

		let writeContent = new Promise (function(resolve,reject){
			let write = $(root).append(`			

				<div class="ui-block">
					<!-- Post -->
					
					<article class="hentry post">
					
							<div class="post__author author vcard inline-items">
								<img src="${current_status.user.userPic}" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="user?id=${current_status.user._id}">${current_status.user.firstName}  ${current_status.user.lastName}</a> ${poster}
									<div class="post__date">
										<time class="published" datetime="${current_status.createdAt}">
											${relative_date}
										</time>
									</div>
								</div>
					
								${self_user_menu}
					
							</div>
					
							<p data-target='custom-function' data-_fnc='expandStatus' data-_param='{"id":"${current_status._id}"}'>
								${statusText}
							</p>

							${pictureContent}

							${portfolioContent}
					
							<div class="post-additional-info inline-items">
					
								<a href="#like" class="post-add-icon inline-items likeText ${current_status._id}" data-target='custom-function' data-_fnc="likeStatus"	data-_param='{"id":"${current_status._id}"}'>
									<svg class="olymp-heart-icon">
										<use xlink:href="#olymp-heart-icon"></use>
									</svg>
									<span>${current_status.likes.length} like(s)</span>
								</a>
					
								<!-- <div class="comments-shared">
					
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-speech-balloon-icon">
											<use xlink:href="#olymp-speech-balloon-icon"></use>
										</svg>
										<span>0 comment(s)</span>
									</a>
								</div> -->
					
					
							</div>
					
							<div class="control-block-button post-control-button">
					
								<a href="#" class="btn btn-control likeBtn ${current_status._id}" data-target='custom-function' data-_fnc="likeStatus"	data-_param='{"id":"${current_status._id}"}'>
									<svg class="olymp-like-post-icon">
										<use xlink:href="#olymp-like-post-icon"></use>
									</svg>
								</a>
					
								<a href="#" class="btn btn-control" data-target='custom-function' data-_fnc='expandStatus' data-_param='{"id":"${current_status._id}"}'>
									<svg class="olymp-comments-post-icon">
										<use xlink:href="#olymp-comments-post-icon"></use>
									</svg>
								</a>

					
							</div>
					
						</article>
					
					<!-- .. end Post -->				
				</div>

			`)
			if (write) { resolve('done')}
		})

		writeContent.then(function(){
			if ($isPictures) {
				var wall = new Freewall(".statusImages")
				wall.reset({
					selector: '.cell',
					animate: true,
					cellW: 20,
					cellH: 100,		
					gutterX:5,
					gutterY:5,			
					onResize: function() {
						wall.fitWidth();
					}
				});
				wall.fitWidth();
				// for scroll bar appear;
				$(window).trigger("resize");				
							
			}
			refreshLikes(current_status)			
		})		
	}
	

	function writeFeed(){
		$('#bids-section').show()
		let write_users = new Promise(function(resolve,error){
			loadUsers();
			resolve('fetched')
		})
		write_users.then(function(){
			let write_portfolio = new Promise(function(resolve,error){
				loadPortfolio()
				resolve('fetched')
			})			
			write_portfolio.then(function(){
				let write_bids = new Promise(function(resolve,error){
					loadBids();
					resolve('fetched')
				})
				write_bids.then(function(){
					let write_status = new Promise(function(resolve,error){
						loadStatus();
						resolve('fetched')
					})
				})
			})
		})
	}


</script>
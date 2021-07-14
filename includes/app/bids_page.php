<script type="text/javascript">


	$(document).ready(function(){

		// check if bid is  passed in the url

		let singleBid = findGetParameter('id')

		if(singleBid){
			let pushData = {id : singleBid}
			expandBid(pushData)
		}		
	})

	const root 	= document.querySelector('#all-bid-container,#featured-bid-container');
	let page 	= 1;

	function writeAllBids(current_bid, all_data){
		let relative_date	= moment(current_bid.createdAt);
		relative_date 		= relative_date.fromNow();
		let short_details = current_bid.details.match(/(.{0,150}\w)\s/)[1]+` <a href='#' class='readmore' data-target='custom-function' data-_fnc='expandBid' data-_param='{"id":"${current_bid._id}"}'> <b> ... </b> </a>`; // cuts first 5 characters

		let statusUi;

		switch(current_bid.status){
			case 'open' :
				statusUi = `<a href="#null" class="post-category bg-green">OPEN</a>`;
				break;
			case 'awarded' : 
				statusUi = `<a href="#" class="post-category bg-red">AWARDED</a>`;
				break;/*
			case 'closed' : 
				statusUi = `<a href="#" class="post-category bg-red">CLOSED</a>`
				break;*/
			default :
				statusUi = `<a href="#" class="post-category bg-green">OPEN</a>`;
				break;
		}

		let self_user = current_bid.user._id === Cookies.get('_id')	? true : false;


		let makeAwarded = current_bid.status === 'open'? `<li><a href="#null" data-target='custom-function' data-_fnc='awardBid' data-_param='{"id":"${current_bid._id}","title":"${current_bid.title}"}'>Mark Awarded</a></li>` : '';			

		let likes_count = current_bid.likes.length;

		let comments_count = all_data.commentsCount;


		let writeContent = new Promise (function(resolve,reject){
			let write = $('#all-bid-container .row').append(`	
			<!-- Single post item -->
				<div class='col-md-6 col-lg-4 col-xl-3'>
					<ul class="widget w-last-video">
					<li data-target='custom-function' data-_fnc='expandBid' data-_param='{"id":"${current_bid._id}"}'><img src="${current_bid.pictures[0]}" alt="${current_bid.title}" class='custom-bg'></li>
					<div class="outside-content">
						<h5>${current_bid.title}</h5>
						<h5>${statusUi} - <time class="published" datetime="${current_bid.createdAt}">${relative_date}</time></h5>
					</div>
				</ul>
				</div>
				<!-- END -- Single post item -->`)
			if (write) { resolve('done')}
		})

		writeContent.then(function(){
			refreshLikes(current_bid)			
		})		
	}

	function loadBids(callType){

		if (callType === 'sub') {
			$(root).fadeOut().html('') // reset containers if call is re trigerred
			page = 1; // restart count
		}

		let _id = Cookies.get('req_id'); // user ID in the request
		let uid = Cookies.get('_id'); // session user ID;

		let self_user = uid == _id ? true : false; // returns true if the user profile in view is that of the browsing user

		/* Load Bids */  

		let targetUrl = `${devUrl}/api/bid?limit=8&page=${page}`;

		$.ajax({
			url : targetUrl,	  
			processData : false,
		  contentType : false,
		}).done(function(response){

			$('.loader-activity').hide()
			let response_data	= response.data
			let response_count= response.data.length;

			$('#all-bid-container').fadeIn()

			response_data.map(function(currentValue){
				writeAllBids(currentValue, response)
			})
			if (response_count == 0) {
				talert('Caught up with the latest content')
			}			

		}).fail(function(response){
				$('#root').html(`
					<section class="" style='padding-top:120px;padding-bottom:120px'>
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


	$('#load-more-bids').on('click', function() {
		page++;
		$(root).append('<div class="loader-activity"><div class="indeterminate"></div></div>');
		loadBids();
	});

	$(document).ready(function(){
		createBidHandler();
		loadBids();
		profilePictures();
	})
</script>
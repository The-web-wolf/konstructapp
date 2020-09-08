
<script type="text/javascript">
	const root = document.querySelector('#all-portfolio-container .all-portfolio')

	let page = 1;

	function writeAllPortfolio(current_portfolio){
		let portfolio_details = current_portfolio.details.replace(/(<([^>]+)>)/ig,"");
		let write = $(root).append(`			
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
				<div class="ui-block video-item">
					<div class="video-player">
						<img src="${current_portfolio.pictures[0]}" alt="${current_portfolio.title}" class="custom-bg" style='height:212px'>
						<a href="#expand" class="play-video" data-target='custom-function' data-_fnc='expandPortfolio' data-_param='{"id":"${current_portfolio._id}"}'>
							<svg class="olymp-magnifying-glass-icon"><use xlink:href="#olymp-magnifying-glass-icon"></use></svg>
						</a>
						<div class="overlay overlay-dark"></div>
				
					</div>
				
					<div class="ui-block-content video-content">
						<a href="#expand" class="h6 title" data-target='custom-function' data-_fnc='expandPortfolio' data-_param='{"id":"${current_portfolio._id}"}'>${current_portfolio.title} <br> (${current_portfolio.role}) </a>
						<span class='published'>${current_portfolio.client} - <span class='fa fa-map-marker'></span> ${current_portfolio.location}</span>
					</div>
				</div>
			</div>
		`)
	}

	function loadPortfolio(callType){

		if (callType === 'sub') {
			$('#all-portfolio-container').fadeOut() // Hide container for the portfolio
			$(root).html(' ') // empty the write area for the portfolio
			$('#howto-featured').fadeOut()
			$('#root').find('#no-portfolio').fadeOut().remove()
			$('#header-container').fadeIn()
			// reset containers if call is re trigerred
			page = 1; // restart count
		}

		let _id = Cookies.get('req_id'); // portfolio user

		/* Load Portfolio */

		let targetUrl = `${devUrl}/api/portfolio?limit=8&page=${page}`;

		$.ajax({
			url : targetUrl,	  
			processData : false,
		  contentType : false,
		}).done(function(response){

			$('.loader-activity').slideUp()
			let response_data	= response.data
			let response_count= response.data.length;

			let uid = Cookies.get('_id'); // session user ID;

			let self_user = uid == _id ? true : false; // returns true if the user profile in view is that of the browsing user


			$('#all-portfolio-header,#all-portfolio-container').fadeIn()

			response_data.map(function(currentValue){
				writeAllPortfolio(currentValue)
			})

			if (response_count == 0) {
				talert('You have caught up with us')
			}			

		}).fail(function(response){
			$('#root').html(`<section class="" style='padding-top:120px;padding-bottom:120px'>
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

	$('#load-more-portfolio').on('click', function() {
		page++;
		$(root).append('<div class="loader-activity"><div class="indeterminate"></div></div>');
		loadPortfolio();
	});

	$(document).ready(function(){
		createPortfolioHandler();
		loadPortfolio();
		profilePictures();
		activateSwiper()
	})
</script>
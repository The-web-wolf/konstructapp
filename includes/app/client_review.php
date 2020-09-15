<script type="text/javascript">

	function loadPortfolio(params){
		let p_root 	= $('#primary_content');
		let s_root 	= $('#secondary_content');
		let root 	= $('#absolute_root')
		let targetUrl = `${devUrl}/api/portfolio/${params.id}`;

		let primary_content = new Promise(function(resolve,reject){
			$(p_root).html(`<div class="loader-activity"><div class="indeterminate"></div></div>`);
			$.ajax({
				url : targetUrl,	  
				processData : false,
				contentType : false,
			}).done(function(response){
				let portfolio	= response.data;
				$('title').html(`${portfolio.title} Review | KonstructApp`);
				let canReview = portfolio.starRating ? "disabled='disabled'" : '';
				resolve(portfolio.user._id)
				$(p_root).html(`
				<div class="ui-block">

										
					<!-- Single Post -->

					<article class="hentry blog-post single-post single-post-v3">

						<a href="#" class="post-category bg-primary">Featured In KonstructApp</a>

						<h1 class="post-title c-white" ata-target='custom-function' data-_fnc='expandPortfolio' data-_param='{"id":"${portfolio._id}"}'>${portfolio.title} </h1>


						<div class="post-thumb">
							<img src="${portfolio.pictures[0]}" alt="${portfolio.title}">
						</div>

						<div class="post-content-wrap">

							<div class="control-block-button post-control-button">

								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-like-post-icon"><use xlink:href="#olymp-like-post-icon"></use></svg>
									<span>${portfolio.likes.length}</span>
								</a>

							</div>

							<div class="post-content">								

								<p>
									${portfolio.details}
								</p>
								<div class="content">
								<span class="published" style='color:#F8AC09'>${portfolio.client} - <span class='fa fa-map-marker'></span> ${portfolio.location}</span>
							</div>


							</div>
						</div>
						<button class="btn btn-md-2 btn-primary btn-block" data-target='custom-function' data-_fnc='expandPortfolio' data-_param='{"id":"${portfolio._id}"}'>View Full Portfolio</button>
						<button class="btn btn-md-2 btn-secondary btn-block" data-target='custom-function' data-_fnc='makeReview' ${canReview} data-_param='{"id":"${portfolio._id}"}'>Make Your Review as ${portfolio.client} </button>

					</article>

					<!-- ... end Single Post -->
					</div>
				`)		
				$(root).find('.loader-activity').fadeOut('slow', function(){
					$(root).fadeIn('linear');
				})	
			})
			.fail(function(jqXHR){
				if(jqXHR.status === 404 || jqXHR.status === 400){
					$(root).html(`<section class="" style='padding-top:30px;padding-bottom:10px;'>
						<div class="container">
							<div class="row">
								<div class="col col-xl-4 col-lg-12 col-md-12 col-12 m-auto">
									<div class="logout-content">
										<div class="logout-icon">
											<i class="fas fa-network-wired"></i>
										</div>								
										<h6>Sorry!</h6>
										<p class="heading-text">
											We could not load this portfolio, The link must be broken, kindly request for another or contact our support if you think this is a mistake.
										</p>
									</div>
								</div>
							</div>
						</div>
					</section>`)				
				}
				else{
					$(root).html(`<section class="" style='padding-top:30px;padding-bottom:10px;'>
						<div class="container">
							<div class="row">
								<div class="col col-xl-4 col-lg-12 col-md-12 col-12 m-auto">
									<div class="logout-content">
										<div class="logout-icon">
											<i class="fas fa-network-wired"></i>
										</div>								
										<h6>Sorry!</h6>
										<p class="heading-text">
											We could not establish a connection to our server, Kindly check your internet connection and try again
										</p>
									</div>
								</div>
							</div>
						</div>
					</section>`)
				}
			})
		})

		primary_content.then(function(user_id){
			$(s_root).html(`<div class="loader-activity"><div class="indeterminate"></div></div>`);
			let targetUrl = `${devUrl}/api/user/${user_id}`
			$.ajax({
				url : targetUrl,	  
				processData : false,
				contentType : false,
			}).done(function(response){
				let user = response.data;
				$(s_root).html(`
				<aside>
					<div class="ui-block">
						<div class="ui-block-title">
							<h6 class="title">Konstructor's Profile</h6>
						</div>
					</div>

					<div class='ui-block'>
						<div class="friend-item">
							<div class="friend-header-thumb">
								<img src="${user.backgroundPic}" class='custom-bg' alt="${user.firstName} ${user.lastName}">
							</div>
						
							<div class="friend-item-content">

								<div class="friend-avatar">
									<div class="author-thumb">
										<img src="${user.userPic}" style='height:100px;width:100px;' class='custom-bg' alt="${user.firstName} ${user.lastName}">
									</div>
									<div class="author-content">
										<a href="#" class="h5 author-name">${user.firstName} ${user.lastName}</a>
										<div class="country">${user.occupation}</div>
									</div>
								</div>
						
								<div>
									<p class="friend-about" data-swiper-parallax="-500">
										${user.bio}
									</p>
				
									<div class="friend-since" data-swiper-parallax="-100">
										<span>User Since</span>
										<div class="h6 date-to-format">${user.createdAt}</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</aside>					
				`)
				let newnode = $('.date-to-format');
				let nodetext = $(newnode).text()
				let relative_date	= moment(nodetext).format('LLLL');
				$(newnode).text(relative_date)
			})
			// load aside, main content loaded
		})

	}

	function makeReview(params){
		let body 	= $('#make-review .modal-body');
		let main	= $('#make-review');
		let form 	= $(main).find('form');
		$(main).modal('show');
		if(!$(form).find("[name = 'portfolio']").length){
			$(form).append(`<input type='hidden' name='portfolio' value='${findGetParameter('ref')}' >`);
			// add pportfolio ID if none has been appended
		}
		$(form).submit(function(e){
			e.preventDefault();	
			disableBtn(form)		
			let method 	= 'POST';
			let action 	= `${devUrl}/api/review`;
			let reqData = $(form).serialize()
			submitData(reqData,method,action, (error, response) => {
		  		if(error){
					  talert(error)
					  resetBtn(form)
		  		}
		  		else{
		  			// Successful
					resetBtn(form)
					swal({
						title: 'Review successful',
						text: `KonstructApp, easily FIND or be FOUND for verified Construction Services.`,
						icon: "success",
						buttons: {
							getIn : {
								text : 'Sign me up',
								value: 'reg',
							},
							proceedDelete : {
								text : 'Learn more!',
								value : 'visit',
							}
						}
					})
					.then((value) => {
						if(value === 'visit'){
							window.location.replace('https://konstructapp.com');
						}
						else if(value === 'reg'){
							window.location.replace('./')
						}
					})
		  		}
		  	})
		})
		
	}

	function findGetParameter(parameterName) {
		var result = null,
			tmp = [];
		location.search
			.substr(1)
			.split("&")
			.forEach(function (item) {
			tmp = item.split("=");
			if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
			});
		return result;
	}

	// lose the page if there's no linked portfolio
	let request = findGetParameter('ref');	
	
	if(!request){
		window.location.replace('404');
	}
	$(document).ready(function(){
		if(request){
			request = {
				id : request
			}
			loadPortfolio(request);
		}
		
	});
	
	
</script>
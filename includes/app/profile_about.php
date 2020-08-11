<script type="text/javascript">

	function loadEmployments(){
		let root 	= $('#work-history-root');
		let uid 	= Cookies.get('req_id')
		$(root).html(`<div class="loader-activity"><div class="indeterminate"></div></div>	`)	
		let targetUrl = `${devUrl}/api/user/${uid}/employment`;
		$.ajax({
			url : targetUrl,	  
			processData : false,
		  contentType : false,
		}).done(function(response){
			let response_data	= response.data
			let response_count= response.data.length;
			if (response_count) {
				$(root).append(`<div class='row'></div>`);
				response_data.map(function(currentValue){
					writeEmployments(currentValue)
				})				
			}
			else{
				$(root).html('<p class="text-center">Nothing here yet</p>')
			}
			$(root).find('.loader-activity').fadeOut('slow', function(){
				$(root).fadeIn('linear');
			})	

		})			
	}

	function writeEmployments(current_employment){
		let root 	= $('#work-history-root');
		let endYear = current_employment.endYear.length ? current_employment.endYear : 'present'
		let temp 	= `					
			<div class="col col-lg-6 col-md-6 col-sm-12 col-12">	
				<p class='h5'> ${current_employment.role} </p>			
				<ul class="widget w-personal-info item-block">
					<div class="ui-block">
						<div class="ui-block-content">							
							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Employer:</span>
									<span class="text">${current_employment.name}</span>
								</li>
								<li>
									<span class="title">Location:</span>
									<span class="text">${current_employment.location}</span>
								</li>
								<li>
									<span class="title">Date</span>
									<span class="text">${current_employment.startYear} - ${endYear}</span>
								</li>
							</ul>
						</div>
					</div>
				</ul>
			</div>
		`

		$(root).find('.row').append(temp)
	}

	function loadCertificates(){
		let root 	= $('#education-root');
		let uid 	= Cookies.get('req_id')
		$(root).html(`<div class="loader-activity"><div class="indeterminate"></div></div>	`)
		let targetUrl = `${devUrl}/api/user/${uid}/education`;
		$.ajax({
			url : targetUrl,	  
			processData : false,
		  contentType : false,
		}).done(function(response){
			let response_data	= response.data
			let response_count= response.data.length;
			if (response_count) {
				$(root).append(`<div class='row'></div>`);
				response_data.map(function(currentValue){
					writeCertificate(currentValue)
				})				
			}
			else{
				$(root).html('<p class="text-center">Nothing here yet</p>')
			}
			$(root).find('.loader-activity').fadeOut('slow', function(){
				$(root).fadeIn('linear');
			})	

		})			
	}

	function writeCertificate(current_cert){
		let root 	= $('#education-root');
		let endYear = current_cert.endYear.length ? current_cert.endYear : 'present'
		let temp 	= `					
			<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
				<p class='h5'> ${current_cert.degree} </p>
				<ul class="widget w-personal-info item-block">
					<div class="ui-block">
						<div class="ui-block-content">
							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Institution:</span>
									<span class="text">${current_cert.name}</span>
								</li>
								<li>
									<span class="title">Location:</span>
									<span class="text">${current_cert.location}</span>
								</li>
								<li>
									<span class="title">Date :</span>
									<span class="text">${current_cert.startYear} - ${endYear}</span>
								</li>
							</ul>
						</div>
					</div>
				</ul>
			</div>`

		$(root).find('.row').append(temp)
	}


	/* CORE SCRIPTS */

	function writeProfile(){
		let certificates = new Promise(function(resolve,error){
			loadCertificates();
			resolve('fetched')
		})

		certificates.then(function(){
			let employment = new Promise(function(resolve,error){
				loadEmployments()
				resolve('fetched')
			})
		})
	}		

	$(document).ready(function(){
		writeProfile();
		profilePictures();
	})

</script>
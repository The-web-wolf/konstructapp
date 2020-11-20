<script type="text/javascript">

	$('#userInterest').submit(function(e){
		e.preventDefault();
		let i_need = $(".i_need");
		let i_need_checked = false;
		$(i_need).each(function(){
			if($(this).prop("checked") == true){
	            i_need_checked = true
	        }
		})
		if(i_need_checked == false){
			talert("Kindly Select One Or More Interest")
			return false;
		}
		talert('Work in progress')
		//submitForm('userInterest', 'userUpdated')
	})

	$('#resetPassword').submit(function(e){
		e.preventDefault();
		if ($('[name = "newPassword"]').val() !== $('[name = "newPassword2"]').val()) {
			talert(' new passwords do not match')
			return false;
		}
		submitForm('resetPassword', 'passwordReset')
	})

	$('#updateUser').submit(function(e){
		e.preventDefault();
		let emailAddress = $('#updateUser #emailAddress')
		 if ($(emailAddress).data('defvalue') === $(emailAddress).val()) {
		 	$(emailAddress).removeAttr('name')
		 }
		let phoneNumber = $('#updateUser #phoneNumber')
		 if ($(phoneNumber).data('defvalue') === $(phoneNumber).val()) {
		 	$(phoneNumber).removeAttr('name')
		 }


		 /*Submit the form*/
            
		submitForm('updateUser', 'userUpdated')
	})

	function loadEmployments(callType){
		let root 	= $('#work-cells');
		let uid 	= Cookies.get('_id')
		if (callType === 'sub') {
			$(root).html(`
			<div class="loader-activity">
			  <div class="indeterminate"></div>
			</div>	`)
		}
		let targetUrl = `${devUrl}/api/user/${uid}/employment`;
		$.ajax({
			url : targetUrl,	  
			processData : false,
		  contentType : false,
		}).done(function(response){
			let response_data	= response.data
			let response_count= response.count;
			response_data.map(function(currentValue){
				writeEmployments(currentValue)
			})

			$(root).find('.loader-activity').fadeOut('slow', function(){
				$(root).fadeIn('linear');
			})	

		})			
	}

	function writeEmployments(current_employment){
		let root 	= $('#work-cells');
		let temp 	= `					
			<div class="ui-block work-cell ${current_employment._id}" data-ref='${current_employment._id}'>
				<div class="ui-block-title cell-head">
					<h6 class="title" data-target='custom-function' data-_fnc='expandEmployment' data-_param='{"id":"${current_employment._id}"}'> ${current_employment.name} - ${current_employment.role}</h6>
					<div class="cell-action" style="float: right;">
						<a href="#" data-target='custom-function' data-_fnc='deleteEmployment' data-_param='{"id":"${current_employment._id}"}'> <span class="fa fa-trash c-red"></span> Delete</a>
					</div>
				</div>
				<div class="ui-block-content cell-body">
					<a href="#" class="expand-cell" data-target='custom-function' data-_fnc='expandEmployment' data-_param='{"id":"${current_employment._id}"}'>
						<svg><use xlink:href="#olymp-music-fullscreen-icon"></use></svg>
						<span>Expand</span>
					</a>
					<form action="#" class='edit-work-history'>
						<div class="employment-history-container">
							<div class="employment-history">
								<div class="row">
									<div class="col col-sm-12 col-12">
										<div class="form-group label-floating">
											<label class="control-label">Employer </label>
											<input class="form-control" placeholder="" type="text" name="name" required="" value='${current_employment.name}'>
										</div>
									</div>
							
									<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
										<div class="form-group label-floating">
											<label class="control-label">Location</label>
											<input class="form-control" placeholder="" type="text" name="location" required="" value='${current_employment.location}'>
										</div>
									</div>
									<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
										<div class="form-group label-floating">
											<label class="control-label">Role</label>
											<input class="form-control" placeholder="" type="text" name="role" required="" maxlength="100" value='${current_employment.role}'>																					
										</div>
									</div>
							
									<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Start Date</label>
											<input class="form-control" placeholder="" type="month" name="startYear" required="" value='${current_employment.startYear}'>
										</div>
									</div>
							
									<div class="col col-lg-6 col-md-6 col-sm-12 col-12" id="end-date">
										<div class="form-group date-time-picker label-floating">
											<label class="control-label">End Date <small><i>(leave blank if still ongoing)</i></small></label>
											<input class="form-control" placeholder="" type="month" name="endYear value='${current_employment.endYear}'">
										</div>
									</div>
								</div>										
							</div>		
							<div class="row">				
								<div class="col col-sm-12 col-12">
									<button type="submit" class="btn btn-primary btn-lg full-width" data-target='custom-function' data-_fnc='updateEmployment' data-_param='{"id":"${current_employment._id}"}'>Update Info</button>
								</div>																		
							</div>
						</div>
					</form>					
				</div>
			</div>`

		$(root).append(temp)
	}

	function loadCertificates(callType){
		let root 	= $('#cert-cells');
		let uid 	= Cookies.get('_id')
		if (callType === 'sub') {
			$(root).html(`
			<div class="loader-activity">
			  <div class="indeterminate"></div>
			</div>	`)
		}
		let targetUrl = `${devUrl}/api/user/${uid}/education`;
		$.ajax({
			url : targetUrl,	  
			processData : false,
		  contentType : false,
		}).done(function(response){
			let response_data	= response.data
			let response_count= response.count;
			response_data.map(function(currentValue){
				writeCertificate(currentValue)
			})

			$(root).find('.loader-activity').fadeOut('slow', function(){
				$(root).fadeIn('linear');
			})	

		})			
	}

	function writeCertificate(current_cert){
		let root 	= $('#cert-cells');
		let temp 	= `					
			<div class="ui-block cert-cell ${current_cert._id}" data-ref='${current_cert._id}'>
				<div class="ui-block-title cell-head">
					<h6 class="title" data-target='custom-function' data-_fnc='expandCertificate' data-_param='{"id":"${current_cert._id}"}'> ${current_cert.name} - ${current_cert.degree}</h6>
					<div class="cell-action" style="float: right;">
						<a href="#" data-target='custom-function' data-_fnc='deleteCertificate' data-_param='{"id":"${current_cert._id}"}'> <span class="fa fa-trash c-red"></span> Delete</a>
					</div>
				</div>
				<div class="ui-block-content cell-body">
					<a href="#" class="expand-cell" data-target='custom-function' data-_fnc='expandCertificate' data-_param='{"id":"${current_cert._id}"}'>
						<svg><use xlink:href="#olymp-music-fullscreen-icon"></use></svg>
						<span>Expand</span>
					</a>
								
					<form action='#' class='edit-certificate'>
						<div class="employment-history-container">

							<div class="employment-history">
								<div class="row">
									<div class="col col-sm-12 col-12">
										<div class="form-group label-floating">
											<label class="control-label">Institution</label>
											<input class="form-control" placeholder="" type="text" name="name" required="" value='${current_cert.name}'>
										</div>
									</div>
							
									<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
										<div class="form-group label-floating">
											<label class="control-label">Location of institution</label>
											<input class="form-control" placeholder="" type="text" name="location" required="" value='${current_cert.location}'>
										</div>
									</div>
									<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
										<div class="form-group label-floating">
											<label class="control-label">Certificate obtained</label>
											<input class="form-control" placeholder="" type="text" name="degree" required="" value='${current_cert.degree}'>
										</div>
									</div>
							
									<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Date Obtained</label>
											<input class="form-control" placeholder="" type="month" name="dateObtained" value='${current_cert.dateObtained}'>
										</div>
									</div>
								</div>										
							</div>
				
							<div class="row">
						
								<div class="col col-sm-12 col-12">
									<button type="submit" class="btn btn-primary btn-lg full-width">Add certification</button>
								</div>
							</div>
						</div>
					</form>					
				</div>
			</div>`

		$(root).append(temp)
	}

	function userEmploymentHistory(){
		loadEmployments();
		createWorkHistoryHandler();
	}

	function userCertifications(){
		loadCertificates();
		createCertificationHandler();
	}

	$(document).ready(function(){
		userEmploymentHistory();
		userCertifications();
		identityVerification();
	})

</script>
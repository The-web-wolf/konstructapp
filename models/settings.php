<script type="text/javascript">

	function collapsCell(id,root){
		// id : cell to collaps
		// root : parent cell
		$(root).each(function(){
			if ($(this).hasClass(id)) {
				$(this).find('.cell-body form').slideUp('linear')
				$(this).find('.cell-body .expand-cell').slideDown('fast')
			}
		})
	}

	function collapsOtherCells(id,root){
		//id : cell to not collaps
		// root : parent cell
		$(root).each(function(){
			if (!$(this).hasClass(id)) {
				$(this).find('.cell-body form').slideUp('linear')
				$(this).find('.cell-body .expand-cell').slideDown('fast')
			}
		})
	}

	/*EMPLOYMENT START */

	function createWorkHistoryHandler(){ 	
	  $("#new-work-history input").each(function(){
	  	$(this).on('keyup change', function(){
				if (!$("#new-work-history").valid()) {
	    		update_btn_state('createWorkHistory', 'disable');
	    	}
	    	else{
	    		update_btn_state('createWorkHistory', 'enable')
	    	}
	  	})
	  })
	  $('#createWorkHistory').click(function(ev){
	  	ev.preventDefault()
	 		submitForm('new-work-history', 'employmentAdded');
	  })			
	}

	function addEmployment(){
		// Collaspe all other employments
		let fake_id = '0';
		collapsOtherCells(fake_id,'.work-cell');
		$('#add-new-work').modal('show')
	}

	function expandEmployment(employment){
		let root = $(`.work-cell.${employment.id}`);
		collapsOtherCells(employment.id,'.work-cell')
		$(root).find('.cell-body .expand-cell').hide('fast')
		$(root).find('.cell-body form').slideDown('linear')

	}

	function deleteEmployment(employment){
		let reqData = {id : employment.id}
		let method 	= 'DELETE';
		let action 	= `${devUrl}/api/employment/${employment.id}`;
		swal({
		  text: `Are you sure you want to delete this work history?`,
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
		  				loadPortfolio('sub')
		  			}
		  		}
		  		else{
		  			// Successful
		  			talert(' deleted');
		  			swal.stopLoading();
	    			swal.close();
		  			loadEmployments('sub');
		  		}
		  	})
		  } else {
		    
		  }
		});		
	}

	function updateEmployment(employment){
		// get the form

		let form = $(`.work-cell.${employment.id} .cell-body form`);
		let user 		= Cookies.get('_id');
		let reqData = $(form).serialize();
		let method 	= 'PUT'	;
		let action 	= `${devUrl}/api/employment/${employment.id}`;	
		disableBtn($(form))	
		submitData(reqData,method,action, (error, response) => {
			if(error){				
				talert('Could not complete, kindly check your connection')
				resetBtn($(form))
			}
			else{
				// Successful
				talert('Updated')
				loadEmployments('sub')
			}
		})		
	}

	/*CERTIFICATIONS START*/

	function createCertificationHandler(){ 	
	  $("#new-certificate input").each(function(){
	  	$(this).on('keyup change', function(){
				if (!$("#new-certificate").valid()) {
	    		update_btn_state('createCertificate', 'disable');
	    	}
	    	else{
	    		update_btn_state('createCertificate', 'enable')
	    	}
	  	})
	  })
	  $('#createCertificate').click(function(ev){
	  	ev.preventDefault()
 		submitForm('new-certificate', 'certificateAdded');
	  })			
	}

	function addCertificate(){
		// Collaspe all other employments
		let fake_id = '0';
		collapsOtherCells(fake_id,'.cert-cell');
		$('#add-new-certificate').modal('show')
	}

	function expandCertificate(cert){
		let root = $(`.cert-cell.${cert.id}`);
		collapsOtherCells(cert.id,'.cert-cell')
		$(root).find('.cell-body .expand-cell').hide('fast')
		$(root).find('.cell-body form').slideDown('linear')

	}

	function deleteCertificate(cert){
		let reqData = {id : cert.id}
		let method 	= 'DELETE';
		let action 	= `${devUrl}/api/education/${cert.id}`;
		swal({
		  text: `Are you sure you want to remove this Certificate?`,
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
		  				loadPortfolio('sub')
		  			}
		  		}
		  		else{
		  			// Successful
		  			talert(' deleted');
		  			swal.stopLoading();
	    			swal.close();
		  			loadEmployments('sub');
		  		}
		  	})
		  } else {
		    
		  }
		});		
	}

	function updateCertificate(cert){
		// get the form

		let form = $(`.work-cell.${cert.id} .cell-body form`);
		let user 		= Cookies.get('_id');
		let reqData = $(form).serialize();
		let method 	= 'PUT'	;
		let action 	= `${devUrl}/api/education/${cert.id}`;	
		disableBtn($(form))	
		submitData(reqData,method,action, (error, response) => {
			if(error){				
				talert('Could not complete, kindly check your connection')
				resetBtn($(form))
			}
			else{
				// Successful
				talert('Updated')
				loadEmployments('sub')
			}
		})		
	}	


	// IDENTITY VERIFICATION CHECK

	function identityVerification(){
		let form 		= $('#verify-identity-form');
		let submitBtn	= $('#proceedVerification');

		$(form).find('input').each(function(){
			$(this).on('input', function(){
				if($(this).valid()){
					$(submitBtn).removeAttr('disabled')
				}
				else{
					$(submitBtn).attr('disabled', 'disabled')
				}
			})
		});

		// MAKE PAYMENT 

		function payWithPaystack(currency,chargeAmount) {			
			var handler = PaystackPop.setup({
				//key: 'pk_live_18ea49b37d7eb167bfd335fe33d92b69d0ed78b4',
				key : 'pk_test_9c76f32e6fc03682bee18402810a1c8d77e42e44',
				email: localStorage.getItem('email'),
				amount: chargeAmount * 100, 
				currency: currency, 
				firstname: localStorage.getItem('firstName'),
				lastname: localStorage.getItem('lastName'),
				callback: function(response) {
					
					// call for the verification,  first call a preloader

					$('#requestpreloader').fadeIn()

					// submitData

					let form 	= $('#verify-identity-form');
					let reqData = $(form).serialize();
					let method 	= $(form).data('method');
					let action 	= $(form).data('action');


					$.ajax({
						url : action,
						type : method,
						data : reqData,
						headers: { 'Authorization': `Bearer ${authtk}` },
						
					}).done(function(response){
						$("#user_ver").slideUp();
						resetBtn(form);
						$('#requestpreloader').fadeOut()

						let userData 	= response.data;	
						localStorage.setItem('firstName', userData.firstName);
						localStorage.setItem('lastName', userData.lastName);	

						swal('Verification successful', 'You have earned the new verified user badge', 'success');
					})
					.fail(function(jqXHR){	
						$('#requestpreloader').fadeOut()
						resetBtn(form);
						
						switch (jqXHR.status) {
							case 401 :
								talert(jqXHR.statusText);
								swal("Verification failed", "Information provided is incorrect", 'error');
								break;
							case 500 : 
								talert(jqXHR.statusText)
								break;
							case 404 : 
								talert(jqXHR.statusText)
								break;
							default:
							talert('Uncaught Error.\n' + jqXHR.statusText);
						}	
						 
					})					
				},
				onClose: function() {
					swal('Verification cancelled','Payment was not completed', 'info');
				},
			});
			handler.openIframe();
		} 		

		$(form).submit( async function(e){
			disableBtn(form)
			e.preventDefault();

			// convert 5 dollar to naira

			let url = 'https://free.currconv.com/api/v7/convert?q=USD_NGN&compact=ultra&apiKey=57a3ccafcc08ac05c30a';
			let amount,currency;

			let getRate = await fetch(url);

			if (getRate.ok) {
				resetBtn(form)
				let response = await getRate.json();
				let curRate  = response.USD_NGN;

				let amount 	= Math.floor(curRate * 5);
				let currency= 'NGN'; 
				payWithPaystack(currency,amount);	
			} else {
				let currency = 'USD';
				let amount = 5;

				// proceed with payment if call is not successful
				payWithPaystack(currency,amount);	
			}					

		})
 		
	}

</script>
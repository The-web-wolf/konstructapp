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

</script>
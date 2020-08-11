$(window).ready(function(){
	$('#hellopreloader').fadeOut('slow'); // remove preloader when page is ready
	perfectScrollbarInit()
});

let devUrl = 'https://konstructapps.herokuapp.com';

triggerBtns();

$(function(){
	/* Install Service worker*/
	if ('serviceWorker' in navigator) {
	  if (navigator.serviceWorker.controller) {} else {
	    //Register the ServiceWorker
	    navigator.serviceWorker.register('./sw.js', {
	      scope: './'
	    });
	  }
	}	

	// Prevent pop up of install

	let deferredPrompt = null;
	let buttonInstall = $('.installAppPrompt');

	window.addEventListener('beforeinstallprompt', (e) => {
		// Prevent the mini-infobar from appearing on mobile
		e.preventDefault();
		// Stash the event so it can be triggered later.
		deferredPrompt = e;
		// Update UI notify the user they can install the PWA
		$('.installAppPrompt').show() // on the menu so only logged in user can install
	});		

	$(buttonInstall).on('click', function(e){
	  // Show the install prompt
	  deferredPrompt.prompt();
	  // Wait for the user to respond to the prompt
	  deferredPrompt.userChoice.then((choiceResult) => {
	    if (choiceResult.outcome === 'accepted') {
	      talert('Install Successful')
	    }
	    else{
	    	Cookies.set('install','false')
	    }
	  });
	});	

	window.addEventListener('appinstalled', (evt) => {
	  $('.installAppPrompt').hide(); // hide install button once pwa installed
	 	Cookies.set('install', 'true');
	});	

	if (Cookies.get('install')) {		
		if (Cookies.get('install') === 'true') {$('.installAppPrompt').hide();}
		else{$('.installAppPrompt').show();}
	}

})

/* MAke back key close modal**/

$(document).ready(function(){
  $('div.modal').on('show.bs.modal', function() {
    var modal = this;
    var hash = modal.id;
    window.location.hash = hash;
    window.onhashchange = function() {
      if (!location.hash){
		$('.modal').modal('hide');
	  }
	  else{
		  if(location.hash !== $('.modal.show').attr('id')){
			  $('.modal').modal('hide')
		  }
	  }
    }
  });
  $('div.modal').on('hidden.bs.modal', function() {
	var hash = this.id;
	var url  = window.location.pathname + window.location.search
    history.replaceState('', document.title, url);
  });
  // when close button clicked simulate back
  $('div.modal button.close').on('click', function(){
    window.history.back();
  })
  // when esc pressed when modal open simulate back
  $('div.modal').keyup(function(e) {
    if (e.keyCode == 27){
      window.history.back();          
    }
  });
});


let makePreload = cssSelector => {
	cssSelector = $(cssSelector);
	$(cssSelector).html('<div class="inline-loader"><img src="assets/img/preload.gif"></div>');
}

let unmakePreload = cssSelector => {
	cssSelector = $(cssSelector);
	$(cssSelector).html('');
}

function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}

function isStandalone () {
    return !!navigator.standalone || window.matchMedia('(display-mode: standalone)').matches;
}

if (isStandalone()) {
	window.addEventListener('load', function() {
	  	window.history.pushState({ noBackExitsApp: true }, '')
	})

	window.addEventListener('popstate', function(event) {
	  	if (event.state && event.state.noBackExitsApp) {
	    	window.history.pushState({ noBackExitsApp: true }, '')
	  }
	})
}


//Offline/online snackbar
var simulateOffline = $('.simulate-offline');
var simulateOfflinePage = $('.simulate-offline-page');
var simulateOnline = $('.simulate-online');
var onlineMessage = $('.online-message');
var offlineMessage = $('.offline-message');
var detectedOnline = 'online-message-active'
var detectedOffline = 'offline-message-active'

if (!$('.offline-message').length) {
  $('body').append('<p style="width:95%;margin:auto" class="offline-message ">No internet connection detected</p>');
  $('body').append('<p style="width:95%;margin:auto" class="online-message ">You are back online. Welcome!</p>');
}
var status = document.getElementById("status");
var log = document.getElementById("log");
var onlineMessage = $('.online-message');
var offlineMessage = $('.offline-message');
var detectedOnline = 'online-message-active'
var detectedOffline = 'offline-message-active'

function updateOnlineStatus(event) {
  var condition = navigator.onLine ? "online" : "offline";
  onlineMessage.addClass(detectedOnline);
  offlineMessage.removeClass(detectedOffline);
  setTimeout(function(){
  	onlineMessage.removeClass(detectedOnline)
  }, 3000)
}

function updateOfflineStatus(event) {
  var condition = navigator.onLine ? "online" : "offline";
  offlineMessage.addClass(detectedOffline);
}
window.addEventListener('online', updateOnlineStatus);
window.addEventListener('offline', updateOfflineStatus);


if(isStandalone()){	

	let preload_href = $("a:not(.no-ajaxy):not([data-toggle='tab']):not([href='#']):not([target='_blank']):not(:contains('#'))");

	$(preload_href).on('click', function(evn){
	  evn.preventDefault();
	  $('#hellopreloader').fadeIn('slow');

	  let targetUrl = $(this).attr('href');

	  if(!targetUrl){
	  	$('#hellopreloader').fadeOut('linear')
	  }

	  setTimeout(function(){
	  	location.replace(targetUrl)
	  },600);

	});	
	
};

/* ========================================================= */

let talert = (message,type ) => {
	var toastr1 = new Toastr();
	toastr1.show(message);
}

let disableBtn = targetForm => {
    let targetBtn  = $(targetForm).find(":submit");
    $(targetBtn).attr('disabled', 'disabled')
    $(targetBtn).attr('data-display', $(targetBtn).html()) // get the current text and save in a data-attr
    $(targetBtn).html(' <span class="fa fa-spinner fa-spin"></span>')
} 

let resetBtn = targetForm => {
	let targetBtn  = $(targetForm).find(":submit");
	$(targetBtn).removeAttr('disabled')
    $(targetBtn).html($(targetBtn).data('display')) // re enter the saved caption to view
}

let update_btn_state = (button_id,state) => {
 	let button = document.getElementById(button_id);
 	if(state === 'enable'){
 		$(button).removeAttr('disabled')
 	}
 	else if(state === 'disable'){
 		$(button).attr('disabled', 'disabled')
 	}
}

let hideModals = () => {
	$('.modal').modal('hide')
}

/*Function for each call*/
function userFx (response){
	let userToken = response.token;
  	let userId = response.data._id;
  	$.ajax({
    	type : "POST",
    	url : "controllers/createssid",
    	data : {token : userToken, user : userId},
  	}).done(function(callback){
    	talert('Redirecting...');
    	location.reload()
  	})
}

function userUpdated (response){
	talert('Changes saved')
	location.reload()
}

function passwordReset(response){
	talert('Password updated');
	$('#resetPassword').reset()
}

function portfolioCreated(response){
	loadPortfolio('sub')
	hideModals()
	document.getElementById('new-portfolio').reset()
	resetBtn($('#new-portfolio'));
	$('#createPortfolio').attr('disabled','disabled')
 	$('.upload-image-container .file-upload .file-upload__label svg').css('fill', '#c2c5d9')
	$('.upload-image-container .file-upload .file-upload__label p').css('color', '#c2c5d9')
	$("#statusMessage").text(`No images selected`)	
}

function portfolioUpdated(response){
	talert('Edit successful')
	loadPortfolio('sub');
	hideModals()
	resetBtn($('#edit-portfolio'));
}


function bidCreated(response){
	loadBids('sub')
	hideModals()
	document.getElementById('new-bid').reset()
	$('.selectpicker').selectpicker('val', 'refresh')
	resetBtn($('#new-bid'));
	$('#createBid').attr('disabled','disabled')
 	$('.upload-image-container .file-upload .file-upload__label svg').css('fill', '#c2c5d9')
	$('.upload-image-container .file-upload .file-upload__label p').css('color', '#c2c5d9')
	$("#statusMessage").text(`No images selected`)
}

function bidUpdated(response){
	talert('Edit successful')
	loadBids('sub');
	hideModals()
	resetBtn($('#edit-bid'));
}

function bidCommentMade(response){
	talert('Comment successful');
	loadBidComments(response.data.bid, 'sub');
	$('#commentForm [name="bidComments"]').val(' ')
}

function statusCommentMade(response){
	talert('Comment successful');
	loadStatusComments(response.data.status, 'sub');
	$('#commentForm [name="statusComments"]').val(' ')
}

function profileBidCreated(response){
	recentBids('sub')
	hideModals()
	document.getElementById('new-bid').reset()
	$('.selectpicker').selectpicker('val', 'refresh')
	resetBtn($('#new-bid'));
	$('#createBid').attr('disabled','disabled')
 	$('.upload-image-container .file-upload .file-upload__label svg').css('fill', '#c2c5d9')
	$('.upload-image-container .file-upload .file-upload__label p').css('color', '#c2c5d9')
	$("#statusMessage").text(`No images selected`)	
}

function statusCreated(response){
	document.getElementById('new-status').reset()
	resetBtn($('#new-status'));
	loadStatus('sub')
	/*//////*/
	$("#imageUploadStatus").html('')	
	$("#taggedPortfolio").html('')	
	$("#new-status .image-upload svg").css('fill', '#c2c5d9')
	$('#new-status').find("[name='portfolio']").val('')
}


function statusUpdated(response){
	talert('Edit successful')
	loadStatus('sub');
	hideModals()
	resetBtn($('#edit-status'));
}

function employmentAdded(response){
	loadEmployments('sub');
	document.getElementById('new-work-history').reset(); // form reset
	resetBtn($('#new-work-history'));
	hideModals();
}

function certificateAdded(response){
	loadCertificates('sub');
	document.getElementById('new-certificate').reset(); // form reset
	resetBtn($('#new-certificate'));
	hideModals();
}

/*====END*/

let submitForm = (formID, successFunction) => {

	// Get form method and url

	let targetForm = document.getElementById(formID);

	let formType  = $(targetForm).data('method')
	let formUrl   = $(targetForm).data('action')

	// get token

	let authtk  = Cookies.get('token')

	// Make button disabled

	disableBtn(targetForm)

	// Submit form

	let formData = new FormData(targetForm);

	$.ajax({
	  url : formUrl,
	  type : formType,
	  data : formData,
	  processData : false,
	  contentType : false,
	  headers: { 'Authorization': `Bearer ${authtk}` },
	   
	}).done(function(response){
		talert('Success');
		window[`${successFunction}`](response);
	})
	.fail(function(jqXHR){	
	  	
		try {
	        let response = JSON.parse(jqXHR.responseText);
		    switch (jqXHR.status) {
		        case 401 :
		          	talert(response.message);
		          	resetBtn(targetForm)
		        	break;
		        case 400 :
		          	talert(response.message);
		          	resetBtn(targetForm)
		        	break;
		        case 500 :
		          	talert(response.message);
		          	resetBtn(targetForm)
		        	break;
		        default:
		          	alert('Uncaught Error.\n' + jqXHR.responseText);
		          	resetBtn(targetForm)
		          	break;
		      }	
	    } 
	    catch(err) {
	       resetBtn(targetForm);
	       let Errresponse = jqXHR.responseText.replace(/(<([^>]+)>)/ig,"").trim();
	       talert( Errresponse);
	    }	  	
	})
}

let submitData = (data, method, action, callback) => {

	let authtk  = Cookies.get('token')

	// Submit Data

	$.ajax({
	  url : action,
	  type : method,
	  data : data,
	  headers: { 'Authorization': `Bearer ${authtk}` },
	   
	}).done(function(response){
		callback(null, response);
	})
	.fail(function(jqXHR){	
		try {
      let response = JSON.parse(jqXHR.responseText);
	    switch (jqXHR.status) {
	        case 401 :
	          talert(response.message);
	         	callBack(new Error('Authentication error'), jqXHR);
	        	break;
	        case 400 : 
	        	talert(response.message)
	        	callBack(new Error('Authentication error'), jqXHR);
	        	break;
	        case 500 : 
	        	talert(response.message)
	        	callBack(new Error('Authentication error'), jqXHR);
	        	break;
	        default:
	          	callback(new Error('Uncaught Error.\n' + jqXHR.responseText), jqXHR);
	          	break;
	      }	
	    } 
	    catch(err) {
	       let Errresponse = jqXHR.responseText.replace(/(<([^>]+)>)/ig,"").trim();
	       talert( Errresponse);
	    }	  	
	})

}

// Profile settings 
$('.reset-attributes').on('click', function(ev){
	ev.preventDefault();
	let targetForm = $(this).closest('form');
	$(targetForm).find('input').each(function(){
		let targetInput = $(this)
	    let oldVal = $(targetInput).data('defvalue');
		let newVal = $(targetInput).val();
		$(targetInput).val(oldVal);
		talert('Changes reversed')
	});	
})

/* For uploading user picture*/

function profilePictures() {

	let cropAndUpload = (formId, outputWidth, outputHeight, cropAR) => { // cropAR {Crop aspect ratio}
		let cropper;
		let targetForm 	= document.getElementById(formId)
		let newImage 	= document.querySelector(`#${formId} .imagePreview`);
		let inputTrig	= document.querySelector(`#${formId} input.newUpload`);

		let btnOkay 	= document.querySelector(`#${formId} .image_ok`)
		let btnCancel 	= document.querySelector(`#${formId} .image_null`)

		let bodyContent = document.querySelector(`#${formId} .modal_data`)
		let bodyPreview = document.querySelector(`#${formId} .modal_preview`)
		let bodyButtons = document.querySelector(`#${formId} .upload-action-btns`)

		let pictureUploadName	= $(inputTrig).attr('name')

		$(inputTrig).on('change', function (evt) {
		    var tgt = evt.target || window.event.srcElement,
		        files = tgt.files;

		    $(bodyContent).slideUp()
		    $(bodyPreview).slideDown()
		    $(bodyButtons).slideDown()

		    // FileReader support
		    if (FileReader && files && files.length) {
		        var fr = new FileReader();
		        fr.onload = function () {
		            newImage.src = fr.result;
		        }
		        fr.readAsDataURL(files[0]);
		        setTimeout(function(){
		        	cropper =	new Cropper(newImage, {
						aspectRatio: cropAR,
						moovable : true,
						zoomable : true,
						dragMode : 'move',
						scalable : false,
					});		
		        },1000)
		    }
		})

	  	$(btnCancel).click(function(ev){
		  	ev.preventDefault()
		  	$(bodyContent).slideDown();
		  	$(inputTrig).val('')
		    $(bodyPreview).slideUp();
		    $(bodyButtons).slideUp();
		    if(cropper){
		    	cropper.destroy()
		    }
	  	});

	  	$(btnOkay).click(function(e){
	  		e.preventDefault()
	  		disableBtn(targetForm)
			cropper.getCroppedCanvas({
				width: outputWidth,
				height: outputHeight,
			}).toBlob((blob) => {
			  	const formData = new FormData();
			  	let formUrl = $(targetForm).data('action')
				let authtk  = Cookies.get('token')

			  	// Pass the image file name as the third parameter if necessary.
			  	formData.append(pictureUploadName, blob/*, 'example.png' */);

			  	// Use `jQuery.ajax` method for example
			  	$.ajax(formUrl, {
			    	method: 'PUT',
			    	data: formData,
			    	processData: false,
			    	contentType: false,
			    	headers: { 'Authorization': `Bearer ${authtk}` },
			    	
			  	}).done(function(response){
			  		talert('Picture updated');
			  		location.reload()
			  	}).fail(function(jqXHR){	
						try {
			        let response = JSON.parse(jqXHR.responseText);
				   		switch (jqXHR.status) {
				        case 401 :
			          	talert(response.message);
			          	resetBtn(targetForm)
				        	break;
				        default:
			          	alert('Uncaught Error.\n' + jqXHR.responseText);
			          	resetBtn(targetForm)
			          	break;
				      }	
			    	} 
				    catch(err) {
				       resetBtn(targetForm);
				       let Errresponse = jqXHR.responseText.replace(/(<([^>]+)>)/ig,"").trim();
				       talert( Errresponse);
				    }	
					})
				}/*, 'image/png' */);	  		
	  	})

	}

	cropAndUpload('userPictureUpload', 120,120,1/1);
	cropAndUpload('userHeaderUpload', 1920,640,16/9);	

}

$('#status-container-toggle').click(function(e){
	e.preventDefault();
	$('#status-container').toggle('slow','linear')
})

$(window).ready(function(){
	$('#hellopreloader').fadeOut('slow'); // remove preloader when page is ready
});

//let devUrl = 'https://konstructapps.herokuapp.com'; // test 

let devUrl = 'https://api.konstructapp.com'; // live

triggerBtns();

const check = () => {
	if (!('serviceWorker' in navigator)) {
	  throw new Error('No Service Worker support!')
	}
	if (!('PushManager' in window)) {
	  throw new Error('No Push API Support!')
	}
}

// I added a function that can be used to register a service worker.
const registerServiceWorker = async () => {
	const swRegistration = await navigator.serviceWorker.register('sw.min.js', {
		scope: './'
	});
	return swRegistration;
}	  


// Request permission for notification

const requestNotificationPermission = async () => {
	const permission = await window.Notification.requestPermission();		
	if(permission !== 'granted'){
		throw new Error('Permission not granted for Notification');

		// send not declined to the backend
	}
}

const showLocalNotification = (title, body, swRegistration) => {
    const options = {
        body,
        // here you can add more properties like icon, image, vibrate, etc.
    };
    swRegistration.showNotification(title, options);
}

const progressiveF = async () => {
    check();
    const swRegistration = await registerServiceWorker();
    const permission =  await requestNotificationPermission();
}

progressiveF();

$(function(){
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
		  $('.installAppPrompt').slideUp()  // hide the install prompt after successful install
	    }
	    else{
	    	Cookies.set('install','false')
	    }
	  });
	});	

	window.addEventListener('appinstalled', (evt) => {
	  	$('.installAppPrompt').hide(); // hide install button once pwa installed
		Cookies.set('install', 'true');	
		if(Notification.permission === 'default'){
			requestNotificationPermission();
		}
	});	

	if (Cookies.get('install')) {		
		if (Cookies.get('install') !== 'true') {$('.installAppPrompt').show();}
		else{$('.installAppPrompt').hide();}
	}

	if(location.search === '?newlogin'){
		if(Notification.permission === 'default'){
			requestNotificationPermission();
		}
		history.replaceState('KonstructApp | Demand and supply starts here', 'KonstructApp | Demand and supply starts here', './');
	}	

})

/* MAke back key close modal and routing based on active modal **/

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
	  if( $(this).data('resource') === 'dynamic'){
		window.history.back()		  
	  }
	  else{
		var hash = this.id;
		var url  = window.location.pathname + window.location.search
		history.replaceState('', document.title, url);		  
	  }
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

function handleErrors(response) {
	if (response.message !== 'success') {
		throw new Error(response.statusText);
	}
	return response;
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


/*Function for each call*/
function userFx (response){
	let userToken 	= response.token;
	let userId 		= response.data._id;
	let userData 	= response.data;
	
	localStorage.setItem('firstName', userData.firstName);
	localStorage.setItem('lastName', userData.lastName);
	localStorage.setItem('email', userData.email);
	localStorage.setItem('userPic', userData.userpic);

  	$.ajax({
    	type : "POST",
    	url : "controllers/createssid",
    	data : {token : userToken, user : userId},
  	}).done(function(callback){
		let return_url = findGetParameter('return_url');
		// decode url hash
		talert('Redirecting...');
		if(return_url){
			return_url = return_url.replace('_sp_61_', '=');
			return_url = return_url.replace('_sp_63_', '?');			
			location.assign(return_url)
		}else{
			location.assign('.?newlogin')
		}
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
	let modal = ('#create-new-portfolio');
	$(modal).find('#createPortfolio').attr('disabled','disabled')
 	$(modal).find('.upload-image-container .file-upload .file-upload__label svg').css('fill', '#c2c5d9')
	$(modal).find('.upload-image-container .file-upload .file-upload__label p').css('color', '#c2c5d9')
	$(modal).find(".upload-image-container .file-upload .file-upload__label p").text(`No images selected`)	
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
	let modal = ('#create-new-bid');
	$(modal).find('#createBid').attr('disabled','disabled')
 	$(modal).find('.upload-image-container .file-upload .file-upload__label svg').css('fill', '#c2c5d9')
	$(modal).find('.upload-image-container .file-upload .file-upload__label p').css('color', '#c2c5d9')
	$(modal).find(".upload-image-container .file-upload .file-upload__label p").text(`No images selected`)		
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
		    switch (jqXHR.status) {
	        case 401 :
	          	talert(jqXHR.statusText);
	          	resetBtn(targetForm)
	        	break;
	        case 400 :
	          	talert(jqXHR.statusText);
	          	resetBtn(targetForm)
	        	break;
	        case 500 :
	          	talert(jqXHR.statusText);
	          	resetBtn(targetForm)
	        	break;
	        default:
	          	talert('Uncaught Error.\n' + jqXHR.statusText);
	          	resetBtn(targetForm)
	          	break;
		      }	
	    } 
	    catch(err) {
	      resetBtn(targetForm);
	      talert( jqXHR.statusText);
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
		callback(undefined, response);
	})
	.fail(function(jqXHR){	
		try {
	    switch (jqXHR.status) {
	        case 401 :
	          	talert(jqXHR.statusText);
				throw('Authentication error');
	        case 400 : 
	        	talert(jqXHR.statusText)
				throw('Authentication error');
	        case 500 : 
	        	talert(jqXHR.statusText)
				throw('Internal server error');
	        case 404 : 
	        	talert(jqXHR.statusText)
				throw('Not found');
	        default:
          	talert(jqXHR.statusText);
          	throw('Uncaught Error.\n' + jqXHR.statusText);
	      }	

	    } 
	    catch(err) {
	       talert(jqXHR.statusText);
	       callback(err, jqXHR);
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
						movable : true,
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
					contentType : false,
			    	headers: { 'Authorization': `Bearer ${authtk}` },
			    	
			  	}).done(function(response){
			  		talert('Picture updated');
			  		location.reload()
			  	}).fail(function(jqXHR){	
						try {
				   		switch (jqXHR.status) {
				        case 401 :
			          	talert(jqXHR.statusText);
			          	resetBtn(targetForm)
				        	break;
				        default:
			          	talert('Uncaught Error.\n' + jqXHR.statusText);
			          	resetBtn(targetForm)
			          	break;
				      }	
			    	} 
				    catch(err) {
						resetBtn(targetForm);
				       talert( jqXHR.statusText);
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

// search function 
function searchUser(text){
	let root = $(document).find('.search-result-content');
	$(root).html(`<div class="loader-activity"><div class="indeterminate"></div></div>`);
	if(text){
		let reqData = {searchTerm : text};
		let action  = `${devUrl}/api/searchuser`;
		let method 	= 'POST';
		let matches = submitData(reqData,method,action, (error, response) => {
			if(error){
				talert(error);
				$(root).html(`<h5 class='text-center'>Could not complete your search </h5>`);
			}
			else{
				if(response.data.length == 0){
					$(root).html(`<h5 class='text-center'>Could not find any user that matches your search</h5>`);
				}
				else{
					$(root).html('');
					response.data.map(function(current_user){
						let userIsVerified = current_user.userIdentityVerify ? '<span class="fa fa-check-circle text-primary">' : '';
						$(root).append(`
							<div class="inline-items">
								<div class="author-thumb">
									<a href='user?id=${current_user.id}'>
										<img src="${current_user.userPic}" class='custom-bg' alt="${current_user.firstName}" style='width:40px'>
									</a>
								</div>
								<div class="notification-event">									
									<a href='user?id=${current_user.id}'>
										<span class="h6 notification-friend"> ${current_user.firstName} ${current_user.lastName} </span>
									</a>
									<a href='user?id=${current_user.id}' >
										<span class="chat-message-item">${current_user.occupation}			
											<span style='color:#888da8;font-size:12.5px'> 
												<i class='fa fa-location-circle'></i> ${current_user.state} 
											</span>										
										</span>
									</a>
								</div>
								<a href='user?id=${current_user.id}' style='float:right'>
									<span class="notification-icon">
									${userIsVerified}
									</span>
								</a>
							</div>
						`)
					})
				}
			}
		})
	}
}

// search field

$('.user-search').on('search', function(e){
	e.preventDefault();
	let currentInput = $(this).val();
	searchUser(currentInput);

})

$('.user-search').on('input', function(){
	if($(this).val().length == 0 ){
		$('.search-result-content').html(' '); // clear input field if input is empty
	}
})

// searchform
$('.user-search-form').on('submit', function(e){
	e.preventDefault();
	let currentInput = $(this).find('[type=search]').val();
	searchUser(currentInput);
})

function copyToClipboard(text) {
    if (window.clipboardData && window.clipboardData.setData) {
        // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
        return clipboardData.setData("Text", text);

    }
    else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in Microsoft Edge.
        document.body.appendChild(textarea);
        textarea.select();
        try {
			copy =  document.execCommand("copy");  // Security exception may be thrown by some browsers.			
			return talert('Link copied to clipboard')			
        }
        catch (ex) {
            talert("Copy link to clipboard failed.", ex);
            return false;
        }
        finally {
            document.body.removeChild(textarea);
        }
    }
}

function shareLink(shareData){
	let shareUrl = "https://app.konstructapp.com/" + shareData.url
	if (navigator.share) {
		navigator.share({
			title: 'KonstructApp',
			text: shareData.text,
			url: shareUrl,
		})
		.then(() => talert('Successful share'))
		.catch((error) => talert('Error sharing', error));
	}	
	else{
		copyToClipboard(shareUrl);
	}
}
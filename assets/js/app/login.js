var googleUser = {};
var startApp = function() {
   gapi.load('auth2', function(){
     // Retrieve the singleton for the GoogleAuth library and set up the client.
     auth2 = gapi.auth2.init({
       client_id: '294565636344-a8stj0fogvkdqkb6ed3m5atqj0nolt8i.apps.googleusercontent.com',
       cookiepolicy: 'single_host_origin',
       fetch_basic_profile : true,
       ux_mode : 'popup',
     });
     attachSignin(document.getElementById('googleSignin'));
     attachSignin(document.getElementById('googleSignup'));
   });
};

var setUser = function(payload) {
   $('#requestpreloader').fadeIn()
   let method 	= 'POST';
   let action 	= `${devUrl}/api/googleauth`;
   submitData(payload,method,action, (error, response) => {
       if(error){
           talert(error);
           $('#requestpreloader').fadeOut()
       }
       else{
           talert(response.message);
           userFx(response);
           $('#requestpreloader').fadeOut();
       }
   })
}

function attachSignin(element) {
   auth2.attachClickHandler(element, {},
       function(googleUser) {
             var id_token 	= googleUser.getAuthResponse().id_token;
             let formData 	= {
             googleToken : id_token
            } 
             let method 	= 'POST';
             let action 	= `controllers/googleauth`;
             $('#requestpreloader').fadeIn()

           submitData(formData,method,action, (error, response) => {
               if(error){
                   talert('Could not complete signin')	
                     $('#requestpreloader').fadeOut()
               }
               else{
                   let payload = JSON.parse(response);
                   $('#requestpreloader').fadeOut()					
                   setUser(payload)
               }
           })          

       }, function(error) {
         talert(JSON.stringify(error.error, undefined, 2));
       });
}


$(function(){
   startApp();
   $('.custom-signin-trigger').click(function(e){
       e.preventDefault()
       $('.signin-trigger').click()
   })
   $('.custom-register-trigger').click(function(e){
       e.preventDefault()
       $('.register-trigger').click()
   })

   let loginForm = $('#loginForm');
   let registerForm = $('#registerationForm')

   $(registerForm).submit(function(ev){
       ev.preventDefault()
       let password = $(registerForm).find('[name=password]');
       if($(password).val().length < 8){
           talert('Password must be more than 8 characters')
           return false;
       }		
       submitForm('registerationForm', 'userFx')
   })

   $(loginForm).submit(function(ev){
       ev.preventDefault()
       let password = $(loginForm).find('[name=password]');
       if($(password).val().length < 8){
           talert('Password must be more than 8 characters')
           return false;
       }
       submitForm('loginForm', 'userFx')
   })

   if ($(window).width() > 960) {
       $('.js-expanded-menu a').trigger('click')
   }
})	
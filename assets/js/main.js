var CRUMINA={};!function(e){"use strict";var n=e(window),t=e(document),o=e("body"),i=e(".fixed-sidebar"),a=e("#hellopreloader");CRUMINA.preloader=function(){return n.scrollTop(0),setTimeout((function(){a.fadeOut(800)}),500),!1},jQuery(".back-to-top").on("click",(function(){return e("html,body").animate({scrollTop:0},1200),!1})),e(document).on("click",".quantity-plus",(function(){var n=parseInt(e(this).prev("input").val());return e(this).prev("input").val(n+1).change(),!1})),e(document).on("click",".quantity-minus",(function(){var n=parseInt(e(this).next("input").val());return 1!==n&&e(this).next("input").val(n-1).change(),!1})),e((function(){var n;e(document).on("touchstart mousedown",".number-spinner button",(function(){var t=e(this),o=t.closest(".number-spinner").find("input");t.closest(".number-spinner").find("button").prop("disabled",!1),n="up"==t.attr("data-dir")?setInterval((function(){null==o.attr("max")||parseInt(o.val())<parseInt(o.attr("max"))?o.val(parseInt(o.val())+1):(t.prop("disabled",!0),clearInterval(n))}),50):setInterval((function(){null==o.attr("min")||parseInt(o.val())>parseInt(o.attr("min"))?o.val(parseInt(o.val())-1):(t.prop("disabled",!0),clearInterval(n))}),50)})),e(document).on("touchend mouseup",".number-spinner button",(function(){clearInterval(n)}))})),e('a[data-toggle="tab"]').on("shown.bs.tab",(function(n){"#events"===e(n.target).attr("href")&&e(".fc-state-active").click()})),e(".js-sidebar-open").on("click",(function(){return e("body").outerWidth()<=560&&e(this).closest("body").find(".popup-chat-responsive").removeClass("open-chat"),e(this).toggleClass("active"),e(this).closest(i).toggleClass("open"),!1})),n.keydown((function(e){27==e.which&&i.is(":visible")&&i.removeClass("open")})),t.on("click",(function(n){!e(n.target).closest(i).length&&i.is(":visible")&&i.removeClass("open")}));var l=e(".window-popup");e(".js-open-popup").on("click",(function(n){var t=e(this).data("popup-target"),i=l.filter(t),a=e(this).offset();return i.addClass("open"),i.css("top",a.top-i.innerHeight()/2),o.addClass("overlay-enable"),!1})),n.keydown((function(n){27==n.which&&(l.removeClass("open"),o.removeClass("overlay-enable"),e(".profile-menu").removeClass("expanded-menu"),e(".popup-chat-responsive").removeClass("open-chat"),e(".profile-settings-responsive").removeClass("open"),e(".header-menu").removeClass("open"),e(".js-sidebar-open").removeClass("active"))})),t.on("click",(function(n){e(n.target).closest(l).length||(l.removeClass("open"),o.removeClass("overlay-enable"),e(".profile-menu").removeClass("expanded-menu"),e(".header-menu").removeClass("open"),e(".profile-settings-responsive").removeClass("open"))})),e("[data-toggle=tab]").on("click",(function(){if(e(this).hasClass("active")&&e(this).closest("ul").hasClass("mobile-app-tabs"))return e(e(this).attr("href")).toggleClass("active"),e(this).removeClass("active"),!1})),e(".js-close-popup").on("click",(function(){return e(this).closest(l).removeClass("open"),o.removeClass("overlay-enable"),!1})),e(".profile-settings-open").on("click",(function(){return e(".profile-settings-responsive").toggleClass("open"),!1})),e(".js-expanded-menu").on("click",(function(){return e(".header-menu").toggleClass("expanded-menu"),!1})),e(".js-chat-open").on("click",(function(){return e(".popup-chat-responsive").toggleClass("open-chat"),!1})),e(".js-chat-close").on("click",(function(){return e(".popup-chat-responsive").removeClass("open-chat"),!1})),e(".js-open-responsive-menu").on("click",(function(){return e(".header-menu").toggleClass("open"),!1})),e(".js-close-responsive-menu").on("click",(function(){return e(".header-menu").removeClass("open"),!1})),CRUMINA.CallToActionAnimation=function(){var e=new ScrollMagic.Controller;new ScrollMagic.Scene({triggerElement:".call-to-action-animation"}).setVelocity(".first-img",{opacity:1,bottom:"0",scale:"1"},1200).triggerHook(1).addTo(e),new ScrollMagic.Scene({triggerElement:".call-to-action-animation"}).setVelocity(".second-img",{opacity:1,bottom:"50%",right:"40%"},1500).triggerHook(1).addTo(e)},CRUMINA.ImgScaleAnimation=function(){var e=new ScrollMagic.Controller;new ScrollMagic.Scene({triggerElement:".img-scale-animation"}).setVelocity(".main-img",{opacity:1,scale:"1"},200).triggerHook(.3).addTo(e),new ScrollMagic.Scene({triggerElement:".img-scale-animation"}).setVelocity(".first-img1",{opacity:1,scale:"1"},1200).triggerHook(.8).addTo(e),new ScrollMagic.Scene({triggerElement:".img-scale-animation"}).setVelocity(".second-img1",{opacity:1,scale:"1"},1200).triggerHook(1.1).addTo(e),new ScrollMagic.Scene({triggerElement:".img-scale-animation"}).setVelocity(".third-img1",{opacity:1,scale:"1"},1200).triggerHook(1.4).addTo(e)},CRUMINA.SubscribeAnimation=function(){var e=new ScrollMagic.Controller;new ScrollMagic.Scene({triggerElement:".subscribe-animation"}).setVelocity(".plane",{opacity:1,bottom:"auto",top:"-20",left:"50%",scale:"1"},1200).triggerHook(1).addTo(e)},CRUMINA.PlanerAnimation=function(){var e=new ScrollMagic.Controller;new ScrollMagic.Scene({triggerElement:".planer-animation"}).setVelocity(".planer",{opacity:1,left:"80%",scale:"1"},2e3).triggerHook(.1).addTo(e)},CRUMINA.ContactAnimationAnimation=function(){var e=new ScrollMagic.Controller;new ScrollMagic.Scene({triggerElement:".contact-form-animation"}).setVelocity(".crew",{opacity:1,left:"77%",scale:"1"},1e3).triggerHook(.1).addTo(e)},CRUMINA.responsive={$profilePanel:null,$desktopContainerPanel:null,$responsiveContainerPanel:null,init:function(){this.$profilePanel=jQuery("#profile-panel"),this.$desktopContainerPanel=jQuery("#desktop-container-panel > .ui-block"),this.$responsiveContainerPanel=jQuery("#responsive-container-panel .ui-block"),this.update()},mixPanel:function(){window.matchMedia("(max-width: 1024px)").matches?this.$responsiveContainerPanel.append(this.$profilePanel):this.$desktopContainerPanel.append(this.$profilePanel)},update:function(){var n=this,t=null;e(window).on("resize",(function(){null===t&&(t=window.setTimeout((function(){t=null,n.mixPanel()}),300))})).resize()}},e(".call-to-action-animation").length&&CRUMINA.CallToActionAnimation(),e(".img-scale-animation").length&&CRUMINA.ImgScaleAnimation(),e(".subscribe-animation").length&&CRUMINA.SubscribeAnimation(),e(".planer-animation").length&&CRUMINA.PlanerAnimation(),e(".contact-form-animation").length&&CRUMINA.ContactAnimationAnimation(),void 0!==e.fn.gifplayer&&e(".gif-play-image").gifplayer()}(jQuery);

function perfectScrollbarInit (){var n=$(".popup-chat .mCustomScrollbar");$(".mCustomScrollbar").perfectScrollbar({wheelPropagation:!1}),n.length&&(n.scrollTop(n.prop("scrollHeight")),n.perfectScrollbar("update"))}

function Toastr(t={}){this.defaults={theme:"",timeout:2e3,animation:"fade",position:"bottom",autohide:!0},this.extend(this.defaults,t),this.node=""}Toastr.prototype.extend=function(t,e){for(var o in e)e.hasOwnProperty(o)&&(t[o]=e[o]);return t},Toastr.prototype.show=function(t=""){document.getElementsByClassName("toastrWrap").length>0&&document.getElementsByClassName("toastrWrap")[0].remove(),this.node=document.createElement("div"),this.node.innerHTML=t,this.node.className="toastrWrap "+this.defaults.theme+" "+this.defaults.animation+" "+this.defaults.position,document.getElementsByTagName("body")[0].insertBefore(this.node,document.body.firstChild);var e=document.getElementsByClassName("toastrWrap")[0];e.style.marginLeft="-"+e.offsetWidth/2+"px",e.classList.add("show"),this.defaults.autohide&&this.remove(e,this.defaults.timeout)},Toastr.prototype.hide=function(){if(document.getElementsByClassName("toastrWrap").length>0){var t=document.getElementsByClassName("toastrWrap")[0];t.classList.remove("show"),setTimeout(()=>{t.remove()},300)}},Toastr.prototype.remove=function(t,e){setTimeout(()=>{t.classList.remove("show")},e),setTimeout(()=>{t.remove()},e+300)};

function triggerBtns(){
	$(document).on('click', "[data-target='custom-function']", function(ev){
		ev.preventDefault();
		var func		= $(this).data('_fnc');
		var params	=  $(this).data('_param') ;
		window[`${func}`](params); // call the function passed, send the params of the trigger as arg
	})						
}

$(document).ready(function() {

  $('.modal').on('hidden.bs.modal', function(event) {
      $(this).removeClass( 'fv-modal-stack' );
      $('body').data( 'fv_open_modals', $('body').data( 'fv_open_modals' ) - 1 );
  });

  $('.modal').on('shown.bs.modal', function (event) {
      // keep track of the number of open modals
      if ( typeof( $('body').data( 'fv_open_modals' ) ) == 'undefined' ) {
          $('body').data( 'fv_open_modals', 0 );
      }

      // if the z-index of this modal has been set, ignore.
      if ($(this).hasClass('fv-modal-stack')) {
          return;
      }

      $(this).addClass('fv-modal-stack');
      $('body').data('fv_open_modals', $('body').data('fv_open_modals' ) + 1 );
      $(this).css('z-index', 1040 + (10 * $('body').data('fv_open_modals' )));
      $('.modal-backdrop').not('.fv-modal-stack').css('z-index', 1039 + (10 * $('body').data('fv_open_modals')));
      $('.modal-backdrop').not('fv-modal-stack').addClass('fv-modal-stack'); 

  });        
});

function activateSwiper(){
    var swipers = {};
    var e = 0,
      i = !1;
    $(".swiper-container").each(function () {
        var a = $(this),
        t = "swiper-unique-id-" + e;
        a.addClass("swiper-" + t + " initialized").attr("id", t), a.find(".swiper-pagination").addClass("pagination-" + t);
        var n = a.data("effect") ? a.data("effect") : "slide",
          s = !a.data("crossfade") || a.data("crossfade"),
          o = 0 != a.data("loop") || a.data("loop"),
          r = a.data("show-items") ? a.data("show-items") : 1,
          l = a.data("scroll-items") ? a.data("scroll-items") : 1,
          c = a.data("direction") ? a.data("direction") : "horizontal",
          d = !!a.data("mouse-scroll") && a.data("mouse-scroll"),
          m = a.data("autoplay") ? parseInt(a.data("autoplay"), 10) : 0,
          p = !!a.hasClass("auto-height"),
          u = r > 1 ? 20 : 0;
      r > 1 && (i = { 480: { slidesPerView: 1, slidesPerGroup: 1 }, 768: { slidesPerView: 2, slidesPerGroup: 2 } }),
          (swipers["swiper-" + t] = new Swiper(".swiper-" + t, {
              pagination: ".pagination-" + t,
              paginationClickable: !0,
              direction: c,
              mousewheelControl: d,
              mousewheelReleaseOnEdges: d,
              slidesPerView: r,
              slidesPerGroup: l,
              spaceBetween: u,
              keyboardControl: !0,
              setWrapperSize: !0,
              preloadImages: !0,
              updateOnImagesReady: !0,
              autoplay: m,
              autoHeight: p,
              loop: o,
              breakpoints: i,
              effect: n,
              fade: { crossFade: s },
              parallax: !0,
              onSlideChangeStart: function (e) {
                  var i = a.siblings(".slider-slides");
                  if (i.length) {
                      i.find(".slide-active").removeClass("slide-active");
                      var t = e.slides.eq(e.activeIndex).attr("data-swiper-slide-index");
                      i.find(".slides-item").eq(t).addClass("slide-active");
                  }
              },
          }));

          var mySwiper = document.querySelector(".swiper-" + t).swiper;
          mySwiper.update();          
          e++;
  });

  $(".btn-prev").on("click", function () {
      var e = $(this).closest(".slider-slides").siblings(".swiper-container").attr("id");
      swipers["swiper-" + e].slidePrev();
  }),
  $(".btn-next").on("click", function () {
      var e = $(this).closest(".slider-slides").siblings(".swiper-container").attr("id");
      swipers["swiper-" + e].slideNext();
  }),
  $(".btn-prev-without").on("click", function () {
      var e = $(this).closest(".swiper-container").attr("id");
      swipers["swiper-" + e].slidePrev();
  }),
  $(".btn-next-without").on("click", function () {
      var e = $(this).closest(".swiper-container").attr("id");
      swipers["swiper-" + e].slideNext();
  }),
  $(".slider-slides .slides-item").on("click", function () {
      if ($(this).hasClass("slide-active")) return !1;
      var e = $(this).parent().find(".slides-item").index(this),
          i = $(this).closest(".slider-slides").siblings(".swiper-container").attr("id");
      return swipers["swiper-" + i].slideTo(e + 1), $(this).parent().find(".slide-active").removeClass("slide-active"), $(this).addClass("slide-active"), !1;
  });	
  var e = $(".counter");
  e.length &&
	  e.each(function () {
	      jQuery(this).waypoint(
	          function () {
	              $(this.element).find("span").countTo(), this.destroy();
	          },
	          { offset: "95%" }
	      );
	  });

}

// function menu_open() {
//     jQuery(".main-menu").css({"transform":"translateX(0)"}) 
// }
// function menu_close() { 
//     jQuery(".main-menu").css({"transform":"translateX(320px)"})
// }

jQuery(window).scroll(function(){
  if (jQuery(window).scrollTop() >= 100) {
    jQuery('header').addClass('fixed');
   }
   else {
    jQuery('header').removeClass('fixed');
   }
});

jQuery(document).ready(function(){
  jQuery(".srch-tgl, .srch-close").click(function(){
    jQuery(".srch-pop").toggle();
  });
});



// jQuery(document).ready(function(){
//   var figure = jQuery(".video").hover( hoverVideo, hideVideo );

//   function hoverVideo(e) {
//     jQuery('video', this).get(0).play();
//   }
//   function hideVideo(e) {
//     jQuery('video', this).get(0).pause();
//   }
// });
jQuery(document).ready(function(){
  var nowPlaying = "none";
  jQuery('div').hover(function(){
          nowPlaying = jQuery(this).find('iframe').attr('src');
          jQuery(this).find('iframe').attr('src',nowPlaying+'&autoplay=1');
      }, function(){
        jQuery(this).find('iframe').attr('src',nowPlaying);
      });
});

jQuery(document).ready(function () {
  jQuery("#text-roller1").owlCarousel({
    loop: true,
    margin: 25,
    nav: false,
    dots: false,
    items: 5,
    rtl:true,
    autoplay: true,
    slideTransition: "linear",
    autoplayTimeout: 3000,
    autoplaySpeed: 3000,
    responsive: {
      0: {
        items: 3,
        margin: 20,
      
      },
      768: {
        items: 4,
        margin: 20,
   
      },
      1024: {
        items: 5,
        margin: 25,
    
      },
      1440: {
        items: 6,
        margin: 25,
      },
    },
  });
});


jQuery(document).ready(function () {
  jQuery("#text-roller2").owlCarousel({
    loop: true,
    margin: 25,
    nav: false,
    dots: false,
    items: 5,
    autoplay: true,
    slideTransition: "linear",
    autoplayTimeout: 3000,
    autoplaySpeed: 3000,
    responsive: {
      0: {
        items: 3,
        margin: 0,
      
      },
      768: {
        items: 4,
        margin: 0,
   
      },
      1024: {
        items: 5,
        margin: 0,
    
      },
      1440: {
        items: 6,
        margin: 25,
      },
    },
  });
});


jQuery(document).ready(function () {
  jQuery("#text-roller3").owlCarousel({
    loop: true,
    margin: 5,
    nav: false,
    dots: false,
    rtl:true,
    items: 5,
    autoplay: true,
    slideTransition: "linear",
    autoplayTimeout: 3000,
    autoplaySpeed: 3000,
    responsive: {
      0: {
        items: 3,
        margin: 0,
      
      },
      768: {
        items: 4,
        margin: 0,
   
      },
      1024: {
        items: 5,
        margin: 0,
    
      },
      1440: {
        items: 6,
        margin: 25,
      },
    },
  });
});

jQuery(document).ready(function () {
  jQuery('#aboutDoc_carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    items:1,
    dots:false,
    navContainer:false,
    navText: ["<img src='images/arrow-left.png'>","<img src='images/arrow-right.png'>"],
});
});


// For-images-filter(Start)

jQuery(document).ready(function(){

    jQuery(".filter-button").click(function(){
        var value = jQuery(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            jQuery('.filter').show('1000');
        }
        else
        {
//            jQuery('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            jQuery(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            jQuery(".filter").not('.'+value).hide('3000');
            jQuery('.filter').filter('.'+value).show('3000');
            
        }
    });
    
//     if (jQuery(".filter-button").removeClass("active")) {
// jQuery(this).removeClass("active");
// }
// jQuery(this).addClass("active");


  jQuery('.filter-button').click(function(){
    
    if(jQuery(this).hasClass("active")){
        jQuery(this).removeClass("active");
    }else{
        jQuery('.filter-button').removeClass("active");
        jQuery(this).addClass("active");
    }
    
});

});

// For-images-filter(End)
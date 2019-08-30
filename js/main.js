// NEW NAVBAR ON SCROLL

 $('#scroll-nav').hide();

$(window).scroll(function(){
 	
 	var winY = $(window).scrollTop();

 	if ( winY > 900 ) {
		
    	$('#scroll-nav').fadeIn(200);
	

	} else if (winY < 900) {

      $('#scroll-nav').fadeOut(200);

    } 

});


// PARALLAX EFFECT

  var parallaxElements = $('.parallax'),
    parallaxQuantity = parallaxElements.length

  $(window).on('scroll', function() {
    window.requestAnimationFrame(function() {
        for (var i = 0; i < parallaxQuantity; i++) {
          var currentElement = parallaxElements.eq(i)
          var scrolled = $(window).scrollTop()

          currentElement.css({
            transform: 'translate3d(0,' + scrolled * -0.3 + 'px, 0)'
          });
        }
    });
  });



// LOCATIONS PAGE ADDRESS LOAD

$(document).ready(function(){

 
  function midCity() {
      $('#uptown').hide();
      $('#catering').hide();
      $('#mmary').hide();
      $('#midcity').fadeIn("slow");
    }


  if (window.location.hash === '#midcity') {
    midCity();
  }

  $('#midcity-link').click(midCity);
  
  $('#midcity-nav').click(function(e) {
    midCity();
    e.preventDefault();
  });


  function upTown(){
    $('#midcity').hide();
    $('#catering').hide();
    $('#mmary').hide();
    $('#uptown').fadeIn("slow");
  }

  if (window.location.hash === '#uptown') {
    upTown();
  }

  $('#uptown-link').click(upTown); 
  
  $('#uptown-nav').click(function(e) {
    upTown();
    e.preventDefault();
  }); 

  function catering(){
    $('#midcity').hide();
    $('#uptown').hide();
    $('#mmary').hide();
    $('#catering').fadeIn("slow");
  }

  if (window.location.hash === '#catering') {
    catering();
  }

  $('#catering-link').click(catering);

  $('#catering-nav').click(function(e) {
    catering();
    e.preventDefault();
  });
 
  function mMary(){
    $('#midcity').hide();
    $('#uptown').hide();
    $('#catering').hide();
    $('#mmary').fadeIn("slow");
  }

  if (window.location.hash === '#mmary') {
    mMary();
  }  

  $('#mmary-link').click(mMary);
  
  $('#mmary-nav').click(function(e) {
    mMary();
    e.preventDefault();
  });

});


// // DROPDOWN MENU

$(document).ready(function () {
    $('.dropdown').click(function (e) {
        e.stopPropagation();
        $('.dropdown-menu').not(this).removeClass('open');
        $(this).children().toggleClass('open');
    });

    $(document).click(function () {
        $('.dropdown-menu').removeClass('open');
    });

    $(document).scroll(function() {
      $('.dropdown-menu').removeClass('open');
    });
});


// // ATTACHMENT BUTTON

var inputs = document.querySelectorAll('.file-btn');

Array.prototype.forEach.call( inputs, function(input) {

  var label  = input.nextElementSibling,
    labelVal = label.innerHTML;

  input.addEventListener('change', function(e) {
    
    var fileName = '';
    fileName = e.target.value.split( '\'' ).pop();

    if(fileName)
      label.querySelector('span').innerHTML = fileName;
    else
      label.innerHTML = labelVal;
  });
  
});


// // FONTAWESOME ICON SPIN

var timer;     
$(window).scroll(function(e){
         clearTimeout(timer);
         $('.effect').addClass('fast-spin');
         timer = setTimeout(checkStop, 200);
 });

function checkStop(){
  $('.effect').removeClass('fast-spin');
} 

// BOUNCING LOGO

$('.logo').on('click', function(e){
  e.preventDefault();
  $('.logo').addClass("tada");
  setTimeout( function() {
  window.location.href = $('.logo > a').attr('href')
  
  }, 1500 );
});


// PAGE TRANSITION

$(document).ready(function(){
  $('body').animate({
    opacity: '1',
    transition: 'ease-in'
  });
});

// Initialize Swiper

    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });







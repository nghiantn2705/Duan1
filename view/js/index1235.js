
$(document).ready(function () {
  
  $(document).scroll(function () {
    const header = document.querySelector(".header");
    if (window.scrollY > 20) {
      header.classList.add("header-active");
    } else {
      header.classList.remove("header-active");
    }
  });
  $(document).scroll(function () {
    const header = document.querySelector(".nav-menu");
    if (window.scrollY > 20) {
      header.classList.add("nav-menu-active");
    } else {
      header.classList.remove("nav-menu-active");
    }
  });
  var swiper = new Swiper(".mySwiper", {
    loop: true,
        loopFillGroupWithBlank: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 3,
        spaceBetween: 50,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
      },
      // when window width is >= 480px
      480: {
        slidesPerView: 3,
        spaceBetween: 50,
        slidesPerGroup: 4,
        loop: true,
        loopFillGroupWithBlank: true,
      },
      // when window width is >= 640px
      1024: {
        slidesPerView: 4,
        spaceBetween: 50,
        slidesPerGroup: 4,
        loop: true,
        loopFillGroupWithBlank: true,
      }
    },
  });

  var swiper1 = new Swiper(".mySwiper1", {
  
   autoplay:{
    delay:6000,
    disableOnInteraction: true,
   },
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 3,
        spaceBetween: 50,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
      },
      // when window width is >= 480px
      480: {
        slidesPerView: 3,
        spaceBetween: 50,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
      },
      // when window width is >= 640px
      1024: {
        slidesPerView: 4,
        spaceBetween: 50,
        slidesPerGroup: 4,
        loop: true,
        loopFillGroupWithBlank: true,
      }
    },
  });
  $.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") ); 
    })
}
$(".span-numbers").digits();
});

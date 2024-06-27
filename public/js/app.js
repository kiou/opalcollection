$( document ).ready(function() {
    var menu = $('.navigation');

    var checkScroll = function() {

      if ($(window).scrollTop() > 60) {
        menu.addClass('fixed');
        if ($('.message').length) {
            $('.message').remove();
        }
      } else {
        menu.removeClass('fixed');
      }
    };
  
    checkScroll();
  
    $(window).scroll(checkScroll);

    $(".owl-one").owlCarousel({
      loop:false,
      items:1,
      nav:false,
    });

    $(".owl-two").owlCarousel({
      loop:false,
      items:1,
      nav:true,
      navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
    });

  $(document).on('click','.section2Pays a',function(e) {
    e.preventDefault();

    var code = $(this).attr('data-code');

    $('.collectionCarte').show();

    $('.collectionCarte').not('[data-code="' + code + '"]').hide();

    $('html, body').animate({
      scrollTop: $('#section2CartesListe').offset().top - 85
    }, 400);

  })

  $(document).on('click', '.theCollectionMenu a', function(e){
    e.preventDefault();
    var block = $(this).attr('href');

    $('html, body').animate({
      scrollTop: $(block).offset().top - 85
    }, 400);
  })

});


document.addEventListener("DOMContentLoaded", function() {
  const sliders = document.querySelectorAll('.owl-two');
  const links = document.querySelectorAll('.section8GaleriesChoix a');
  
  // Affiche le premier slider et active le premier lien
  if (sliders.length > 0 && links.length > 0) {
      sliders[0].classList.add('active');
      links[0].classList.add('active');
  }

  links.forEach(link => {
      link.addEventListener('click', function(event) {
          event.preventDefault();
          const targetId = this.getAttribute('href');
          
          sliders.forEach(slider => {
              slider.classList.remove('active');
          });

          links.forEach(link => {
              link.classList.remove('active');
          });

          const targetSlider = document.getElementById(targetId);
          if (targetSlider) {
              targetSlider.classList.add('active');
          }
          this.classList.add('active');
      });
  });
});

const accordionItems = document.querySelectorAll('.accordion');

accordionItems.forEach((item) => {
    item.addEventListener('click', function () {
        this.classList.toggle('active');
    });
});

function retourEnHaut() {
  let positionActuelle = document.documentElement.scrollTop || document.body.scrollTop;
  let vitesseAnimation = 10; // Vitesse de l'animation (plus petite = plus rapide)

  if (positionActuelle > 0) {
      window.requestAnimationFrame(retourEnHaut);
      window.scrollTo(0, positionActuelle - (positionActuelle / vitesseAnimation));
  }
}

window.onscroll = function() {
  afficherBouton();
};

function afficherBouton() {
  var bouton = document.getElementById("btnHaut");
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      bouton.style.display = "block";
  } else {
      bouton.style.display = "none";
  }
}



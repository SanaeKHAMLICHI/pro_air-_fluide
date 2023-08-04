// ---------- 1er carosel--------------------------------------------------------------------------------------
let carousel = document.querySelector('.carousel');
let flkty = new Flickity(carousel, {
  imagesLoaded: true,
  percentPosition: false,
  autoPlay: true,


});

// let imgs = carousel.querySelectorAll('.carousel-cell img');
// let docStyle = document.documentElement.style;
// let transformProp = typeof docStyle.transform === 'string' ? 'transform' : 'WebkitTransform';

// flkty.on('scroll', function() {
//   flkty.slides.forEach(function(slide, i) {
//     let img = imgs[i];
//     let x = (slide.target + flkty.x) * -1 / 3;
//     img.style[transformProp] = 'translateX(' + x + 'px)';
//   });
// });

// flkty.on('select', function() {
//   // Récupérer l'index de la diapositive actuelle
//   let currentIndex = flkty.selectedIndex;
//   console.log(currentIndex);
//   // Récupérer le nombre total de diapositives
//   let totalSlides = flkty.slides.length;
//   console.log(totalSlides);
// console.log(flkty.slides);
  
//   // Si l'index actuel est égal à l'index de la dernière diapositive,
//   // passer à la première diapositive (index 0)
//   if (currentIndex === totalSlides -1) {
    
//     flkty.select(0); // Sélectionne la première diapositive
//   }
// });


// ---------------- Quanity ---------------

console.log('sp_nav.js');

var nav = document.getElementById('js-spNav');
var hamburger = document.getElementById('js-hamburger');

hamburger.addEventListener('click', function() {
  nav.classList.toggle('open');
})

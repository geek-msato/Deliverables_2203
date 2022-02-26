console.log('sp_nav.js');

window.onload = function() {
  var nav = document.getElementById('js-spNav');
  var hamburger = document.getElementById('js-hamburger');

  hamburger.addEventListener('click', function() {
    nav.classList.toggle('open');
  })
}

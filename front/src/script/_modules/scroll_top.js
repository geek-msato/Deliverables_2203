console.log('scroll_top.js');

var pageTop = document.getElementById('js-scroll');

pageTop.addEventListener('click', scroll_top);

function scroll_top() {
  window.scroll({
    top: 0,
    behavior: 'smooth',
  })
};

window.addEventListener('scroll', scroll_event);

function scroll_event() {
  if(window.pageYOffset > 300) {
    pageTop.classList.add('show');
  } else {
    pageTop.classList.remove('show');
  }
};

window.addEventListener('scroll', scroll_stop);

function scroll_stop() {
  var scroll = window.pageYOffset;
  var height = window.innerHeight;
  var headerHeight = document.getElementById('footer').clientHeight;
  var footerPosition = document.getElementById('footer').offsetTop + headerHeight - 40;
  if(scroll + height >= footerPosition) {
    pageTop.classList.add('absolute');
  } else {
    pageTop.classList.remove('absolute');
  }
};


require('./bootstrap')
require('bootstrap/dist/js/bootstrap.min.js');
require('owl.carousel/src/js/owl.carousel');
require('owl.carousel/src/js/owl.navigation');
require('./pages/general');

require('./viewer/index');

  var pathname = (window.location.pathname == '/') ? '' : window.location.pathname;

  $('.nav-item .nav-link').each(function (index) {
    if($(this).attr("href") == (window.location.origin + pathname)){
      $(this).attr("class","nav-link active");
    }
    else{
      $(this).attr("class","nav-link");
    }
  })

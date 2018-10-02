$(function () {
  'use strict'

  $('.page-item .page-link').each(function (index) {
    if($(this).attr("href") == window.location.href){
      console.log($(this).parent().attr('class', 'active'));
      $(this).parent().attr("class","page-item active");
    }
    else{
      $(this).parent().attr("class","page-item");
    }
  })

})

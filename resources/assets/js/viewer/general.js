var pathname = (window.location.pathname == '/') ? '' : window.location.pathname;

// lam viec voi menu

$('.nav-item .nav-link').each(function (index) {
  if($(this).attr("href") == (window.location.origin + pathname)){
    $(this).attr("class","nav-link active");
  }
  else{
    $(this).attr("class","nav-link");
  }
})

$('.nav-item .nav-link').each(function (index) {
  console.log($(this).attr('href').indexOf($('#show-post-id').attr('uri_category')));
  if($(this).attr('href').indexOf($('#show-post-id').attr('uri_category')) !== -1){
    $(this).attr("class","nav-link active");
  }
})

// lam viec voi paginate

$('.page-item .page-link').each(function (index) {
  if($(this).attr("href") == window.location.href){
    $(this).parent().attr("class","page-item active");
  }
  else{
    $(this).parent().attr("class","page-item");
  }
})

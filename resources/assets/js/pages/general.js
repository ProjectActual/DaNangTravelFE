window.trimSlash = function (text)
{
  return text.replace(/^\/|\/$/g, '');
}

window.displayErrors  = function (err)
{
  if(isEmpty(err)) {
    return console.log(err);
  }

  var errors = err.response.data.errors;
  if(typeof errors == 'object') {
    for (var key in errors) {
      window.toastr.error(errors[key][0]);
    }
  }else {
    swal({
      title: "Oops...",
      text: err.response.data.message,
      type: "error"
    }).then(function(){
      if(err.response.data.type == 'credential') {
        window.location.href = window.location.origin + '/admin/profile';
      }
    });
  }
}

window.displayMessages = function (message, redirect='')
{
  message = message.data;
  const time = 3000;

  swal({
    title: "Thành công",
    text: message.message,
    type: "success"
  }).then(function(){
    if(redirect != '') {
      window.location.href = window.location.origin + redirect;
    }
  });
}

window.url = function (uri)
{
  return `http://danangtravel-api.com${uri}`;
}

window.convertToSlug = function (text)
{
  text = window.nonAccentVietnamese(text);
  text = text.replace(/-+/g,' ');
  text = text.toLowerCase();
  text = text.replace(/[^\w ]+/g,'');
  text = text.replace(/ +/g,'-');
  text = text.replace(/\s\s+/g, ' ');

  if (text[0] == '-') {
    text = text.substr(1);
  }

  if (text[text.length - 1] == '-') {
    text = text.substr(0, text.length - 1);
  }

  return text;
}

window.nonAccentVietnamese = function (str)
{
  str = str.toLowerCase();
  str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
  str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
  str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
  str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
  str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
  str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
  str = str.replace(/đ/g, "d");
  str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, "");
  str = str.replace(/\u02C6|\u0306|\u031B/g, "");

  return str;
}


window.paginate = function(data, linkUrl)
{
  var meta = data.meta.pagination;
  var links = data.links;

  if(meta.total_pages == 1) {
    $('.pagination-js').html('');
    return;
  }

  var count = (meta.per_page == meta.count) ? 0 : (meta.per_page - meta.count)
  var to = meta.per_page * (meta.current_page) - count;
  var from = to - meta.count + 1;
  var str = '';

  str = str + `
  <div class="col-sm-6">
  show ${from} to ${to} of ${meta.total} entities
  </div>
  <nav aria-label="Page navigation example" class="col-sm-6 text-right">
  <ul class="pagination">
  <li class="page-item">
  <a class="page-link prev_page_url" href="${links.first}" aria-label="Previous">
    <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="page-link prev_page_url" href="${links.prev}" aria-label="Previous">
    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
    <span class="sr-only">Previous</span>
  </a>
  </li>
  <li class="page-item">
  <a class="page-link next_page_url" href="${links.next}" aria-label="Next">
    <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
    <span class="sr-only">Next</span>
  </a>
  <a class="page-link prev_page_url" href="${links.last}" aria-label="Previous">
    <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
  </a>
  </li>
  </ul>
  </nav>`
  $('.pagination-js').html(str);

}

// nhập key và lấy param từ url , ví dụ url/quy?phuong=5 , giá trị nhập vào là phuong thi sẽ get ra 5
window.getQuery = function (query, linkUrl) {
  query = query.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var expr = "[\\?&]"+query+"=([^&#]*)";
  var regex = new RegExp( expr );
  var results = regex.exec(linkUrl);
  if( results !== null ) {
    return results[1];
    return decodeURIComponent(results[1].replace(/\+/g, " "));
  } else {
    return '';
  }
};

window.convertDate = function(date = '') {
  var today = new Date(date);
  var dd = today.getDate();

  var mm = today.getMonth()+1;
  var yyyy = today.getFullYear();
  if(dd<10)
  {
    dd='0'+dd;
  }

  if(mm<10)
  {
    mm='0'+mm;
  }
  today = dd+'-'+mm+'-'+yyyy;

  return today;
};

window.isEmpty = function (obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}

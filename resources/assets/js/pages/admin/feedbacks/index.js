$(function () {
  'use strict';

  CKEDITOR.replace('contentTo', {
    filebrowserBrowseUrl      : '/template/cktemplate/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '/template/cktemplate/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '/template/cktemplate/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl      : '/template/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '/template/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '/template/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    height: '300px',
    toolbarGroups: [
      { name: 'basicstyles'},
      { name: 'paragraph', groups: [ 'list','align' ] },
    ]
  });

  loadData();

  var email;

  function loadData(linkUrl = url('/api/admin/feedbacks'))
  {
    axios.get(linkUrl, {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      var index = 1;
      var feedback = res.data.data.feedbacks.data;
      var str = '';
      for(var value in feedback) {
        var str = str +
        `<tr>
        <td>${index++}</td>
        <td>${feedback[value]['attributes'].sender}</td>
        <td>${feedback[value]['attributes'].email}</td>
        <td>${feedback[value]['attributes'].title}</td>
        <td class="text-center text-nowrap">${convertDate(feedback[value]['attributes'].created_at.date)}</td>
        <td class="text-center text-nowrap">
        <button class="btn btn-xs btn-info btnChiTiet" hash="${feedback[value].id}">Chi tiết</button>
        <button class="btn btn-xs btn-danger btnXoa" hash="${feedback[value].id}">Xoá</button>
        </td>
        </tr>`;
      }
      $('#table-body').html(str);
      var pagination = res.data.data.feedbacks;
      paginate(pagination, linkUrl);

    }).catch(err => {
      displayErrors(err);
    })
  }

  $('body').on('click', '.page-link', function(e) {
    e.preventDefault();
    if ($(this).attr('href').indexOf('undefined') == 0) {
      return
    }

    var url = $(this).attr('href');
    loadData(url);
  });

  $('body').on('click', '.btnXoa', function () {
    const hash = $(this).attr('hash');

    axios.delete(url(`/api/admin/feedbacks/${hash}`), {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      loadData();
      displayMessages(res);
    }).catch(err => {
      displayErrors(err);
    })
  })

  $('body').on('click', '.btnChiTiet', function () {
    const hash = $(this).attr('hash');

    axios.get(url(`/api/admin/feedbacks/${hash}`), {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      var data = res.data.data.feedback.data;

      $('.heading-title').html(data.attributes.title);
      $('.email').html(data.attributes.email);
      $('.contentChiTiet').html(data.attributes.content);
      email = data.attributes.email;

      $('#chiTiet').modal('show');
    }).catch(err => {
      displayErrors(err);
    })
  })

  $('body').on('click', '.show-feedback', function () {
    if($('.sent-feedback').hasClass('none')) {
     $('#email-to').val(email);
     $('.sent-feedback').removeClass('none');
   }
 })

  $('body').on('click', '.closed', function () {
    if(!$('.sent-feedback').hasClass('none')) {
      $('.sent-feedback').addClass('none');
      $('#email-to').val('');
      $('#subject-to').val('');
      CKEDITOR.instances.contentTo.setData('');
    }
  })

  $('body').on('click', '#sendFeedback', function () {
    const payload = {
      'title'  : $('#subject-to').val(),
      'content': CKEDITOR.instances.contentTo.getData(),
      'email'  : $('#email-to').val(),
    }

    axios.post(url('/api/admin/feedbacks/send'), payload, {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
        $('.closed').click();
        displayMessages(res);
    }).catch(err => {
        displayErrors(err);
    })
  })
})

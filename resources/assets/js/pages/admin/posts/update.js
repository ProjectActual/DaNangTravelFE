$(function () {
  'use strict';

  var link = '';

  CKEDITOR.replace('content', {
    filebrowserBrowseUrl      : '/cktemplate/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '/cktemplate/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '/cktemplate/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl      : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    height: '600px',
  });

  deleteImage();

  function deleteImage() {
    var avt_post = $('#avt_post').dropify();

    avt_post.on('dropify.afterClear', function (event, element) {
      swal('Delete','Xóa thành công', 'success')
    });

    avt_post.on('dropify.errors', function (event, element) {
      swal('Oops...', 'Something went wrong!', 'error')
    });
  }

  $('#title').on('keyup', function () {

    var title = $('#title').val();

    title = window.convertToSlug(title);

    $('#link').val(title);
  });

  $('#edit_link').on('click', function() {
    link = $('#link').val();

    if ($(this).text() == 'Chỉnh sửa link bài viết') {
      $(this).html('Xong');
      $('#link').prop('disabled', false);
      $('#cancel_link').css('display', 'inline');
    } else {
      var link = window.convertToSlug($('#link').val());

      $('#link').val(link);
      $(this).html('Chỉnh sửa link bài viết');

      $('#link').prop('disabled', true);
      $('#cancel_link').css('display', 'none');
    }
  });

  $('#cancel_link').on('click', function () {
    $('#link').val(link);
    if ($('#edit_link').text() == 'Chỉnh sửa link bài viết') {
      $('#edit_link').html('Xong');
      $('#link').prop('disabled', false);
      $('#cancel_link').css('display', 'inline');
    } else {
      var link = window.convertToSlug($('#title').val());

      $('#edit_link').html('Chỉnh sửa link bài viết');
      $('#link').prop('disabled', true);

      $('#link').val(link);
      $('#cancel_link').css('display', 'none');
    }
  });

  var files;

  $('body').on('change', '#avt_post', function (e) {
    files = e.target.files;
  });

  $('body').on('click', '#btnSubmit', function () {

    const hash = $(this).attr('hash');

    var data = new FormData();

    $.each(files, function(key, value)
    {
      data.append('fileUpload', value);
    });

    axios.post(url('/api/uploadFile'), data, {
      headers : {
        'Content-Type'  : false,
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
        sendRequestUpdate(res.data);
    }).catch(err => {
        displayErrors(err);
    })

  })

  function sendRequestUpdate(avatar_post)
  {
    const hash = $('#btnSubmit').attr('hash');
    const tags = JSON.stringify($("#tag").tagsinput('items'));

    const payload = {
      'title'         : $('#title').val(),
      'uri_post'      : $('#link').val(),
      'content'       : CKEDITOR.instances.content.getData(),
      'status'        : $('#checkbox').prop('checked') ? 'ACTIVE' : 'INACTIVE',
      'tag'           : tags,
      'category_id'   : $('#danh_muc').val(),
      'avatar_post'   : avatar_post,
      'summary'       : $('#summary').val()
    }

    axios.put(url(`/api/admin/posts/${hash}`), payload, {
      headers : {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      displayMessages(res, '/admin/posts');
    }).catch(err => {
      displayErrors(err);
    })
  }

  $('body').on('click', '#btnCancel', function () {
    window.location.href = window.location.origin + '/admin/posts';
  })
});

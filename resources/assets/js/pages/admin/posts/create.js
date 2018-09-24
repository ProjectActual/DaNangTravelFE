$(function () {
  'use strict';

  console.log('page create');

  deleteImage();
  loadCategories();

  var link = '';

  CKEDITOR.replace('content', {
    filebrowserBrowseUrl      : '/template/cktemplate/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '/template/cktemplate/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '/template/cktemplate/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl      : '/template/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '/template/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '/template/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    height: '600px',
  });

  function loadCategories()
  {
    axios.get(url('/api/admin/categories'), {
      headers : {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      const categories = res.data;
      var str = '<option>Chọn ...</option>';
      for(let index in categories) {
        str = str + `<option value="${categories[index].id}">${categories[index].name_category}</option>`
      }
      $('#danh_muc').html(str);
    })
  }

  function deleteImage() {
    var avt_post = $('#avt_post').dropify();

    avt_post.on('dropify.afterClear', function (event, element) {
      Swal('Delete','Xóa thành công', 'success')
    });

    avt_post.on('dropify.errors', function (event, element) {
      Swal('Oops...', 'Something went wrong!', 'error')
    });
  }

  $('#title').on('keyup', function () {
    console.log('Đã tạo link bài viết');

    var title = $('#title').val();

    title = window.convertToSlug(title);

    $('#link').val(title);
  });

  $('#edit_link').on('click', function() {
    link = $('#link').val();
    console.log('click');

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

  $('body').on('click', '#btnSubmit', function () {
    console.log('click btnsubmit');
    var file = $("#avt_post")[0].files[0];

    const payload = {
      'title'       : $('#title').val(),
      'uri_post'    : $('#link').val(),
      'content'     : CKEDITOR.instances.content.getData(),
      'avatar_post' : file,
      'status'      : $('#checkbox').prop('checked'),
      'tag'         : $("#tag").tagsinput('items'),
      'category_id' : $('#danh_muc').val()
    }

    axios.post(url('/api/admin/posts'), payload, {
      headers : {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      displayMessages(res);
    }).catch(err => {
      displayErrors(err);
    })
  })

  $('body').on('click', '#btnCancel', function () {
    window.location = window.location.origin + '/admin/posts';
  })
});

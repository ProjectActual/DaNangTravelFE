$(function () {
  'use strict';

  loadData();

  function loadData(linkUrl = url('/api/admin/categories'))
  {
    axios.get(linkUrl, {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      var index = 1;
      var categories = res.data;
      var str = '';
      for(var value in categories) {
        var str = str +
        `<tr>
        <td>${index++}</td>
        <td>${categories[value].name_category}</td>
        <td>${categories[value].uri_category}</td>
        <td>${categories[value].description}</td>
        <td>${categories[value].posts_count}</td>
        <td class="text-center text-nowrap">
        <button class="btn btn-xs btn-primary btnSua" hash="${categories[value].id}">Sửa</button>
        <button class="btn btn-xs btn-danger btnXoa" hash="${categories[value].id}">Xóa</button>
        </td>
        </tr>`;
      }
      $('#table-body').html(str);

    }).catch(err => {
      displayErrors(err);
    })
  }

  $('body').on('click','#btnAdd', function () {

    const payload = {
      'name_category'  : $('#name_category').val(),
      'uri_category'   : $('#link').val(),
      'description'    : $('#description').val()
    };

    axios.post(url('/api/admin/categories'), payload, {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      displayMessages(res);
      loadData();
      $('#name_category').val('');
      $('#link').val('');
      $('#description').val('');
    }).catch(err => {
      displayErrors(err);
    })
  })

  $('#name_category').on('keyup', function () {
    var name_category = $('#name_category').val();

    name_category = window.convertToSlug(name_category);

    $('#link').val(name_category);
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
      var link = window.convertToSlug($('#name_category').val());

      $('#edit_link').html('Chỉnh sửa link bài viết');
      $('#link').prop('disabled', true);

      $('#link').val(link);
      $('#cancel_link').css('display', 'none');
    }
  });

  $('body').on('click', '#btnCancel', function () {
    $('#name_category').val('');
    $('#link').val('');
    $('#description').val('');
  })

  $('body').on('keyup', '#name_category', function(e) {
    if (e.which == 13) {
      $('#btnAdd').click();
    }
  });

  $('body').on('keyup', '#link', function(e) {
    if (e.which == 13) {
      $('#edit_link').click();
    }
  });

//update
$('body').on('click', '.btnSua', function () {
  const hash = $(this).attr('hash');

  axios.get(url(`/api/admin/categories/edit/${hash}`), {
    headers: {
      'Content-Type'  : 'application/json',
      'Accept'        : 'application/json',
      'Authorization' : `Bearer ${Cookies.get('access_token')}`
    }
  }).then(res => {
    $('#name_category_update').val(res.data.name_category);
    $('#link_update').val(res.data.uri_category);
    $('#description_update').val(res.data.description);
    $('#updateModal').attr('hash', res.data.id);

    $('#myUpdate').modal('show');
  })
})

$('body').on('click', '#updateModal', function () {
  const hash = $(this).attr('hash');

  const payload = {
    'name_category' : $('#name_category_update').val(),
    'uri_category'  :  $('#link_update').val(),
    'description'   : $('#description_update').val(),
  }

  axios.put(url(`/api/admin/categories/${hash}`), payload, {
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
  $('#name_category_update').on('keyup', function () {

    var name_category = $('#name_category_update').val();

    name_category = window.convertToSlug(name_category);

    $('#link_update').val(name_category);
  });

  $('#edit_link_update').on('click', function() {
    link_update = $('#link_update').val();

    if ($(this).text() == 'Chỉnh sửa link bài viết') {
      $(this).html('Xong');
      $('#link_update').prop('disabled', false);
      $('#cancel_link_update').css('display', 'inline');
    } else {
      var link_update = window.convertToSlug($('#link_update').val());

      $('#link_update').val(link_update);
      $(this).html('Chỉnh sửa link bài viết');

      $('#link_update').prop('disabled', true);
      $('#cancel_link_update').css('display', 'none');
    }
  });

  $('#cancel_link_update').on('click', function () {
    $('#link_update').val(link_update);
    if ($('#edit_link_update').text() == 'Chỉnh sửa link bài viết') {
      $('#edit_link_update').html('Xong');
      $('#link_update').prop('disabled', false);
      $('#cancel_link_update').css('display', 'inline');
    } else {
      var link_update = window.convertToSlug($('#name_category_update').val());

      $('#edit_link_update').html('Chỉnh sửa link bài viết');
      $('#link_update').prop('disabled', true);

      $('#link_update').val(link_update);
      $('#cancel_link_update').css('display', 'none');
    }
  });

  $('body').on('keyup', '#name_category_update', function(e) {
    if (e.which == 13) {
      $('#updateModal').click();
    }
  });

  $('body').on('keyup', '#link_update', function(e) {
    if (e.which == 13) {
      $('#edit_link_update').click();
    }
  });

  $('body').on('click', '.btnXoa', function () {
    const hash = $(this).attr('hash');

    swal({
      title: 'Bạn chắc chắn muốn xóa?',
      text: 'Nếu bạn xóa danh mục này, tất cả bài viết nằm trong danh mục sẽ bị xóa tất cả!',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Có, xóa nó!',
      cancelButtonText: 'Không, giữ lại!'
    }).then((result) => {
      if (result.value) {
        axios.delete(url(`/api/admin/categories/${hash}`), {
          headers: {
            'Content-Type'  : 'application/json',
            'Accept'        : 'application/json',
            'Authorization' : `Bearer ${Cookies.get('access_token')}`
          }
        }).then(res => {
          displayMessages(res);
          loadData();
        }).catch(err => {
          displayErrors(err);
        })

      } else if (result.dismiss === swal.DismissReason.cancel) {
        swal(
          'Hủy bỏ thao tác',
          '',
          'error'
          )
      }
    })
  });
})


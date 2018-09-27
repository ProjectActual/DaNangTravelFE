$(function () {
  'use strict'

  console.log('list tags');

  loadData();

  function loadData(linkUrl = url('/api/admin/tags'))
  {
    axios.get(linkUrl, {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      var index = res.data.from;
      var tags = res.data.data;
      var str = '';
      for(var value in tags) {
        var str = str +
            `<tr>
              <td class="text-center">${index++}</td>
              <td>${tags[value].tag}</td>
              <td class="text-right"><a href="javascript:">${tags[value].posts_count}</a></td>
              <td>${tags[value].created_at}</td>
              <td class="text-center text-nowrap">
              <button class="btn btn-xs btn-info" hash="${tags[value].id}">Xem trước</button>
              <button class="btn btn-xs btn-danger btnXoa" hash="${tags[value].id}">Xoá</button>
              <button class="btn btn-xs btn-primary btnSua" content="${tags[value].tag}" hash="${tags[value].id}" data-toggle="modal" data-target="#myUpdate">Sửa</button>
              </td>
            </tr>`;
      }
      $('#table-body').html(str);

      paginate(res.data);

    }).catch(err => {
      displayErrors(err);
    })
  }

  $('body').on('click', '.page-link', function(e) {
    e.preventDefault();
    if ($(this).attr('href') == 'null') {
      return;
    }
    var url = $(this).attr('href');
    loadData(url);
  });

  $('body').on('click', '.btnSua', function () {
    const hash = $(this).attr('hash');
    var currentTag = $(this).attr('content');

    $('#tag').val(currentTag);
    $('#updateModal').attr('hash', hash);
  });

  $('body').on('click', '.btnXoa', function () {
    const hash = $(this).attr('hash');

    swal({
      title: 'Bạn chắc chắn?',
      text: 'Bạn có chắc chắn muốn xóa tag không?!',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Có, xóa nó!',
      cancelButtonText: 'Không, giữ lại!'
    }).then((result) => {
      if (result.value) {
        axios.delete(url(`/api/admin/tags/${hash}`), {
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

  $('#updateModal').on('click', function () {
    const hash = $(this).attr('hash');
    const payload = {
      tag: $('#tag').val()
    }

      axios.put(url(`/api/admin/tags/${hash}`), payload, {
        headers: {
          'Content-Type'  : 'application/json',
          'Accept'        : 'application/json',
          'Authorization' : `Bearer ${Cookies.get('access_token')}`
        }
      }).then(res => {
        displayMessages(res);
        loadData();
      }).catch(err => {
        displayErrors(err)
      })
  })
});
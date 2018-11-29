$(function () {
  'use strict'

  loadData();

  function loadData(linkUrl = url('/api/admin/tags'), params='')
  {
    axios.get(linkUrl, {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      },
      params
    }).then(res => {
      var index = 1;
      var tags = res.data.data;
      var str = '';
      if($.isEmptyObject(res.data.data)) {
        str = str + '<tr><td class="text-center" colspan="5">Chưa có dữ liệu nào</td></tr>';
      }
      for(var value in tags) {
        var str = str +
            `<tr>
              <td class="text-center">${index++}</td>
              <td><a target="_blank" href="${window.location.origin+'/tags/'+tags[value]['attributes'].uri_tag}">${tags[value]['attributes'].tag}</a></td>
              <td class="text-right"><a class="posts_count" href="javascript:">${tags[value]['attributes'].count_posts}</a></td>
              <td class="text-center text-nowrap">${convertDate(tags[value]['attributes'].created_at)}</td>
              <td class="text-center text-nowrap">
              <button class="btn btn-xs btn-danger btnXoa" hash="${tags[value].id}">Xoá</button>
              <button class="btn btn-xs btn-primary btnSua" content="${tags[value]['attributes'].tag}" hash="${tags[value].id}" data-toggle="modal" data-target="#myUpdate">Sửa</button>
              </td>
            </tr>`;
      }
      $('#table-body').html(str);
    }).catch(err => {
      displayErrors(err);
    })
  }
  var search = '';
  var sort   = '';
  $('body').on('click', '#btnSearch', function (e) {
    search = $('#input_search').val();
    var params = {
      search: search,
      sort: sort
    }

    loadData(url('/api/admin/tags'), params);
  });

  $('body').on('change', '#sort', function (e) {
    sort = $(this).val();
    var params = {
      search: search,
      sort: sort
    }

    loadData(url('/api/admin/tags'), params);
  });

  $('body').on('click', '#btnSearch', function (e) {

    search = $('#input_search').val();
    var params = {
      search: search
    }

    loadData(url('/api/admin/tags'), params);
  });

  $('body').on('click', '.page-link', function(e) {
    e.preventDefault();

    if ($(this).attr('href').indexOf('undefined') == 0) {
      return
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

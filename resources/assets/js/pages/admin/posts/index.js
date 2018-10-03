$(function () {
  'use strict'

  loadData();

  function loadData(linkUrl = url('/api/admin/posts'))
  {
    axios.get(linkUrl, {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      var index = 1;
      var post = res.data.data.posts.data;
      var str = '';
      for(var value in post) {
        var str = str +
            `<tr>
              <td>${index++}</td>
              <td>${post[value].title}</td>
              <td>anh</td>
              <td>${post[value].uri_post}</td>`;
        if(post[value].status == 'ACTIVE') {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-success">${post[value].status} </a></td>`;
        } else {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-danger">${post[value].status} </a></td>`;
        }
        if(post[value].is_slider == 'YES') {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-success">${post[value].is_slider} </a></td>`;
        } else {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-danger">${post[value].is_slider} </a></td>`;
        }
        if(post[value].is_hot == 'YES') {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-success">${post[value].is_hot} </a></td>`;
        } else {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-danger">${post[value].is_hot} </a></td>`;
        }
        str = str +
              `<td>${post[value].created_at.date}</td>
              <td class="text-center text-nowrap">
              <button class="btn btn-xs btn-info" hash="${post[value].id}">Xem trước</button>
              <button class="btn btn-xs btn-danger btnXoa" hash="${post[value].id}">Xoá</button>
              <button class="btn btn-xs btn-primary btnSua" hash="${post[value].id}">Sửa</button>
              </td>
            </tr>`;
      }
      $('#table-body').html(str);
      var $paginate = res.data.data.posts.meta;
      paginate($paginate, linkUrl);

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

  $('body').on('click', '.btnSua', function () {
    const hash = $(this).attr('hash');

    window.location.href = window.location.origin + `/admin/posts/update/${hash}`;
  });

  $('body').on('click', '.btnXoa', function () {
    const hash = $(this).attr('hash');


    swal({
      title: 'Bạn chắc chắn?',
      text: 'Bạn có chắc chắn muốn xóa bài viết không?!',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Có, xóa nó!',
      cancelButtonText: 'Không, giữ lại!'
    }).then((result) => {
      if (result.value) {
        axios.delete(url(`/api/admin/posts/${hash}`), {
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

  $('body').on('click', '#btnSearch', function (e) {

    var search = $('#input_search').val();

    loadData(url(`/api/admin/posts?search=${search}`));
  });
});

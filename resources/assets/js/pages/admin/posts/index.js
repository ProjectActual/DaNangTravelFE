$(function () {
  'use strict'

  console.log('list data');

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
      var index = res.data.from;
      var post = res.data.data;
      var str = '';
      for(var value in post) {
        var str = str +
            `<tr>
              <td>${index++}</td>
              <td>${post[value].title}</td>
              <td>anh</td>
              <td>${post[value].uri_post}</td>`;
        if(post[value].status == 'ACTIVE') {
          str = str + `<td><a href="javascript:" class="btn btn-xs btn-success">${post[value].status} </a></td>`;
        } else {
          str = str + `<td><a href="javascript:" class="btn btn-xs btn-danger">${post[value].status} </a></td>`;
        }
        str = str +
              `<td>${post[value].created_at}</td>
              <td>${post[value].updated_at}</td>
              <td class="text-center text-nowrap">
              <button class="btn btn-xs btn-info" hash="${post[value].id}">Xem trước</button>
              <button class="btn btn-xs btn-danger btnXoa" hash="${post[value].id}">Xoá</button>
              <button class="btn btn-xs btn-primary btnSua" hash="${post[value].id}">Sửa</button>
              </td>
            </tr>`;
      }
      $('#table-body').html(str);

      paginate(res.data);

    }).catch(err => {
      window.location.replace('/unauthentication');
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
});

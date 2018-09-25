$(function () {
  'use strict'

  console.log('list data');

  loadData();

  function loadData()
  {
    axios.get(url('/api/admin/posts'), {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
        var post = res.data.data;
        var str = '';
        var key = 1;
          for(var index in post) {
            var str = str + `<tr>
                  <td>${key++}</td>
                  <td>${post[index].title}</td>
                  <td>anh</td>
                  <td>${post[index].uri_post}</td>`;
            if(post[index].status == 'ACTIVE') {
              str = str + `<td><a href="javascript:" class="btn btn-xs btn-success">${post[index].status} </a></td>`;
            } else {
              str = str + `<td><a href="javascript:" class="btn btn-xs btn-danger">${post[index].status} </a></td>`;
            }
            str = str + `<td>${post[index].created_at}</td>
                        <td>${post[index].updated_at}</td>
                        <td class="text-center text-nowrap">
                          <button class="btn btn-xs btn-info" hash="${post[index].id}">Xem trước</button>
                          <button class="btn btn-xs btn-danger btnXoa" hash="${post[index].id}">Xoá</button>
                          <button class="btn btn-xs btn-primary btnSua" hash="${post[index].id}">Sửa</button>
                        </td>
                      </tr>`;
          }
          $('#table-body').html(str);
      }).catch(err => {
        window.location.replace('/unauthentication');
      })
  }

  $('body').on('click', '.btnSua', function () {
    const hash = $(this).attr('hash');

    window.location.href = window.location.origin + `/admin/posts/update/${hash}`;
  });
});

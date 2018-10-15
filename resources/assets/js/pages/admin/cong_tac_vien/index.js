$(function () {
  'use strict';

  loadData();

  function loadData(linkUrl = url('/api/admin/congtacvien'))
  {
    axios.get(linkUrl, {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      var index = 1;
      var ctv = res.data.data.congTacVien.data;
      var str = '';

      for(var value in ctv) {
        var str = str +
        `<tr>
        <td>${index++}</td>
        <td>${ctv[value]['attributes'].full_name}</td>`;
        if(ctv[value]['attributes'].active == 'AUTHENTICATION') {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-danger">Chưa xác thực</a></td>`;
        } else if(ctv[value]['attributes'].active == 'APPROVE') {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-warning">Đợi phê duyệt</a></td>`;
        } else if(ctv[value]['attributes'].active == 'ACTIVE') {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-success">Đang hoạt động</a></td>`;
        } else {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-default">Đã vô hiệu hóa</a></td>`;
        }
        str = str +
        `<td class="text-center text-nowrap">${convertDate(ctv[value]['attributes'].created_at.date)}</td>
        <td class="text-center text-nowrap">
        <button class="btn btn-xs btn-info btnDuyet" hash="${ctv[value]['attributes'].id}">Cập nhật</button>
        <button class="btn btn-xs btn-danger btnXoa" hash="${ctv[value]['attributes'].id}">Xoá</button>
        </td>
        </tr>`;
      }

      $('#table-body').html(str);
      var pagination = res.data.data.congTacVien;
      paginate(pagination, linkUrl);

    })
  }

  $('body').on('click', '.btnXoa', function () {
    const hash = $(this).attr('hash');

    swal({
      title: 'Bạn chắc chắn?',
      text: 'Bạn có chắc chắn muốn xóa bài viết không?!',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Có, xóa nó!',
      confirmButtonColor: '#3085d6',
      cancelButtonText: 'Không, giữ lại!',
      cancelButtonColor: '#d33'
    }).then((result) => {
      if (result.value) {
        axios.delete(url(`/api/admin/congtacvien/${hash}`), {
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
        });
      }
    });
  })

$('body').on('click', '.btnDuyet', function () {
  const hash = $(this).attr('hash');

  axios.get(url(`/api/admin/congtacvien/${hash}`), {
    headers: {
      'Content-Type'  : 'application/json',
      'Accept'        : 'application/json',
      'Authorization' : `Bearer ${Cookies.get('access_token')}`
    }
  }).then(res => {
    var str = '';
    if(res.data.data.congTacVien.data.active == 'AUTHENTICATION') {
      $('#active').attr('disabled', true);
      str = str + `<option value="AUTHENTICATION">Chưa xác thực</option>`;
    } else if(res.data.data.congTacVien.data.active == 'APPROVE') {
      $('#active').attr('disabled', false);
      str = str + `<option value="ACTIVE">Duyệt CTV</option>
      <option value="APPROVE">Không duyệt CTV</option>`;
    } else if(res.data.data.congTacVien.data.active == 'ACTIVE') {
      $('#active').attr('disabled', true);
      str = str + `<option value="LOCKED">Vô hiệu hóa</option>`;
    } else {
      $('#active').attr('disabled', true);
      str = str + `<option value="ACTIVE">Mở khóa tài khoản</option>`;
    }
    $('#active').html(str);
    $('#updateModal').attr('hash', res.data.data.congTacVien.data.id)

    $('#myUpdate').modal('show');
  }).catch(err => {
    console.log(err.response);
    return
    displayErrors(err);
  });
})


$('#updateModal').on('click', function () {
  const hash = $(this).attr('hash');

  const payload = {
    'active': $('#active').val(),
    'reason'      : $('#reason').val(),
  }

  axios.put(url(`/api/admin/congtacvien/${hash}`), payload, {
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
  });
})

  $('body').on('click', '.page-link', function(e) {
    e.preventDefault();
    if ($(this).attr('href').indexOf('undefined') == 0) {
      return
    }

    var url = $(this).attr('href');
    loadData(url);
  });

  $('body').on('click', '#btnSearch', function (e) {

    var search = $('#input_search').val();

    loadData(url(`/api/admin/congtacvien?search=${search}`));
  });
});

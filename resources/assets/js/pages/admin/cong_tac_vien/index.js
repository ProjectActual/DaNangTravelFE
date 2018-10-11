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
        <td>${ctv[value].full_name}</td>`;
        if(ctv[value].active == 'YES') {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-success">Đã xác thực</a></td>`;
        } else {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-danger">Chưa xác thực</a></td>`;
        }
        if(ctv[value].admin_active == 'YES') {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-success" id="admin_active">Đã phê duyệt</a></td>`;
        } else {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-danger" id="admin_active">Chưa phê duyệt </a></td>`;
        }
        if(ctv[value].is_block == 'NO') {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-success btnBlock" val="YES" hash="${ctv[value].id}">Đang Hoạt động</a></td>`;
        } else {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-danger btnBlock" val="NO" hash="${ctv[value].id}">Đã Vô hiệu hóa</a></td>`;
        }
        str = str +
        `<td class="text-center text-nowrap">${convertDate(ctv[value].created_at.date)}</td>
        <td class="text-center text-nowrap">
        <button class="btn btn-xs btn-info btnDuyet" hash="${ctv[value].id}">Phê duyệt</button>
        <button class="btn btn-xs btn-danger btnXoa" hash="${ctv[value].id}">Xoá</button>
        </td>
        </tr>`;
      }
      $('#table-body').html(str);
      var pagination = res.data.data.congTacVien.meta;
      paginate(pagination, linkUrl);

    }).catch(err => {
      displayErrors(err);
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
    $('input[name=admin_active]').each(function (index) {
      $(this).val() == res.data.data.congTacVien.data.admin_active
        ? $(this).attr('checked', true)
        : $(this).attr('checked', false);
    })

    $('#updateModal').attr('hash', res.data.data.congTacVien.data.id)

    $('#myUpdate').modal('show');
  }).catch(err => {
    displayErrors(err);
  });
})

$('#updateModal').on('click', function () {
  const hash = $(this).attr('hash');

  const payload = {
    'admin_active': $('input[name=admin_active]:checked').val(),
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

$('body').on('click', '.btnBlock', function () {
  const hash = $(this).attr('hash');

  axios.get(url(`/api/admin/congtacvien/${hash}`), {
    headers: {
      'Content-Type'  : 'application/json',
      'Accept'        : 'application/json',
      'Authorization' : `Bearer ${Cookies.get('access_token')}`
    }
  }).then(res => {
    $('input[name=is_block]').each(function (index) {
      $(this).val() == res.data.data.congTacVien.data.is_block
        ? $(this).attr('checked', true)
        : $(this).attr('checked', false);
    })

    $('#blockModal').attr('hash', res.data.data.congTacVien.data.id)

    $('#block').modal('show');
  }).catch(err => {
    displayErrors(err);
  });
})


$('body').on('click', '#blockModal', function() {
  const hash = $(this).attr('hash');

  const payload = {
    'is_block': $('input[name=is_block]:checked').val(),
    'reason'  : $('#reasonBlock').val(),
  };
  axios.put(url(`/api/admin/congtacvien/block/${hash}`), payload, {
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

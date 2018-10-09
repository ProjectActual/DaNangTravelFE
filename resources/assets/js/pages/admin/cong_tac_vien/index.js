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
      var ctv = res.data.data.cong_tac_vien.data;
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
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-success" id="is_block" val="YES" hash="${ctv[value].id}">Đang Hoạt động</a></td>`;
        } else {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-danger" id="is_block" val="NO" hash="${ctv[value].id}">Đã Vô hiệu hóa</a></td>`;
        }
        str = str +
              `<td class="text-center text-nowrap">${convertDate(ctv[value].created_at.date)}</td>
              <td class="text-center text-nowrap">
              <button class="btn btn-xs btn-info" hash="${ctv[value].id}" id="btnDuyet">Phê duyệt</button>
              <button class="btn btn-xs btn-danger btnXoa" hash="${ctv[value].id}">Xoá</button>
              </td>
            </tr>`;
      }
      $('#table-body').html(str);
      var pagination = res.data.data.cong_tac_vien.meta;
      paginate(pagination, linkUrl);

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

  $('body').on('click', '#btnSearch', function (e) {

    var search = $('#input_search').val();

    loadData(url(`/api/admin/congtacvien?search=${search}`));
  });
});

$(function () {
  'use strict';

  $('#date').datepicker( {
    format: "yyyy/mm",
    startView: "months",
    minViewMode: "months",
    onClose: function(dateText, inst) {
      $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth,inst.selectedDay));
    }
  });

  $('#date').datepicker('setDate', 'today');

  $('body').on('click', '#btnSearch', function () {
    var date = `${$('#date').val()}/01`;
    const payload = {
      'date' : date,
    }

    axios.post(url('/api/admin/statistic'), payload, {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      var index = 1;
      var str = '';
      var statistic = res.data.data.userStatistics.data;
      if($.isEmptyObject(res.data.data.userStatistics.data)) {
        str = str + '<tr><td class="text-center" colspan="7">Chưa có dữ liệu nào</td></tr>';
      }
      for(var value in statistic) {
        var str = str +
        `<tr>
        <td>${index++}</td>
        <td>${statistic[value]['attributes'].full_name}</td>
        <td>${statistic[value]['attributes'].email}</td>
        <td class="text-center text-nowrap">${convertDate(statistic[value]['attributes'].created_at.date)}</td>
        <td class="text-right">${statistic[value]['attributes'].count_posts} bài viết</td>
        <td class="text-right">${statistic[value]['attributes'].viewer_interactive} lượt</td>
        <td class="text-center text-nowrap">
        <button class="btn btn-xs btn-primary btnInfo" hash="${statistic[value].id}">Chi tiết</button>
        <button class="btn btn-xs btn-info btnDuyet" hash="${statistic[value].id}">Cập nhật</button>
        <button class="btn btn-xs btn-danger btnXoa" hash="${statistic[value].id}">Xoá</button>
        </td>
        </tr>`;
      }
      $('#table-body').html(str);
    }).catch(err => {
      displayErrors(err);
    })
  })

  $('#btnSearch').click();
});

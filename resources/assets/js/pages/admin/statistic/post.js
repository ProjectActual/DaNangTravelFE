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
      var maxPost = 0;
      var userPost = '';
      var maxView = 0;
      var userView = '';

      var index = 1;
      var str = '';
      var statistic = res.data.data.userStatistics.data;


      if($.isEmptyObject(res.data.data.userStatistics.data)) {
        str = str + '<tr><td class="text-center" colspan="7">Chưa có dữ liệu nào</td></tr>';
        $('#count').html('');
        $('#count_user').html('');

        $('#sum').html('');
        $('#sum_user').html('');
      } else {
          for(var value in statistic) {
            if(maxPost < statistic[value]['attributes'].count_posts) {
              maxPost  = parseInt(statistic[value]['attributes'].count_posts);
              userPost = statistic[value]['attributes'].email
            } else if(
                maxPost == statistic[value]['attributes'].count_posts
                && maxView < statistic[value]['attributes'].viewer_interactive
                ) {
              maxPost = statistic[value]['attributes'].count_posts;
              maxUser = statistic[value]['attributes'].email;
            }

            if(maxView < statistic[value]['attributes'].viewer_interactive) {
              maxView  = parseInt(statistic[value]['attributes'].viewer_interactive);
              userView = statistic[value]['attributes'].email
            }

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
          $('#count').html(maxPost);
          $('#count_user').html(` (${userPost})`);

          $('#sum').html(maxView);
          $('#sum_user').html(` (${userView})`);
        }
      $('#table-body').html(str);
    }).catch(err => {
      displayErrors(err);
    })
  })

  $('#btnSearch').click();
});

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

  google.GoogleCharts.load(drawChart);
  google.GoogleCharts.load(drawChart, {'packages':['bar']});

  // function drawChart() {

  //   // Standard google charts functionality is available as GoogleCharts.api after load
  //   const data = google.GoogleCharts.api.visualization.arrayToDataTable([
  //     ['Chart thing', 'Chart amount'],
  //     ['Lorem ipsum', 60],
  //     ['Dolor sit', 22],
  //     ['Sit amet', 18]
  //     ]);
  //   const pie_1_chart = new google.GoogleCharts.api.visualization.PieChart(document.getElementById('chart1'));
  //   pie_1_chart.draw(data);
  // }


  function drawChart() {
    const col_1_data = google.GoogleCharts.api.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Copper", 8.94, "#b87333"],
        ["Silver", 10.49, "silver"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
      ]);
        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.GoogleCharts.api.visualization.ColumnChart(document.getElementById('chart1'));

        chart.draw(col_1_data, options);
  }
});

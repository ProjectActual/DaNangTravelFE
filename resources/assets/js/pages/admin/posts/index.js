$(function () {
  'use strict'

  loadData();

  function loadData(linkUrl = url('/api/admin/posts'), params={})
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
      var post = res.data.data;
      var str = '';
      if($.isEmptyObject(res.data.data)) {
        str = str + '<tr><td class="text-center" colspan="9">Chưa có dữ liệu nào</td></tr>';
      }
      for(var value in post) {
        var str = str +
            `<tr>
              <td>${index++}</td>
              <td>${post[value]['attributes'].title}</td>
              <td class="text-center"><img style="width: 200px" src="${post[value]['attributes'].avatar_post}" alt=""></td>
              <td><a target="_blank" href="${window.location.origin+'/posts/'+post[value]['attributes'].uri_category+'/'+post[value]['attributes'].uri_post}">${post[value]['attributes'].uri_post}</a></td>`;
        if(post[value]['attributes'].status == 'ACTIVE') {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-success">${post[value]['attributes'].status} </a></td>`;
        } else {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-danger">${post[value]['attributes'].status} </a></td>`;
        }
        if(post[value]['attributes'].is_slider == 'YES') {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-success" id="is_slider" hash="${post[value].id}">${post[value]['attributes'].is_slider} </a></td>`;
        } else {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-danger" id="is_slider" hash="${post[value].id}">${post[value]['attributes'].is_slider} </a></td>`;
        }
        if(post[value]['attributes'].is_hot == 'YES') {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-success" id="is_hot" hash="${post[value].id}">${post[value]['attributes'].is_hot} </a></td>`;
        } else {
          str = str + `<td class="text-center"><a href="javascript:" class="btn btn-xs btn-danger" id="is_hot" hash="${post[value].id}">${post[value]['attributes'].is_hot} </a></td>`;
        }
        str = str +
              `<td class="text-center text-nowrap">${convertDate(post[value]['attributes'].created_at)}</td>
              <td class="text-center text-nowrap">
              <button class="btn btn-xs btn-danger btnXoa" hash="${post[value].id}">Xoá</button>
              <button class="btn btn-xs btn-primary btnSua" hash="${post[value].id}">Sửa</button>
              </td>
            </tr>`;
      }
      $('#table-body').html(str);
      var pagination = res.data;
      paginate(pagination);
    }).catch(err => {
      displayErrors(err);
    })
  }

  var sort            = '';
  var search_category = '';
  var search          = '';
  $('body').on('change', '#sort', function () {
    sort = $(this).val();

    const params = {
      sort: sort,
      search_category: search_category,
      search: search
    }

    loadData(url(`/api/admin/posts`), params);
  })

  $('body').on('change', '#search-category', function () {
    search_category = $(this).val();
    const params = {
      search_category: search_category,
      sort: sort,
      search: search
    }

    loadData(url(`/api/admin/posts`), params);
  })

  $('body').on('click', '#btnSearch', function () {
    search = $('#input_search').val();

    var params = {
      search_category: search_category,
      sort: sort,
      search: search
    }

    loadData(url(`/api/admin/posts`), params);
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

    window.location.href = window.location.origin + `/admin/posts/update/${hash}`;
  });

  $('body').on('click', '.btnXoa', function () {
    const hash = $(this).attr('hash');


    swal({
      title: 'Bạn chắc chắn?',
      text: 'Bạn có chắc chắn muốn xóa cộng tác viên này không?!',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Có, xóa nó!',
      confirmButtonColor: '#3085d6',
      cancelButtonText: 'Không, giữ lại!',
      cancelButtonColor: '#d33'
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

  $('body').on('click', '#is_slider', function () {
    const hash = $(this).attr('hash');
    const payload = {
      'is_slider' : $(this).text(),
    }

    axios.put(url(`/api/admin/posts/slider/${hash}`), payload, {
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
  })

  $('body').on('click', '#is_hot', function () {
    const hash = $(this).attr('hash');
    const payload = {
      'is_hot' : $(this).text(),
    }

    axios.put(url(`/api/admin/posts/hot/${hash}`), payload, {
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
  })
});

$(function () {
  'use strict';

  $('body').on('click', '#btnLogout', function () {
    const uri = '/api/admin/logout';

    axios.get(url(uri),{
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : 'Bearer ' + Cookies.get('access_token')
      }
    }).then(res => {
      Cookies.remove('access_token');
      Cookies.remove('refresh_token');

      window.location.replace('/admin/login');
    }).catch(err => {
      displayErrors(err);
    })
  });
});

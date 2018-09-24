 $(function () {

  'use strict'

  console.log('form login');

  $('body').on('click', '#btnLogin', function () {
    const payload = {
      'grant_type'    : 'password',
      'client_id'     : '2',
      'client_secret' : '2BsZmQFB6TPb4GijiJV8o4ahDxFIjGiQTwYzljxO',
      'username'     : $('#email').val(),
      'password'      : $('#password').val()
    }

    axios.post(url('/oauth/token'), payload, {
      headers: {
        'Content-Type': 'application/json',
        'Accept'      : 'application/json'
      }
    }).then(res => {
        Cookies.set('access_token', res.data.access_token);
        Cookies.set('refresh_token', res.data.refresh_token);

        window.location.replace('/admin/posts');
    }).catch(err => {
      displayErrors(err);
    })
  })

});

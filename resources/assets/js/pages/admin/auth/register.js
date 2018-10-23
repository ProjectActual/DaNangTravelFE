$(function () {
  'use strict';

  $('body').on('click', '#btnRegister', function () {
    const payload = {
      'first_name'           : $('#first_name').val(),
      'last_name'            : $('#last_name').val(),
      'email'                : $('#email').val(),
      'password'             : $('#password').val(),
      'password_confirmation': $('#password_confirmation').val(),
    }

    axios.post(url('/api/admin/register'), payload, {
      headers: {
        'Content-Type': 'application/json',
        'Accept'      : 'application/json'
      }
    }).then(res => {
      displayMessages(res, '/admin/login');
    }).catch(err => {
      displayErrors(err);
    })
  })
});

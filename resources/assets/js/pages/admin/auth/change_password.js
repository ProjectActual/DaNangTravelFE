$(function () {
  'use strict';

  $('body').on('click', '#btnForgetChange', function () {
    const payload = {
      email                       : $('#forget_email').val(),
      tokenReset                  : $('#forget_token').val(),
      password_reset              : $('#forget_password').val(),
      password_reset_confirmation : $('#forget_password_confirmation').val()
    }

    axios.put(url('/api/admin/forget-password'), payload, {
      headers : {
        'Content-Type': 'application/json',
        'Accept'      : 'application/json'
      }
    }).then(res => {
      console.log(res)
      displayMessages(res, '/admin/login');
    }).catch(err => {
      displayErrors(err);
    })
  })


  $('body').on('click', '#btnForgetCancel', function () {
    window.location.replace('/admin/login');
  })
})

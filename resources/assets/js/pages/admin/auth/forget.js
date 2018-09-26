$(function () {
  'use strict'

  console.log('page forget');

  $('body').on('click', '#btnForget', function () {
    const uri = '/api/admin/forget-password';

    const payload = {
      email: $('#email').val()
    }

    axios.post(url(uri), payload, {
      headers: {
        'Content-Type': 'application/json',
        'Accept'      : 'application/json'
      }
    }).then(res => {
      displayMessages(res);
    }).catch(err => {
      displayErrors(err);
    })
  })

  $('body').on('keyup', '#email', function(e) {
    if (e.which == 13) {
      $('#btnForget').click();
    }
  });
})

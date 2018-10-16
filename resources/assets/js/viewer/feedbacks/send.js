$(function () {
  'use strict';

  $('body').on('click', '#btnSubmit', function () {
    const payload = {
      'email'  : $('#email').val(),
      'title'  : $('#title').val(),
      'content': $('#content').val()
    }

    axios.post(url('/api/feedbacks/sent'), payload, {
      headers : {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json'
      }
    }).then(res => {
      displayMessages(res, '/');
    }).catch(err => {
      displayErrors(err);
    })
  })

})

$(function () {
  'use strict';

  var birthday = $('#birthday');

  deleteImage();

  birthday.datepicker( {
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    format: 'yyyy-mm-dd',
    onClose: function(dateText, inst) {
      $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth,inst.selectedDay));
    }
  });

  function deleteImage() {
    var avatar = $('#avatar').dropify();

    avatar.on('dropify.afterClear', function (event, element) {
      swal('Delete','Xóa thành công', 'success');
    });

    avatar.on('dropify.errors', function (event, element) {
      swal('Oops...', 'Something went wrong!', 'error');
    });
  }

  //update profile

  var files;

  $('body').on('change', '#avatar', function (e) {
    files = e.target.files;
  });

  $('body').on('click', '#btnSubmit', function () {
    var data = new FormData();

    $.each(files, function(key, value)
    {
      data.append('fileUpload', value);
    });

    axios.post(url('/api/uploadFile'), data, {
      headers : {
        'Content-Type'  : false,
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      information(res.data);
    }).catch(err => {
      displayErrors(err);
    })
  })

  function information(avatar) {
    const hash = $(this).attr('hash');

    const payload = {
      'first_name': $('#first_name').val(),
      'last_name' : $('#last_name').val(),
      'phone'     : $('#phone').val(),
      'gender'    : $('input[name=gender]:checked').val(),
      'birthday'  : $('#birthday').val(),
      'avatar'    : avatar,
    };

    axios.put(url('/api/admin/user'), payload, {
      headers : {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      displayMessages(res, '/admin/profile');
    }).catch(err => {
      displayErrors(err);
    });
  }
})

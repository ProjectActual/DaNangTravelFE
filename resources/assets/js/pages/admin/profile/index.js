$(function () {
  'use strict';

  var birthday = $('#birthday');
  var birthdayCurrent;

  console.log('page profile');

  loadData();
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

  function loadData() {
    axios.get(url('/api/admin/user'), {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      const data = res.data.data.profile.data;
      birthday.datepicker('setDate', data.attributes.birthday);
      $('#full_name').html(data.attributes.full_name);
      $('#phone_show').html(data.attributes.phone);
      $('#gender_show').html((data.attributes.gender == 'MALE') ? 'Nam' : 'Nữ');
      $('#birthday_show').html(data.attributes.birthday);
      $('#posts_count').html(data.attributes.count_posts);
      $('#role_name').html(data.attributes.roles[0].display_name);
      $('.avatar_show').attr('src', data.attributes.avatar);

      $('#first_name').val(data.attributes.first_name);
      $('#last_name').val(data.attributes.last_name);
      $('#phone').val(data.attributes.phone);
      $('#birthday').val(data.attributes.birthday);

      $( ".gender" ).each(function( index ) {
        $(this).val() == data.attributes.gender ? $(this).attr( 'checked', true ) : '';
      });
    }).catch(err => {
      displayErrors(err);
    })
  }

  $('#btnChange').on('click', function () {
    const payload = {
      old_password              : $('#old_password').val(),
      new_password              : $('#new_password').val(),
      new_password_confirmation : $('#new_password_confirmation').val()
    };

    axios.post(url('/api/admin/change-password'), payload, {
      headers: {
        'Content-Type'  : 'application/json',
        'Accept'        : 'application/json',
        'Authorization' : `Bearer ${Cookies.get('access_token')}`
      }
    }).then(res => {
      Cookies.set('access_token', res.data.data.access_token);
      displayMessages(res);
      $('#old_password').val('');
      $('#new_password').val('');
      $('#new_password_confirmation').val('');
    }).catch(err => {
      displayErrors(err);
    })
  })

  $('body').on('keyup', '#old_password,#new_password,#new_password_confirmation', function(e) {
    if (e.which == 13) {
      $('#btnChange').click();
    }
  });

  $('body').on('click', '#btnCancel', function () {
    $('#old_password').val('');
    $('#new_password').val('');
    $('#new_password_confirmation').val('');
  })

  //update profile

  var files;

  $('body').on('change', '#avatar', function (e) {
    files = e.target.files;
  });

  $('body').on('click', '#btnUpdate', function () {
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
        updateProfile(res.data);
    }).catch(err => {
        displayErrors(err);
    })
  })


  function updateProfile(avatar) {
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

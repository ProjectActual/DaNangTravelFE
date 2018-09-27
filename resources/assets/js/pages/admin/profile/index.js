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
      birthday.datepicker('setDate', res.data.birthday);
      $('#full_name').html(res.data.full_name);
      $('#phone_show').html(res.data.phone);
      $('#gender_show').html(res.data.gender);
      $('#birthday_show').html(res.data.birthday);
      $('#posts_count').html(res.data.posts_count);
      $('#role_name').html(res.data.roles[0].display_name);
      $('.avatar_show').attr('src', url(res.data.avatar));

      $('#first_name').val(res.data.first_name);
      $('#last_name').val(res.data.last_name);
      $('#phone').val(res.data.phone);
      $('#birthday').val(res.data.birthday);

      $( ".gender" ).each(function( index ) {
        $(this).val() == res.data.gender ? $(this).attr( 'checked', true ) : '';
      });
    }).catch(err => {
      displayErrors(err);
    })
  }

  $('#btnUpdate').on('click', function () {
    swal(`Xin lỗi ${$('#full_name').text()}`, 'Chức năng này đang được cập nhật', 'error');
  })

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
})

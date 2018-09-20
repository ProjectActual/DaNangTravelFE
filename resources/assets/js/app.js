
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 $(document).ready(function() {
   $('body').on('click', '#toastr-id', function () {
    toastr.options = {
      timeOut: 3000,
      onclick: null
    };
    toastr.success('Are you the 6 fingered man?', 'success');

    Swal({
      title: 'Are you sure?',
      text: 'You will not be able to recover this imaginary file!',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, keep it'
    }).then((result) => {
      if (result.value) {
        Swal(
          'Deleted!',
          'Your imaginary file has been deleted.',
          'success'
          )
  // For more information about handling dismissals please visit
  // https://sweetalert2.github.io/#handling-dismissals
} else if (result.dismiss === Swal.DismissReason.cancel) {
  Swal(
    'Cancelled',
    'Your imaginary file is safe :)',
    'error'
    )
}
})
  })
 })


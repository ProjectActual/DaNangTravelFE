$(function () {
  'use strict';

  const pathname = '/' + window.trimSlash(window.location.pathname);

  require('./balita/index');
  require('./general');

  $('#loading').hide();

  if (/^\/feedbacks$/.test(pathname)) {
    require('./feedbacks/send');
    return;
  }

})

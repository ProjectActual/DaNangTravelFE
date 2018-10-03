$(function () {
  'use strict';

  const pathname = '/' + window.trimSlash(window.location.pathname);

  require('./balita/index');
  require('./general');

   $('#loading').hide();
})

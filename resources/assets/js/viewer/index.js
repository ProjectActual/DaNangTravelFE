$(function () {
  'use strict';

  const pathname = '/' + window.trimSlash(window.location.pathname);

  require('./balita/index');

  if (/^\/posts\/(.*)$/.test(pathname)) {
    require('./posts/index');
    return;
  }
})

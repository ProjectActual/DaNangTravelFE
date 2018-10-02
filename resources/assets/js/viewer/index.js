$(function () {
  'use strict';

  const pathname = '/' + window.trimSlash(window.location.pathname);

  require('./balita/index');

  if (/^\/(.*)$/.test(pathname)) {
    require('./posts/index');
    return;
  }
})

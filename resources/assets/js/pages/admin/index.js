$(function () {
  'use strict';

  const pathname = '/' + window.trimSlash(window.location.pathname);

  if (/^\/admin\/login$/.test(pathname)) {
    require('./auth/login');
    return;
  }

  if (/^\/admin\/posts$/.test(pathname)) {
    require('./posts/index');
    return;
  }

  if (/^\/admin\/posts\/create$/.test(pathname)) {
    require('./posts/create');
    return;
  }

    if (/^\/admin\/posts\/update\/(.*)$/.test(pathname)) {
    require('./posts/update');
    return;
  }
});

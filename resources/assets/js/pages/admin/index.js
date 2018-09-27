$(function () {
  'use strict';

  const pathname = '/' + window.trimSlash(window.location.pathname);

//auth
  if (/^\/admin\/login$/.test(pathname)) {
    require('./auth/login');
    return;
  }

  if (/^\/admin\/forget-password$/.test(pathname)) {
    require('./auth/forget');
    return;
  }

//posts
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

// profile
  if (/^\/admin\/profile$/.test(pathname)) {
    require('./profile/index');
    return;
  }

// tags
  if (/^\/admin\/tags$/.test(pathname)) {
    require('./tags/index');
    return;
  }
});

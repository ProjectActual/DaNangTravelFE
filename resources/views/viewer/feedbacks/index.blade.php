@extends('viewer.layouts.master')
@section('master.viewer.title', 'feedback')
@section('master.viewer.body', 'viewer-posts')
@section('master.viewer.content')
<div class="col-md-12 col-lg-8 main-content">
  <div class="row">
    <div class="col-md-12">
      <h1>Feedbacks</h1>
    </div>
    <div class="col-md-6 form-group">
      <label for="email">Email</label>
      <input type="email" id="email" class="form-control ">
    </div>
    <div class="col-md-6 form-group">
      <label for="name">Tiêu đề</label>
      <input type="text" id="name" class="form-control ">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 form-group">
      <label for="message">Nội dung</label>
      <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 form-group">
      <input type="submit" value="Send Message" class="btn btn-primary">
    </div>
  </div>
</div>
@endsection

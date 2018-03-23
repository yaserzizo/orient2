@extends('inspinia::layouts.main')

@if (auth()->check())
@section('user-avatar', 'https://www.gravatar.com/avatar/' . md5(auth()->user()->email) . '?d=mm')
@section('user-name', auth()->user()->name)
@endif


@section('breadcrumbs')
{{--@include('inspinia::layouts.main-panel.breadcrumbs', [
  'breadcrumbs' => [
    (object) [ 'title' => 'Home', 'url' => route('home') ]
  ]
])--}}
@endsection

@section('sidebar-menu')
  <ul class="nav metismenu" id="side-menu" style="padding-left:0px;">
    <li class="active">
      <a href="{{ route('home') }}"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
    </li>
  </ul>
  <ul class="nav metismenu" id="side-menu2" style="padding-left:0px;">
    <li class="">
      <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Products Management</span><span class="fa arrow"></span></a>
      <ul class="nav nav-second-level">
        <li><a href="{{ route('products.index') }}">Products</a></li>
        <li><a href="lockscreen.html">Lockscreen</a></li>
        <li><a href="invoice.html">Invoice</a></li>
        <li><a href="login.html">Login</a></li>
        <li><a href="login_two_columns.html">Login v.2</a></li>
        <li><a href="forgot_password.html">Forget password</a></li>
        <li><a href="register.html">Register</a></li>
        <li><a href="404.html">404 Page</a></li>
        <li><a href="500.html">500 Page</a></li>
        <li class="active"><a href="empty_page.html">Empty page</a></li>
      </ul>
    </li>
  </ul>
@endsection


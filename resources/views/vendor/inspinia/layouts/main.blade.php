<!DOCTYPE html>
<html lang="@yield('lang', config('app.locale', 'en'))">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Atnic">

  <title>@yield('title', config('app.name', 'INSPINIA'))</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Styles -->
  @section('styles')
  <link href="{{ mix('/css/inspinia.css') }}" rel="stylesheet">
  @show

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  @stack('head')
</head>

<body class="mini-navbar pace-done  " tcap-name="mainman">



  @section('scripts')
  <script src="{{ mix('/js/manifest.js') }}" charset="utf-8"></script>
  <script src="{{ mix('/js/vendor.js') }}" charset="utf-8"></script>
	<script src="{{ mix('/js/inspinia.js') }}" charset="utf-8"></script>
	@show
  <div id="wrapper">
      @include('inspinia::layouts.sidebar.main')
      @include('inspinia::layouts.main-panel.main')
  </div>
	@stack('body')


  <div class="theme-config">
    <div class="theme-config-box">
      <div class="spin-icon">
        <i class="fa fa-cogs fa-spin"></i>
      </div>
      <div class="skin-settings">
        <div class="title">Configuration <br>
          <small style="text-transform: none;font-weight: 400">
            Config box designed for demo purpose. All options available via code.
          </small></div>
        <div class="setings-item">
                    <span>
                        Collapse menu
                    </span>

          <div class="switch">
            <div class="onoffswitch">
              <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
              <label class="onoffswitch-label" for="collapsemenu">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
              </label>
            </div>
          </div>
        </div>
        <div class="setings-item">
                    <span>
                        Fixed sidebar
                    </span>

          <div class="switch">
            <div class="onoffswitch">
              <input type="checkbox" name="fixedsidebar" class="onoffswitch-checkbox" id="fixedsidebar">
              <label class="onoffswitch-label" for="fixedsidebar">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
              </label>
            </div>
          </div>
        </div>
        <div class="setings-item">
                    <span>
                        Top navbar
                    </span>

          <div class="switch">
            <div class="onoffswitch">
              <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
              <label class="onoffswitch-label" for="fixednavbar">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
              </label>
            </div>
          </div>
        </div>
        <div class="setings-item">
                    <span>
                        Top navbar v.2
                        <br>
                        <small>*Primary layout</small>
                    </span>

          <div class="switch">
            <div class="onoffswitch">
              <input type="checkbox" name="fixednavbar2" class="onoffswitch-checkbox" id="fixednavbar2">
              <label class="onoffswitch-label" for="fixednavbar2">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
              </label>
            </div>
          </div>
        </div>
        <div class="setings-item">
                    <span>
                        Boxed layout
                    </span>

          <div class="switch">
            <div class="onoffswitch">
              <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
              <label class="onoffswitch-label" for="boxedlayout">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
              </label>
            </div>
          </div>
        </div>
        <div class="setings-item">
                    <span>
                        Fixed footer
                    </span>

          <div class="switch">
            <div class="onoffswitch">
              <input type="checkbox" name="fixedfooter" class="onoffswitch-checkbox" id="fixedfooter">
              <label class="onoffswitch-label" for="fixedfooter">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
              </label>
            </div>
          </div>
        </div>

        <div class="title">Skins</div>
        <div class="setings-item default-skin">
                    <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             Default
                         </a>
                    </span>
        </div>
        <div class="setings-item blue-skin">
                    <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            Blue light
                        </a>
                    </span>
        </div>
        <div class="setings-item yellow-skin">
                    <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            Yellow/Purple
                        </a>
                    </span>
        </div>
        <div class="setings-item ultra-skin">
                    <span class="skin-name ">
                        <a href="md_skin/" class="md-skin">
                            Material Design
                        </a>
                    </span>
        </div>
      </div>
    </div>
  </div>
<script>
  // Enable/disable fixed top navbar
  $('#fixednavbar').click(function (){
  if ($('#fixednavbar').is(':checked')){
  $(".navbar-static-top").removeClass('navbar-static-top').addClass('navbar-fixed-top');
  $("body").removeClass('boxed-layout');
  $("body").addClass('fixed-nav');
  $('#boxedlayout').prop('checked', false);

  if (localStorage){
  localStorage.setItem("boxedlayout",'off');
  }

  if (localStorage){
  localStorage.setItem("fixednavbar",'on');
  }
  } else{
  $(".navbar-fixed-top").removeClass('navbar-fixed-top').addClass('navbar-static-top');
  $("body").removeClass('fixed-nav');
  $("body").removeClass('fixed-nav-basic');
  $('#fixednavbar2').prop('checked', false);

  if (localStorage){
  localStorage.setItem("fixednavbar",'off');
  }

  if (localStorage){
  localStorage.setItem("fixednavbar2",'off');
  }
  }
  });

  // Enable/disable fixed top navbar
  $('#fixednavbar2').click(function (){
  if ($('#fixednavbar2').is(':checked')){
  $(".navbar-static-top").removeClass('navbar-static-top').addClass('navbar-fixed-top');
  $("body").removeClass('boxed-layout');
  $("body").addClass('fixed-nav').addClass('fixed-nav-basic');
  $('#boxedlayout').prop('checked', false);

  if (localStorage){
  localStorage.setItem("boxedlayout",'off');
  }

  if (localStorage){
  localStorage.setItem("fixednavbar2",'on');
  }
  } else {
  $(".navbar-fixed-top").removeClass('navbar-fixed-top').addClass('navbar-static-top');
  $("body").removeClass('fixed-nav').removeClass('fixed-nav-basic');
  $('#fixednavbar').prop('checked', false);

  if (localStorage){
  localStorage.setItem("fixednavbar2",'off');
  }
  if (localStorage){
  localStorage.setItem("fixednavbar",'off');
  }
  }
  });

  // Enable/disable fixed sidebar
  $('#fixedsidebar').click(function (){
  if ($('#fixedsidebar').is(':checked')){
  $("body").addClass('fixed-sidebar');
  $('.sidebar-collapse').slimScroll({
  height: '100%',
  railOpacity: 0.9
  });

  if (localStorage){
  localStorage.setItem("fixedsidebar",'on');
  }
  } else{
  $('.sidebar-collapse').slimscroll({destroy: true});
  $('.sidebar-collapse').attr('style', '');
  $("body").removeClass('fixed-sidebar');

  if (localStorage){
  localStorage.setItem("fixedsidebar",'off');
  }
  }
  });

  // Enable/disable collapse menu
  $('#collapsemenu').click(function (){
  if ($('#collapsemenu').is(':checked')){
  $("body").addClass('mini-navbar');
  SmoothlyMenu();

  if (localStorage){
  localStorage.setItem("collapse_menu",'on');
  }

  } else{
  $("body").removeClass('mini-navbar');
  SmoothlyMenu();

  if (localStorage){
  localStorage.setItem("collapse_menu",'off');
  }
  }
  });

  // Enable/disable boxed layout
  $('#boxedlayout').click(function (){
  if ($('#boxedlayout').is(':checked')){
  $("body").addClass('boxed-layout');
  $('#fixednavbar').prop('checked', false);
  $('#fixednavbar2').prop('checked', false);
  $(".navbar-fixed-top").removeClass('navbar-fixed-top').addClass('navbar-static-top');
  $("body").removeClass('fixed-nav');
  $("body").removeClass('fixed-nav-basic');
  $(".footer").removeClass('fixed');
  $('#fixedfooter').prop('checked', false);

  if (localStorage){
  localStorage.setItem("fixednavbar",'off');
  }

  if (localStorage){
  localStorage.setItem("fixednavbar2",'off');
  }

  if (localStorage){
  localStorage.setItem("fixedfooter",'off');
  }


  if (localStorage){
  localStorage.setItem("boxedlayout",'on');
  }
  } else{
  $("body").removeClass('boxed-layout');

  if (localStorage){
  localStorage.setItem("boxedlayout",'off');
  }
  }
  });

  // Enable/disable fixed footer
  $('#fixedfooter').click(function (){
  if ($('#fixedfooter').is(':checked')){
  $('#boxedlayout').prop('checked', false);
  $("body").removeClass('boxed-layout');
  $(".footer").addClass('fixed');

  if (localStorage){
  localStorage.setItem("boxedlayout",'off');
  }

  if (localStorage){
  localStorage.setItem("fixedfooter",'on');
  }
  } else{
  $(".footer").removeClass('fixed');

  if (localStorage){
  localStorage.setItem("fixedfooter",'off');
  }
  }
  });

  // SKIN Select
  $('.spin-icon').click(function (){
  $(".theme-config-box").toggleClass("show");
  });

  // Default skin
  $('.s-skin-0').click(function (){
  $("body").removeClass("skin-1");
  $("body").removeClass("skin-2");
  $("body").removeClass("skin-3");
  });

  // Blue skin
  $('.s-skin-1').click(function (){
  $("body").removeClass("skin-2");
  $("body").removeClass("skin-3");
  $("body").addClass("skin-1");
  });

  // Inspinia ultra skin
  $('.s-skin-2').click(function (){
  $("body").removeClass("skin-1");
  $("body").removeClass("skin-3");
  $("body").addClass("skin-2");
  });

  // Yellow skin
  $('.s-skin-3').click(function (){
  $("body").removeClass("skin-1");
  $("body").removeClass("skin-2");
  $("body").addClass("skin-3");
  });

  if (localStorage){
  var collapse = localStorage.getItem("collapse_menu");
  var fixedsidebar = localStorage.getItem("fixedsidebar");
  var fixednavbar = localStorage.getItem("fixednavbar");
  var fixednavbar2 = localStorage.getItem("fixednavbar2");
  var boxedlayout = localStorage.getItem("boxedlayout");
  var fixedfooter = localStorage.getItem("fixedfooter");

  if (collapse == 'on'){
  $('#collapsemenu').prop('checked','checked')
  }
  if (fixedsidebar == 'on'){
  $('#fixedsidebar').prop('checked','checked')
  }
  if (fixednavbar == 'on'){
  $('#fixednavbar').prop('checked','checked')
  }
  if (fixednavbar2 == 'on'){
  $('#fixednavbar2').prop('checked','checked')
  }
  if (boxedlayout == 'on'){
  $('#boxedlayout').prop('checked','checked')
  }
  if (fixedfooter == 'on') {
  $('#fixedfooter').prop('checked','checked')
  }
  }
</script>
</body>

</html>

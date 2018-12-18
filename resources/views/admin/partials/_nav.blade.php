
<nav class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5">
  <div class="logo">
    <a href="/admin" title="Lanjeron">
      <img class="img-responsive" src="" height="110" alt="">
    </a>
  </div><!--end logo-->
  </div>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/events') ?"active-nav" : ""}}" href="/admin/events">
          Events
        </a>
    </ul>
  </div>
</nav>

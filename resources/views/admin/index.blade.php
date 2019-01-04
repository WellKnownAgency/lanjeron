@section('title', '')
@section('dscr', '')
@section('keywords', '')

@extends('admin.main')

@section('content')
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3">
      <div class="card" style="width: 100%;">
        <div class="card-header">
          <h3> Website Links </h>
        </div>
        <div class="card-body">
          <ul class="list-group">
          <li class="list-group-item"><a href="/" target="_blank" class="list-group-item list-group-item-action">Main Page</a></li>
        </ul>
        </div>
      </div>
    </div>
    <br>

    <div class="col-sm-9">
      <div class="well">
        <h2><b>Lanjeron Dashboard</b></h2>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <a class="nav-link" href="/admin/events">Total Events</a>
            <p class="well-count">{{ $events->count() }}</p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <a class="nav-link" href="/admin/photos">Total Photos</a>
            <p class="well-count">{{ $photos->count() }}</p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <a class="nav-link" href="/admin/menus">Total Menus</a>
            <p class="well-count">{{ $menus->count() }}</p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <a class="nav-link" href="/admin/items">Total Items</a>
            <p class="well-count">{{ $items->count() }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

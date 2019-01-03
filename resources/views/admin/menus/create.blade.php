@section('title', 'Create New Event')
@section('dscr', '')
@section('keywords', '')

@extends('admin.main')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="card" style="width: 100%;">
        <h5 class="card-header">
          Lanjeron Events
        </h5>
        <div class="card-body">
          <a href="/admin/events" class="btn btn-info">All Events</a>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="card" style="width: 100%;">
        <h5 class="card-header">Create New Event</h5>
        <div class="card-body">
          <form action="{{route('menus.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
              </div>
              <div class="form-group col-md-6">
                <label for="slug">Slug</label>
                <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug">
              </div>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

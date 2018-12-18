@section('title', 'Create New photo')
@section('dscr', '')
@section('keywords', '')

@extends('admin.main')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="card" style="width: 100%;">
        <h5 class="card-header">
          Lanjeron Photos
        </h5>
        <div class="card-body">
          <a href="/admin/photos" class="btn btn-info">All Photos</a>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="card" style="width: 100%;">
        <h5 class="card-header">Create New photo</h5>
        <div class="card-body">
          <form action="{{route('photos.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
              </div>
            </div>
            <div class="form-group">
              <label for="image">Upload Image</label>
              <input type="file" class="form-control-file" name="img" id="image">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

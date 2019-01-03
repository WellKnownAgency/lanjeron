@section('title', 'Create New item')
@section('dscr', '')
@section('keywords', '')

@extends('admin.main')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="card" style="width: 100%;">
        <h5 class="card-header">
          Lanjeron Items
        </h5>
        <div class="card-body">
          <a href="/admin/items" class="btn btn-info">All Items</a>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="card" style="width: 100%;">
        <h5 class="card-header">Create New item</h5>
        <div class="card-body">
          <form action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="title">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
              </div>
              <div class="form-group col-md-6">
                <label for="title">Type</label>
                <select class="form-control" id="type" name="type">
                  <option value="None">None</option>
                  <option value="Cold Appetizers">Cold Appetizers</option>
                  <option value="Hot Appetizers">Hot Appetizers</option>
                  <option value="Entrees">Entrees</option>
                  <option value="Desserts">Desserts</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="image">Upload Image (500x500)</label>
                <input type="file" class="form-control-file" name="image" id="image">
              </div>
              <div class="col-md-6">
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

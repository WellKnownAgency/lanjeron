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
          Lanjeron Menus
        </h5>
        <div class="card-body">
          <a href="/admin/menus" class="btn btn-info">All Menus</a>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="card" style="width: 100%;">
        <h5 class="card-header">Edit Menu</h5>
        <div class="card-body">
          <form action="{{action('MenuController@update', $menu->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Menu Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$menu->name}}">
              </div>
              <div class="form-group col-md-6">
                <div>Items</div>
                @foreach ($items as $item)
                  <div class="form-check form-check-inline" >
                    <input class="form-check-input" type="checkbox" id="items" value="{{$item->id}}" name="items[]"
                    @if ($item->checked)
                        checked="checked"
                    @endif
                    >
                    <label class="form-check-label" for="items">{{ $item->name }} <img src="/images/menu/{{ $item->image }}" width="25px"/></label>
                  </div>
                @endforeach
              </div>
            </div>
            <button type="submit" class="btn btn-success">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

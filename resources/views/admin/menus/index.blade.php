@section('title', '')
@section('dscr', '')
@section('keywords', '')

@extends('admin.main')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="card" style="width: 100%;">
        <div class="card-header">
          Lanjeron Menus
        </div>
        <div class="card-body">
          <a href="/admin/menus/create" class="btn btn-success">Create menu</a>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="card" style="width: 100%;">
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">Name</th>
                <th>Items</th>
                <th scope="col">Created</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($menus as $menu)
              <tr>
                <th scope="row">{{ $menu->name }}</th>
                <th>
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">
                    View Items
                  </button>
                </th>
                <td>{{ Carbon\Carbon::now()->parse($menu->created_at)->diffForHumans() }}</td>
                <td>
                  <a href="/admin/menus/{{ $menu->id }}/edit" class="btn btn-info btn-sm edit">Edit</a>
                  <a href="/admin/menus/{{ $menu->id }}/delete" class="btn btn-danger btn-sm delete">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">List of Items in Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach ($menu->items as $item)
        <p><img src="/images/menu/{{ $item->image }}" width="50px"> <b>{{ $item->name }}</b> - <span>{{ $item->type }}</span> <p/>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@stop

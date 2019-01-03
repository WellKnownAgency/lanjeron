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
          Lanjeron Items
        </div>
        <div class="card-body">
          <a href="/admin/items/create" class="btn btn-success">Create Item</a>
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
                <th scope="col">Image</th>
                <th scope="col">Type</th>
                <th scope="col">Created</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
              <tr>
                <th scope="row">{{ $item->name }}</th>
                <td><img src="/images/menu/{{$item->image}}" width="50px;" height"auto"></td>
                <th>{{ $item->type }}</th>
                <td>{{ Carbon\Carbon::now()->parse($item->created_at)->diffForHumans() }}</td>
                <td>
                  <a href="/admin/items/{{ $item->id }}/delete" class="btn btn-danger btn-sm delete">Delete</a>
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
@stop

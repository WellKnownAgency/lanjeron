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
                <th scope="col" colspan="4">Name</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($menus as $menu)
              <tr>
                <th scope="row" colspan="4">{{ $menu->name }}</th>
                <td>{{ Carbon\Carbon::now()->parse($menu->created_at)->diffForHumans() }}</td>
                <td>{{ Carbon\Carbon::now()->parse($menu->updated_at)->diffForHumans() }}</td>
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

@stop

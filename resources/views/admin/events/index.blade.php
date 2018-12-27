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
          Lanjeron Events
        </div>
        <div class="card-body">
          <a href="/admin/events/create" class="btn btn-success">Create event</a>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="card" style="width: 100%;">
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Event date</th>
                <th scope="col">Created</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($events as $event)
              <tr>
                <th scope="row">{{ $event->title }}</th>
                <td><img src="/images/events/{{$event->image}}" width="50px;" height"auto"></td>
                <td>{{ Carbon\Carbon::parse($event->date)->format('d M') }}</td>
                <td>{{ Carbon\Carbon::now()->parse($event->created_at)->diffForHumans() }}</td>
                <td>
                  <a href="/admin/events/{{ $event->id }}/delete" class="btn btn-danger btn-sm delete">Delete</a>
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

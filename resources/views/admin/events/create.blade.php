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
          <form action="{{route('events.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
              </div>
              <div class="form-group col-md-6">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" id="date" placeholder="Date">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <input onblur="textCounter(this.form.recipients,this,255);" disabled  onfocus="this.blur();" tabindex="999" maxlength="3" size="3" value="255" name="counter">
                <label for="dscr">Description (max: 255)</label>
                <textarea onblur="textCounter(this,this.form.counter,255);" onkeyup="textCounter(this,this.form.counter,255);" type="textarea" class="form-control" name="dscr" id="dscr" placeholder="Description"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="image">Upload Image (500x500)</label>
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

<script>
function textCounter( field, countfield, maxlimit ) {
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  field.blur();
  field.focus();
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
</script>

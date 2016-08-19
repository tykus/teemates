{{ csrf_field() }}

<div class="form-group">
  <label for="name" class="col-sm-2 control-label">Name</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
  </div>
</div>

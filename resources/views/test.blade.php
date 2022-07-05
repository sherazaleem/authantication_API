<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<title>Laravel API</title>
</head>
<body>

	<form method="POST" action="/api/recipients" class="mt-2">
    @csrf
    <div class="form-group row">
        <label for="username" class="col-md-4 col-form-label text-md-right">Name</label>
        <div class="col-md-6">
            <input id="username" type="text" class="form-control" name="name" required autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label for="username" class="col-md-4 col-form-label text-md-right">Email</label>
        <div class="col-md-6">
            <input id="username" type="email" class="form-control" name="email" required autofocus>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <input type="submit" class="btn btn-primary" value="save">
        </div>
    </div>
</form>

<div class="container">
  <h2>Small Table</h2>
  <p>The .table-sm class makes the table smaller by cutting cell padding in half:</p>
  <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($note as $test)
      <tr>
        <th>{{$test->id}}</th>
        <th>{{$test->name}}</th>
        <th>{{$test->email}}</th>
        <th><a href="{{url('testshow',$test->id)}}" class="btn btn-danger btn-sm">Delete</a>
        <a href="{{url('testupdate',$test->id)}}" class="btn btn-success btn-sm">Update</a></th>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


</body>
</html>
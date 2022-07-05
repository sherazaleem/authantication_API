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

	<form method="PUT" action="/api/recipients/{id}">
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


</body>
</html>
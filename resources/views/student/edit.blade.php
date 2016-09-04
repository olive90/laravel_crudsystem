<!-- app/views/duck-form1.blade.php -->
<!doctype html>
<html>
<head>
    <title>Edit Data</title>

    <!-- load bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <style>
        body    { padding-bottom:40px; padding-top:40px; }
    </style>
</head>
<body class="container">

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-flash"></span> Hamitire.com</h1>
        </div>

        {{--<!-- FORM STARTS HERE -->--}}
        {!! Form::open(array('url' => ['update',$datas->id])) !!}

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" class="form-control" name="first_name" value="{{ $datas->first_name }}" placeholder="First Name">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" class="form-control" name="last_name" value="{{ $datas->last_name }}" placeholder="Last Name">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control" id="address" placeholder="Address">{{ $datas->address }}</textarea>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <button type="submit" class="btn btn-success">Update</button>

        {!! Form::close() !!}

    </div>
</div>

</body>
</html>
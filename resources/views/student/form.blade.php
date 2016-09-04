<!-- app/views/duck-form1.blade.php -->
<!doctype html>
<html>
<head>
    <title>Insert Data</title>

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

        @if ($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif

        @if(Session::has('submitmsg'))
            <span style="color:green">{!! Session::get('submitmsg') !!}</span>
        @endif

        {{--<!-- FORM STARTS HERE -->--}}
        <form method="POST" action="/insert" novalidate>

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" class="form-control" name="first_name" placeholder="First Name">
                @if ($errors->has('first_name')) <p class="help-block">{{ $errors->first('first_name') }}</p> @endif
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last Name">
                @if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control" id="address" placeholder="Address"></textarea>
                @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <button type="submit" class="btn btn-success">Done</button>

        </form>

    </div>
</div>

</body>
</html>
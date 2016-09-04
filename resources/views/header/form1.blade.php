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
        {{--<form method="POST" action="/insert" novalidate>--}}
        {!! Form::open(array('url' => '/post', 'files' => true )) !!}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" class="form-control" name="title" placeholder="Title">
                @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
            </div>

            <div class="form-group">
                <label for="sub_title">Last Name</label>
                <input type="text" id="sub_title" class="form-control" name="sub_title" placeholder="Sub Title">
                @if ($errors->has('sub_title')) <p class="help-block">{{ $errors->first('sub_title') }}</p> @endif
            </div>

            <div class="form-group">
                <label for="file">Address</label>
                <input type="file" id="image" class="form-control" name="image">
                @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
            </div>
            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

            <button type="submit" class="btn btn-success">Upload</button>

        {!! Form::close() !!}
        {{--</form>--}}

    </div>
</div>

</body>
</html>
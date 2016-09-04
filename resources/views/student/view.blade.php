<!-- app/views/duck-form1.blade.php -->
<!doctype html>
<html>
<head>
    <title>View Data</title>

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
            <h2>Show Data</h2>
        </div>

        @if(Session::has('updatemsg'))
            <span style="color:green">{!! Session::get('updatemsg') !!}</span>
        @endif

        @if(Session::has('deletemsg'))
            <span style="color:green">{!! Session::get('deletemsg') !!}</span>
        @endif

                    <table class="table table-hover table-condensed table-bordered">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Create Time</th>
                            <th>Last Update Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $key => $value)
                        <tr>
                            <td>{{ $value->first_name }}</td>
                            <td>{{ $value->last_name }}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>{{ $value->updated_at }}</td>
                            <td><a class="btn btn-small btn-info" href="{{ URL::to('editform/' . $value->id ) }}">Edit</a> <a class="btn btn-small btn-info" href="{{ URL::to('delete/' . $value->id ) }}">Delete</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

    </div>
</div>

</body>
</html>
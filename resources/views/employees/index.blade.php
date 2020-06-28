<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-8 offset-2">
                <h2 class="my-5 text-center">Add New Employee</h2>
                <hr>
                @if (Session::has('success'))
                <div class="alert alert-success">
                    <h3>{{Session::get('success')}}</h3>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @endif
                <form action="{{action('employeesController@store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Employee Name</label>
                        <input type="text" name="txtName" class="form-control form-control-lg"
                            placeholder="Employee Name">
                    </div>
                    <div class="form-group">
                        <label for="name">Employee Profile</label>
                        <input type="text" name="txtProfile" class="form-control form-control-lg"
                            placeholder="Employee Profile">
                    </div>
                    <div class="form-group">
                        <label for="name">Employee City</label>
                        <input type="text" name="txtCity" class="form-control form-control-lg"
                            placeholder="Employee City">
                    </div>
                    <div class="form-group">
                        <label for="name">Employee Address</label>
                        <input type="text" name="txtAddress" class="form-control form-control-lg"
                            placeholder="Employee Address">
                    </div>
                    <div class="form-group">
                        <label for="name">Employee Image</label>
                        <input type="file" name="flImage" class="form-control form-control-lg"
                            placeholder="Employee Address">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg"
                            placeholder="Add New Employee">
                    </div>
                
                </form>

            </div>

        </div>

    </div>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Profile</th>
                <th>Address</th>
                <th>City</th>
                <th>Image</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>

        </thead>
        @foreach ($emps as $row)
        <tr>
            <th>{{$row->id}}</th>
            <th>{{$row->name}}</th>
            <th>{{$row->profile}}</th>
            <th>{{$row->address}}</th>
            <th>{{$row->city}}</th>
            <th><img src="uploads/employees/{{$row->image}}" width="100" alt=""></th>
            <td><a href="{{action('employeesController@edit',$row['id'])}}" class="btn btn-warning">Edit</a></td>
        {{-- <td><a href="{{action('employeesController@destroy',$row['id'])}}" class="btn btn-danger">Delete</a></td> --}}
            <td>
            <form action="{{action('employeesController@destroy',$row['id'])}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" class="btn btn-danger" value="delete">
            </form>    
            </td> 
        </tr>
        @endforeach

    </table>
</body>

</html>
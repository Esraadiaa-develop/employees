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
                <h2 class="my-5 text-center">Edit Employee</h2>
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
                <form action="{{action('employeesController@update',$id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Employee Name</label>
                        <input type="text" name="txtName" class="form-control form-control-lg" value="{{$emp->name}}"
                            placeholder="Employee Name">
                    </div>
                    <div class="form-group">
                        <label for="name">Employee Profile</label>
                        <input type="text" name="txtProfile" class="form-control form-control-lg" value="{{$emp->profile}}"
                            placeholder="Employee Profile">
                    </div>
                    <div class="form-group">
                        <label for="name">Employee City</label>
                        <input type="text" name="txtCity" class="form-control form-control-lg" value="{{$emp->city}}"
                            placeholder="Employee City">
                    </div>
                    <div class="form-group">
                        <label for="name">Employee Address</label>
                        <input type="text" name="txtAddress" class="form-control form-control-lg" value="{{$emp->address}}"
                            placeholder="Employee Address">
                    </div>
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="Update Employee"
                            placeholder="Update Employee">
                    </div>
                
                </form>

            </div>

        </div>

    </div>  
</body>
</html>
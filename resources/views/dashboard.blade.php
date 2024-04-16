<!-- dashboard page -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- custom css link -->
    <link rel="stylesheet" href="../css/app.css">
    <title>Dashboard</title>
</head>

<body>
    <!--start of container class for main body-->
    <div class="container">
        <!-- welcoming user through session -->
        <div class="container">
            <h2>Hello {{$data->user_name}}</h2>
        </div>
        <!-- start of contianer for table -->
        <div class="container">
            {{-- <!-- start of table -->
            <table border="1px">
                <tr>
                    <!--start of data heading -->
                    <th>user_id</th>
                    <th>user_name</th>
                    <th>user email id</th>
                    <th>user_password</th>
                    <!--end of data heading -->
                    </tr>
                <tr>
                    <!--start of data of logged in user will be shown -->
                    <td>{{$data->id}}</td>
                    <td>{{$data->user_name}}</td>
                    <td>{{$data->user_email_id}}</td>
                    <td>{{$data->user_password}}</td>
                    <!--end of data of logged in user will be shown -->
                    </tr>
            </table> --}}
            <!-- end of table -->
        </div>
        <!-- end of contianer for table -->
        <!-- start of contianer for logout button -->
        <div class="container">
            <!--button to logout  -->
            <button type="button" class="btn btn-danger"><a href="logout">logout</a>
            </button>
        </div>
        <!-- end of contianer for logout button -->
    </div>
    <!-- end of contianer for main body -->
</body>
</html>
<!-- end of dashboard page -->
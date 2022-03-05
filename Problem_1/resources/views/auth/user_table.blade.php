<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
</head>
<body>

        <style>
            .edit{
                margin-right: 10px;
                margin-left:4px;
            }
            .delete{
                margin-left: 33px;
            }
            .btn{
                display: flex; 
                align-items: center;
                margin-left: 9px;
                margin-right: -49px;
            }

            #ptable{
                width: 100%;
                border: 1px solid rgb(126, 126, 175);
                border-collapse: collapse;
            }

            #ptable th, #ptable td{
                border: 1px solid rgb(126, 126, 175);
                border-collapse: collapse;
                text-align: center;
                color: black;
            }

            #ptable tr:hover{
                background-color: bisque !important;
            }


        </style>

        <h3>Registered User Info</h3>
        
        <div class="d-flex justify-content-center links" style="margin-bottom: 10px;">
            Want to register new account?<a href='registration'>Register</a>
        </div>
       
        

            <table id="ptable">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Date of Birth</th>
                        <th>Status</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Buttons</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users != null)
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user['user_name']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>{{$user['password']}}</td>
                                <td>{{$user['date_of_birth']}}</td>
                                <td>{{$user['status']}}</td>
                                <td>{{$user['city']}}</td>
                                <td>{{$user['country']}}</td>
                                <td>
                                <div class="btn">
                                    <div class="edit">
                                        <form action = "{{route('edit_page')}}" method="POST">
                                            @csrf
                                            <input type="hidden" id="id" name="id" value={{$user['id']}}>
                                            <input class="btn" type="submit" name="edit" id="edit" value="Edit">
                                        </form>
                                    </div>
                                    <div class="delete">
                                        <form action = "{{route('delete_func')}}" method="POST">
                                            @csrf
                                            <input type="hidden" id="id" name="id" value={{$user['id']}}>
                                            <input class="btn" type="submit" name="delete" id="delete" value="Delete">
                                        </form>
                                    </div>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h1>No data!</h1>
                    @endif
                </tbody>
            </table>

        
</body>
</html>
    
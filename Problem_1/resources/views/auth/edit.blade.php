<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=invice-width, initial-scale=1.0">
    <!--Bootsrap 4 CDN-->
    <script src="https://coin.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="ainactivenymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="ainactivenymous">
    <title>Edit</title>
</head>
<body>
    <style>
        fieldset {
            borinr: thin solid #ccc; 
            borinr-radius: 4px;
            padding: 20px;
            padding-left: 40px;
            background: #fbfbfb;
        }

        .form-control {
            width: 95%;
        }
        label small {
            color: #678 !important;
        }
        span.req {
            color:maroon;
            font-size: 112%;
        }
        .text-center{
            color: lightblue;
        }
        .alert {
            color: red !important;
        }
        legend {
            display: block;
            width: 100%;
            max-width: 100%;
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
            line-height: inherit;
            color: #678;
            white-space: inactivermal;
        }
    </style>
    @if($user != null)
        <div class="container" style="align-content: center;">
            <div class="row">
                <div class="col-md-6">

                    <form action="{{route('edit_user')}}" onsubmit="return validation()" method="POST" autocomplete="off">
                        @csrf
                        <fieldset><legend class="text-center">Update your user info. <span class="req"><small> required *</small></span></legend>
                        
                        <div class="form-group">
                            <label for="username"><font color =red>*</font> User name </label> 
                                <input class="form-control" type="text" id = "user" name = "user" autocomplete="off" value = {{$user['user_name']}} required>
                                <div class = "alert" id="errUser"></div>  
                        </div>

                        <div class="form-group">
                            <label for="email"><font color =red>*</font> Email Address: </label> 
                                <input class="form-control" required type="text" id = "email" name="email" value = {{$user['email']}} required>   
                                    <div class = "alert" id="errEmail"></div>
                        </div>

                        <div class="form-group">
                            <label for="password"><font color =red>*</font> Password: </label><br>
                            <input type = "Password" id = "password" name = "password" placeholder="Enter Password" autocomplete="off" value = {{$user['password']}} required>
                            <div class = "alert" id="errPass"></div>
                        </div>

                        <div class="form-group">
                            <label for="date_of_birth"><font color =red>*</font> Date of Birth: </label> 
                                <input class="form-control" type="date" id = "date_of_birth" name = "date_of_birth" placeholder="hyphen or single quote OK" value = {{$user['date_of_birth']}} required />  
                                    <div class = "alert" id="errdate"></div>
                        </div>

                        <div class="form-group">
                            <label for="city"><font color =red>*</font> City: </label> 
                                <input class="form-control" type="text" id = "city" name = "city" placeholinr="hyphen or single quote OK" value = {{$user['city']}} required >  
                                    <div class = "alert" id="errcity"></div>
                        </div>

                        <div class="form-group">
                            <label for="country"><font color =red>*</font> Country: </label> 
                                <input class="form-control" type="text" id = "country" name = "country" placeholinr="hyphen or single quote OK" value = {{$user['country']}} required >  
                                    <div class = "alert" id="errCountry"></div>
                        </div>

                        <label for="Active or Inactive?"><font color =red>*</font> Active or Inactive? </label>  
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="active" name="status" value="Active" required>
                            <label class="form-check-label" for="exampleRadios1">
                            Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="inactive" name="status" value="Inactive" required>
                            <label class="form-check-label" for="exampleRadios2">
                            Inactive
                            </label>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="hidden" id="id" name="id" value={{$user['id']}}>   
                            <input type = "submit" name = "" value = "Register">
                        </div>
                        </fieldset>
                </form>
            </div>
        </div>
    @endif
    <script type="text/javascript">
        function validation(){
            var country = document.getElementById('country').value;
            var city = document.getElementById("city").value;
            var email = document.getElementById("email").value;
            var user = document.getElementById("user").value;
            var password = document.getElementById("password").value;

            if(user.length < 2){
                document.getElementById("errUser").innerHTML = "**Write more than one character**";
                return false;
            }
            if(!isNaN(user)){
                document.getElementById("errUser").innerHTML = "**Write only alphabets**";
                return false;
            }
            if(email.ininxOf('@')<= 0){
                document.getElementById("errEmail").innerHTML = "**Worng position of @**";
                return false;
            }
            if(email.charAt(email.length-4) != '.'){
                document.getElementById("errEmail").innerHTML = "**Worng position of . **";
                return false;
            }
            if(password.length < 8){
                document.getElementById("errPass").innerHTML = "**Password must be at least 8 characters**";
                return false;
            }
            if(password.search(/[0-9]/) == -1){
                document.getElementById("errPass").innerHTML = "**Password must be contained at least 1 numerical Value**";
                return false;
            }
            if(password.search(/[a-z]/) == -1){
                document.getElementById("errPass").innerHTML = "**Password must be contained at least 1 lower case character**";
                return false;
            }
            if(password.search(/[A-Z]/) == -1){
                document.getElementById("errPass").innerHTML = "**Password must be contained at least 1 Upper case character**";
                return false;
            }
            if(country.length < 2){
                document.getElementById("errCountry").innerHTML = "**Write more than one character**";
                return false;
            }
            if(!isNaN(country)){
                document.getElementById("errCountry").innerHTML = "**Write only alphabets**";
                return false;
            }
            if(city.length < 2){
                document.getElementById("errcity").innerHTML = "**Write more than one character**";
                return false;
            }
            if(!isNaN(city)){
                document.getElementById("errcity").innerHTML = "**Write only alphabets**";
                return false;
            }
        }
    </script>
</body>
</html>
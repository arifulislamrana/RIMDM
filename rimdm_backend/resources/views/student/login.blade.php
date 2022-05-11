<!DOCTYPE html>
<html>

    <head>
        <title>rimdmadrasah|studentLogin</title>
        <link rel="stylesheet" type="text/css" href="/front/login.css">
        <link rel="stylesheet" href="/front/css/bootstrap.min.css">
    </head>

    <body>
        @if(count($errors) > 0 )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
	    @endif
        <div class="login-box">
            <img src="/front/images/logo.jpg" class="avatar">
            <h1>Login Here</h1>
            <form action="{{ Route('student.loginPost') }}" method="POST">
                @csrf
                <p>User Email</p>
                <input type="text" name="email" placeholder="Enter User email" value="{{old('email')}}" required>
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter Password" required>
                <input type="submit" name="submit" value="Login">
                <a href="#">Forget Password</a>
            </form>
        </div>
    </body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/app.js', 'build')
</head>
<body>

    <div id="app">
        <login-form>

        </login-form>
    </div>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @vite('resources/js/app.js', 'build')
    <style>
    body {
        background-color: #F5F7F8;
        font-family: Arial, Helvetica, sans-serif;
    }

    .login-wrap {
      max-width: 400px;
      margin: 100px auto 0;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      padding: 30px;
      border-radius: 5px;
    }

    .login-form .form-group {
      margin-bottom: 20px;
    }

    .login-form label {
      font-weight: bold;
    }

    .login-form .form-control {
      border-radius: 3px;
      border-color: #ccc;
    }

.login-form .submit {
  background-color: #217D46; /* Change this to your desired background color */
  border-color: #217D46; /* Change this to your desired border color */
  font-weight: bold;
}


    .login-form a {
      color: #007bff;
    }

    .login-form a:hover {
      color: #0056b3;
    }

    .login-wrap h5 {
        text-align: center;
        font-weight: bold;
        margin-bottom: 40px;
        color: #000000;
    }

    .login-wrap img {
      display: block;
      margin: 0 auto;
      height: 120px;
      width: 120px;

    }
    .top-nav {
    position: absolute;
    width: 100%;
    top: 0;
    background-color: #F4CE14;
    color: #ffffff;
    padding: 0.875rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 3.125rem;

}
a{
    color: #ffffff;
}

.link-dark, a{
    text-decoration: none;
}

.top-nav .notification-button {
    display: flex;
    align-items: center;
    color: #ffffff;
    text-decoration: none;
    margin-right: 0.625rem;
}
.top-nav .profile-dropdown .profile-name {
    margin-right: 0.3125rem;
}

    </style>
</head>
<body>
    <div id="app">
        <!-- TOP NAV BAR -->
        <div class="wrapper">
            <div class="top-nav">
                <a href="#" class="nav-link link-light">
                    <span class="nav-link-text">Student Violation Monitoring System</span>
                </a>
        </div>
        </div>
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="login-wrap p-4 p-md-5">
            <!-- Add the following HTML code inside the login-wrap div -->
            <img src="/asset/cmu-logo.png" alt="Login Image" class="img-fluid mb-4">
            <div id="loading-placeholder" class="text-center" style="display: none;">
            <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
            </div>
            <p>Loading...</p>
            </div>
            <h5>Log In</h5>

        <!-- Inside the form, add labels for the username and password inputs -->
            <login-form>

            </login-form>
        </div>
        </div>
    </div>
</div>
</body>

</html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css    ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
  <div class="container-fluid mt-5">
    <div class="container">
      <div class="d-flex">
        <div class="col-4 offset-2  rad-1 form-1 shadow-lg">
          <div class="icon-1 rad-3 py-2">
            <div class="d-flex login-1 justify-content-center my-3">
              <h2>LOGIN PAGE</h2>
              <img src="{{ asset('assets/img/icon-1.png')}}" alt="" class="img-1" />
            </div>
          </div>
          <div class="col-10 offset-1 mt-4">
          <form action='/login/auth' method="POST">
            @csrf
            <label for="" class="input-1">Username</label> <br />
            <input type="text" name="username" class="form-control input-2" placeholder="Input your username here"/>
            <label for="" class="input-1">Email</label> <br />
            <input type="text" name="email" class="form-control input-2" placeholder="Input your username here"/>
            <label for="" class="input-1">Password</label> <br />
            <input type="password" name="password" class="form-control input-2 mb-3" placeholder="Input your password here" />
            <button type="submit" class="btn  btn-1 rounded-5 px-5 mb-5 py-2">Sign In</button>

          </form>
        </div>
        </div>
        <div class="col-4  rad-2 shadow-lg">
          <div class="col-10 acc-1 offset-1">
          <h3>DO YOU HAVE ACCOUNT?</h3>
          
          <p>
            If you don’t have account, please register 
          </p>
          <a href="{{ route('register-page')}}"> HERE </a>  
        </div>
        </div>
      </div>
    </div>
  </div>

  @if ($errors->any())
  <script>
     Swal.fire({
icon: 'error',
title: 'Gagal Login!',
text: 'Silahkan Coba Lagi!',

})
  </script>
@endif 

@if (Session('notAllowed'))
<script>
  Swal.fire({
icon: 'error',
title: 'Logindekk',
text: 'Silahkan Login Terlebih Dahulu!',

})
</script>
@endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
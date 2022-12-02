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
<div class="container shadow-lg align-item-center regis-1 col-lg-12 d-flex">
<form method="POST"  class="m-3 col-lg-6" action="{{route('register.input')}}">
    @csrf 
    
    <div class="mb-2 wrap-input100">
        <h3 class="text-center">Register</h3>
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control p-1" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
      </div> 
      <div class="mb-2 wrap-input100">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control p-1" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
      </div>
    <div class="mb-2 wrap-input100">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control p-1" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    </div>
    <div class="mb-2 wrap-input100">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control p-1" id="exampleInputPassword1" name="password">
    </div>
    <div class="d-flex justify-content-end">
    <button type="submit" class="btn bt-2"> Sign Up</button>
    
    </div>

  </form>
  <div class="col-lg-8" >
    <img src="{{ asset('assets/img/bg-2.png')}}" style="width: 350px;" alt="">
</div>
</div>
    @if ($errors->any())
        <script>
           Swal.fire({
  icon: 'error',
  title: 'Silahkan Isi!',
  text: 'Form ini tidak boleh kosong!',

})
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>

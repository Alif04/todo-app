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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css">
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
    <div class="d-flex" id="wrapper" >
      <!-- Sidebar-->
      <div class="border-end text-white" style="background-color:#5e4141;" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom " style="background-color:#5e4141;">
           <h3><i class="fa-solid fa-calendar-days mx-1"></i> TODO App</h3>
        </div>
        <div class="list-group list-group-flush text-white" >
          <div class="sidebar-1">
          <div
            class="container list-group-item list-group-item-action list-group-item-light  p-3" style="background-color:#5e4141;"
          >
            <a href="/dashboard" class="text-white"><i class="fa-regular fa-user mx-3 "></i>Dashboard</a>
          </div>
        
          
          <div
            class="container list-group-item list-group-item-action list-group-item-light p-3" style="background-color:#5e4141;"
          >
            <a href="/maketodo" class="text-white"><i class="fa-regular fa-pen-to-square mx-3 "></i>Create Todo</a>
          </div>
          <div
            class="container list-group-item list-group-item-action list-group-item-light p-3"style="background-color: #5e4141;"
          >
             <a href="/showtodo" class="text-white"><i class="fa-regular fa-clipboard mx-3 "></i>Dashboard</a>
          </div>
        </div>
      </div>
      </div>
      <!-- Page content wrapper-->
      <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav
          class="navbar navbar-expand-lg navbar-light  navbar-fixed-top" 
        >
          <div class="container-fluid mb-2">
            <a class="btn fs-3" id="sidebarToggle"
              ><i class="fas fa-regular fa-bars text-white"></i
            ></a>
            <div class="dropdown "> 
              <button class=" btn-90 text-dark btn-secondary dropdown-toggle me-5 mt-2 text-white"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->username}}
              </button>
              <ul class="dropdown-menu">
                <li>  <a class="dropdown-item" href="/logout"><i class="fas fa-solid fa-arrow-right-from-bracket" style="color: black;"></i> Logout</a></li>
                <li > <a class="dropdown-item"  href="#"><i class=" fa-regular fa-user px-1"></i>Profile</a></li>
              </ul>
            </div>
          </div>
          
        </nav>
        <!-- Page content-->
        <div class="container-fluid">
          @yield('content') 
        </div>
      </div>
    </div>
    <script src="{{url('assets/js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
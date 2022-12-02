@extends ('layout')
@section ('content')
@if (session('LoginSuccess'))
<script>
    Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
  )
  </script>
@endif 

    @if (Session::get('notAllowed'))
    <script>
        Swal.fire({
   icon: 'error',
   title: 'Gagal Mendapatkannya!',
   text: 'Silahkan Coba Lagi!',
   
   })
     </script>
     @endif
     @if (Session::has('successAdd'))
       <script>
Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
     </script>
     @endif
  <div class="container-fluid text-center mt-5 mr-0 col-10" >
      <h1>TO DO APP</h1>
  
  <div class="container">
      <div class="d-flex mt-5 gap-3">
              <img src="{{ asset('assets/img/bg-3.png')}}"class="offset-1" style="width: 400px;">
      <div class="col-6 " >
          <h3>What is ToDo app?</h3>
          <br>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, accusamus odio ipsa beatae minima architecto possimus magnam! Ratione repudiandae autem eaque in quidem ut eveniet excepturi similique ipsum eum ea, accusantium fugiat, ducimus dolores inventore maxime blanditiis consequatur quia facere! Dolorem, commodi aperiam harum eaque reiciendis cum ea temporibus? Maiores?</p>
          <div class="col-12  mt-3">
              <a href='/maketodo' class="btn btn-3 py-3 px-4 mt-5 mx-3"> Make To Do</a>
          </div>
      </div>
      </div>
  </div>
</div>
  

@endsection 
@extends ('layout')
@section ('content')
@if ($errors->any())
<script>
   Swal.fire({
icon: 'error',
title: 'Silahkan Isi!',
text: 'Form ini tidak boleh kosong!',

})
</script>
@endif
        <div class="container shadow-lg align-item-center regis-2 col-6 mt-3 d-flex">
          <form method="POST"  class="m-3 col-6" action="/store">
            {{-- @csrf : mengambil dn mengirim data input ke controller yang nantinya diambil oleh request --}}
              @csrf

              <div class="mb-5">
                  <h3 class="text-center">Make To Do </h3>
                 
                </div> 
              <div class="mt-5 wrap-input101">
                  <label for="exampleInputEmail1" class="form-label">Title</label>
                  <input type="text" class="form-control pp-1" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
                </div>
              <div class="mb-2 wrap-input101">
                <label for="exampleInputEmail1" class="form-label">Deadline</label>
                <input type="date" class="form-control pp-1" id="exampleInputEmail1" aria-describedby="emailHelp" name="date">
              </div>
              <div class="mb-2 wrap-input101">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" class="form-control pp-1" id="exampleInputPassword1" name="description">
              </div>
              <button type="submit" class="btn btt-2">Add</button>
            </form>
            <div class="col-8">
              <img src="{{ asset('assets/img/bg-4.png')}}" alt="" style=" width:400px;" >
          </div>
    </div>
</div>
  
  </div>
@endsection
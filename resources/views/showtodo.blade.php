@extends ('layout')
@section ('content')

@if (session('success-delete'))
    <script>
       Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
    </script>
    @endif

<div class="wrapper bg-white mt-3 " style="width:500px; max-height:500px; ">
    <div class="container">
    <div class="d-flex align-items-start justify-content-between">
        <div class="d-flex flex-column">
            <div class="h5">My Todo's</div>
            <p class="text-muted text-justify">
                Here's a list of activities you have to do
            </p>
            <br>
            <span>
                <a href="/maketodo" class="text-success text-decoration-none">Create</a>  
            </span>
        </div>
        <div class="info btn ml-md-4 ml-0">
            <span class="fas fa-info" title="Info"></span>
        </div>
    </div>
    <div class="work border-bottom pt-3">
        <div class="d-flex align-items-center py-2 mt-1">
            <div>
                <i class="fa-regular fa-envelope px-2"></i>
            </div>
            <div class="text-muted"> {{$todos->count()}} Todos </div>
           
        </div>
    </div>
</div>

    <div  id="comments" class="mt-1 " style="overflow: scroll;">
        <div class="container" style="max-height: 250px;" >
        {{-- looping data-data dari compcat 'todos' agar dapat ditampilkan per baris datanya--}}
        @foreach ($todos as $a)
        <div class="comment d-flex align-items-start justify-content-between ">

            <div class="d-flex flex-column w-75" >
            
                {{-- meanmpilkan data dinamis/data yang diambil dari database pada blade harus menggunakna {{}} --}}
                <p class="text-justify fw-bold" style="text-decoration: none; color: grey; margin-bottom: 0rem !important;">
                    {{$a['title']}}
                </p>
            
                <p class="text-truncate"> {{ $a['description'] }} </p>
                {{-- konsep ternanry : if column status baris ini isinya 1 bakal memunculkan teks 'Complated' selain dari itu akan menampilkan teks 'On-Proccess'--}}
                <p class="text-muted">{{$a['status'] == 1 ? 'Complated' : 'On Proccess'}} 
                    {{-- Carbon itu package laravel untuk mengelola yang berhubungan dengan date. Tadinya value column date di database berbentuk format 2022-11-22 nah jadi itu diubah menjadi format 22 November 2022  --}}
                    <span class="date"> {{ $a['status'] == 1 ? 'Selesai pada : ' . \Carbon\Carbon::parse($a['date'])->format('j F, Y') : 'Target selesai : ' . \Carbon\Carbon::parse($a['done_time'])->format('j F, Y') }}</span></p>
            </div>
        
            <div class="dropdown">
                <div class="container">
                <a class="  text-dark fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" > 
                    <i class="fas fa-regular fa-caret-down" style="font-size: 20px"></i>
                                          </a>
              
                <ul class="dropdown-menu">
                    @if ($a['status'] == 0)
                   
                    <form action="/complated/{{ $a['id']}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="text-dark btn "><i class="fa-regular fa-calendar-check ms-1 px-2"></i>Complete</button>
                </form>
                @endif
                  <li><a class="dropdown-item" href="/edit/{{ $a->id }}"><i class="fa-solid fa-pen-to-square mx-2"></i>Edit</a></li>
                  <li><a class="dropdown-item" onclick="confirmDelete()" href="/delete/{{ $a->id}}"><i class="fa-solid fa-trash mx-2"></i>Delete</a></li>
                </ul>
            </div>
              </div>

        </div>
        @endforeach
    </div>
</div>  
@endsection 
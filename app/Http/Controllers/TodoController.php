<?php

namespace App\Http\Controllers;


use App\Models\Todo;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(){
        return view('register');
    }
    public function login(){
        return view('login');
    }

    public function maketodo(){
        return view('maketodo');
    }

    public function showtodo(){
        // ambil data dari table todos dengan model Todo
        // all () fungsinya untuk mengambil semua data di table
        $todos = Todo::where('user_id', '=', Auth::user()->id)->get();
        // kirim data yang sudah diambil di file blade / ke file yang menampilkan halaman
        // kirim melalui compact()
        // isi compact sesuaikan dengan nama variabel

        return view('showtodo', compact('todos'));
    }

    

    public function dashboard(){
        return view('dashboard');
    }

    public function index()
    {   
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function updateComplated($id){
        // ambil data dari table todos dengan model Todo
        // all() fungsinya untuk mengambil semua data di table 
        // cari data yang mau diubah status 'complated' dan column 'done_time' yang tadinya null diisi dengan tanggal 
        // karena status boolean, 0 untuk status On-Progress dan 1 untuk Complated
        Todo::where('id', '=', $id)->update([
            'status'=> 1,
            'done_time' => \Carbon\Carbon::now(),
        ]);
        // apabila berhasil, akan dikembalikan ke halaman awal dengan pemberitahuan
        return redirect('/showtodo')->with('done','berhasil gess!');
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // menyimpan data ke database
        // tes koneksi dengan controller
        //dd($request->all());

        //validasi data
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:3',
        ]);

        // mengirim data ke database table todos dengan model Todo 
        // '' = nama column di database
        // $request-> = value attribute nama pada input
        // kenapa yang dikiri, 5 data? karena table pada database todos membutuhkan 6 column input
        // salah satunya column "done_time" yang tipenya nullable, karena nullable jadi tidak perlu dikirim nilai
        // 'user_id' untuk memberitahu data todo ini milik siapa, diambil melalui fitur Auth
        // 'status' tipenya boolean, 0 = belum dikerjakan, 1 = sudah dikerjakan (todonya)
        Todo::create([
            'title'=> $request->title,
            'date'=> $request->date,
            'description'=> $request->description,
            'status'=> 0,
            'user_id'=> Auth::user()->id,

        ]);
        return redirect('/dashboard')->with('successAdd', 'BIMBIM GANTENG');

    }

    public function registerAccount(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email'=> 'required|email:dnsx',
            'username' => 'required|min: 2|max: 20',
            'password' => 'required|min: 4',
            'name' => 'required|min: 3',
        ]);

       
    
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // redirect kemana setelah berhasil tambah data + dikirim pemberitahuan
        return redirect('/login')->with('success', 'Berhasil menambahkan akun! silahkan login');

    }

    public function logout(){
        // menghapus history login
        Auth::logout();
        //mengarahkan ke halaman login kembali
        return redirect('/login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ],[
            'username.exists' => 'username belum tersedia',
            'username.required' => 'username harus diisi',
            'password.required' => 'password harus diisi',
        ]);

        $user = $request->only('username', 'password');
        if(Auth::attempt($user)){
            return redirect('/dashboard')->with('LoginSuccess','Berhasil!!');
        }else{
            return redirect()->back()->with('error', 'Gagal Login', 'Silahkan cek dan coba-lagi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::where('id', $id)->first();
        return view ('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:3',
        ]);

        Todo::where('id', $id)->update([
            'title'=> $request->title,
            'date'=> $request->date,
            'description'=> $request->description,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);

        return redirect('/showtodo')->with('successEdit', 'YUHUUUUUUUUU!!');
    }

    /**
     * Remove the specified resource from storage.
     *a
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect('/showtodo')->with('success-delete', 'Siiuuuuu');
    }


}
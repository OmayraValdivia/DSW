<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::all();
        return view('book.index', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('book.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $book = new Book;
        $book->title = $request->title;
        $book->autor = $request->autor;
        if ($request->hasFile('imagen')) {
          //Obtenemos nombre orginal
          $nameImg = $request->file('imagen')->getClientOriginalName();
          //Almacenamos la imagen en la carpeta public/images con el nombre original
          $path = $request->imagen->storeAs('images', $nameImg, 'public');
          //Almacenamos en la BBDD la ruta /storage/+$path
          $book->imagen = "/storage/".$path;
        }else{
          //Imagen comodin
          $book->imagen = '/storage/images/sinPortada.png';
        }
        $book->save();
        return redirect()->action('BookController@index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $book = Book::findOrFail($id);
        return view('book.show', compact('book'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Book::findOrFail($id);
        return view('book.edit', compact('book'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->autor = $request->autor;
        if ($request->hasFile('imagen')) {
          //Obtenemos nombre orginal
          $nameImg = $request->file('imagen')->getClientOriginalName();
          //Almacenamos la imagen en la carpeta public/images con el nombre original
          $path = $request->imagen->storeAs('images', $nameImg, 'public');
          if ($book->imagen!=='/storage/images/sinPortada.png'){
            //Quitamos el texto /storage/ (9 caracteres):
            $ruta = substr($book->imagen, 9);
            Storage::disk('public')->delete($ruta);
          }
          //Almacenamos en la BBDD la ruta /storage/+$path
          $book->imagen = "/storage/".$path;
        }else{
          //Si no se sube imagen, se mantiene la imagen que tiene.
          $book->imagen = $book->imagen;
        }
        $book->update();
        return view('book.show', compact('book'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book = Book::findOrFail($id);
        //Borrar img si no es el comodin
        if ($book->imagen!=='/storage/images/sinPortada.png'){
          //Quitamos el texto /storage/ (9 caracteres):
          $ruta = substr($book->imagen, 9);
          Storage::disk('public')->delete($ruta);
        }
        $book->delete();
        return redirect()->route('books.index');
    }
}

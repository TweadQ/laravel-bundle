<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
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
        $books = Book::paginate(10);
        return view('pages.home', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation form
      $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:1000',
        'url_img' => 'required|max:2000|mimes:png,jpg|image',
        'author' => 'required',
        'price' => 'required',
        'nombre_pages' => 'required',
      ]);
  
      $validateImg = $request->file('url_img')->store('cover');
  
      Book::create([
        'title' => $request->title,
        'description' => $request->description,
        'url_img' => $validateImg,
        'author' => $request->author,
        'price' => $request->price,
        'nombre_pages' => $request->nombre_pages,
        'created_at' => now()
      ]);
  
      // redirect
      return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('pages.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('pages.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // validation form
      $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:1000',
        'url_img' => 'required|sometimes|max:2000|mimes:png,jpg|image',
        'author' => 'required',
        'price' => 'required',
        'nombre_pages' => 'required'
      ]);
  
      // verify if file exist
      // if file exist delete previous img
      if ($request->hasFile('url_img')) {
        // delete previous image
        Storage::delete($book->url_img);
        // store the new image
        $book->url_img = $request->file('url_img')->store('books');
      }
  
      $book->update([
        'title' => $request->title,
        'description' => $request->description,
        'url_img' => $book->url_img,
        'author' => $request->author,
        'price' => $request->price,
        'nombre_pages' => $request->nombre_pages,
        'created_at' => now()
      ]);
  
      return redirect()
        ->route('books.show', $book->id)
        ->with('status', 'La book a bien été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('home')->with('status', 'Book deleted!');
    }
}

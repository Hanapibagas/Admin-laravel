<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function tambah()
    {
        return view('master.admin.buku.plus');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'book_code' => 'required|string',
            'tittle' => 'required|string',
            'publisher' => 'required|string',
            'publisher_year' => 'required|string',
            'book_code' => 'required',
        ]);

        if ($request->file('cover')) {
            $file = $request->file('cover')->store('gambar', 'public');
        }

        Book::create([
            "book_code" => $request->input('book_code'),
            "tittle" => $request->input('tittle'),
            "publisher" => $request->input('publisher'),
            "publisher_year" => $request->input('publisher_year'),
            "cover" => $file
        ]);

        return redirect()->route('index-book');
    }

    public function tampilan()
    {
        $books = Book::all();

        return view('master.admin.buku.table', compact('books'));
    }

    public function edit($id)
    {
        $book = Book::where('id', $id)->first();

        return view('master.admin.buku.update', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'book_code' => 'required|string',
            'tittle' => 'required|string',
            'publisher' => 'required|string',
            'publisher_year' => 'required|string',
            'book_code' => 'required',
        ]);

        $book = Book::where('id', $id)->first();

        if ($request->file('cover')) {
            $file = $request->file('cover')->store('cover', 'public');
            if ($book->cover && file_exists(storage_path('app/public/' . $book->cover))) {
                Storage::delete(('public/' . $book->cover));
                $file = $request->file('cover')->store('gambar', 'public');
            }
        }

        if ($request->file('cover') === null) {
            $file = $book->cover;
        }

        $book->update([
            "book_code" => $request->input('book_code'),
            "tittle" => $request->input('tittle'),
            "publisher" => $request->input('publisher'),
            "publisher_year	" => $request->input('publisher_year	'),
            "cover" => $file,
        ]);

        return redirect()->route('index-book');
    }

    public function delete($id)
    {
        $book = Book::where('id', $id)->first();
        if ($book->cover && file_exists(storage_path('app/public/' . $book->cover))) {
            Storage::delete('public/' . $book->cover);
        }

        $book->delete();

        return redirect()->route('index-book');
    }
}

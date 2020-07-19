<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;
use App\Book;

class LibrariesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $library = Library::paginate(10);

        $filterKeyword = $request->get('n');
        if ($filterKeyword) {
            $library = Library::where(
                "libraryName",
                "LIKE",
                "%$filterKeyword%"
            )->paginate(10);
        }

        return view('libraries.index', ['library' => $library]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book  = Book::all();

        return view('libraries.create', ['book' => $book]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $libraryName = $request->get('libraryName');

        $library = new Library;
        $library->libraryName = $libraryName;

        if ($request->get('books_id') == NULL) {
            $library->books_id = '';
        } else {
            $library->books_id = implode(',', $request->get('books_id'));
        }

        $library->save();

        return redirect()->route('libraries.index')->withSuccess('Library successfully created');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $library_to_edit = Library::findOrFail($id);

        $book  = Book::all();

        return view('libraries.edit', ['library' => $library_to_edit, 'book' => $book]);
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
        $libraryName = $request->get('libraryName');

        $library = Library::findOrFail($id);
        $library->libraryName = $libraryName;

        if ($request->get('books_id') == NULL) {
            $library->books_id = '';
        } else {
            $library->books_id = implode(',', $request->get('books_id'));
        }

        $library->save();

        return redirect()->route('libraries.edit', [$id])->withSuccess('Library successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $library = Library::findOrFail($id);

        $library->delete();

        return redirect()->route('libraries.index', [$id])->withSuccess('Library successfully deleted');
    }
}

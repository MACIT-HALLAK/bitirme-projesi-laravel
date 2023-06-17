<?php

namespace App\Http\Controllers;

use App\Models\AddBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AddBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AddBook::select('id','title','author','pageCount','coverImage','language','category','level','desc','content')->get();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'coverImage' => 'required',
            'title' => 'required',
            'author' => 'required',
            'pageCount' => 'required',
            'language' => 'required',
            'category' => 'required',
            'level' => 'required',
            'desc' => 'required',
            'content' => 'required',
        ]);

        // Handle the cover image upload
        if($request->hasFile('coverImage')) {
            // $image = $request->file('coverImage');
            // $name = time() . '.' . $image->getClientOriginalExtension();
            // $destinationPath = public_path('/images');
            // $image->move($destinationPath, $name);

            $imageName = Str::random() . '.' . $request->coverImage->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('product/image', $request->coverImage, $imageName);

            // Create a new book with the validated data and the uploaded image path
            $book = new AddBook;
            $book->coverImage = "/image/{$imageName}";
            $book->title = $validated['title'];
            $book->author = $validated['author'];
            $book->pageCount = $validated['pageCount'];
            $book->language = $validated['language'];
            $book->category = $validated['category'];
            $book->level = $validated['level'];
            $book->desc = $validated['desc'];
            $book->content = $validated['content'];
            $book->save();

            return response()->json(['message' => 'Book added successfully', 'book' => $book], 200);
        } else {
            // $image = $request->file("coverImage");
            // $name = time() . '.' . $image->getClientOriginalExtension();
            // $destinationPath = public_path('/images');
            return response()->json(['error' => 'No cover image uploaded','image'=> $image], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddBook  $addBook
     * @return \Illuminate\Http\Response
     */
    public function show(AddBook $addBook)
    {
        return response()->json([
            'books' => $addBook
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddBook  $addBook
     * @return \Illuminate\Http\Response
     */
    public function edit(AddBook $addBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddBook  $addBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddBook $addBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddBook  $addBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddBook $addBook)
    {
        //
    }
}

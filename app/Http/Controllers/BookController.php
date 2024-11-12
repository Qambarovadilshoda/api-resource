<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->paginate(10);
        return response()->json(
        [
            'posts' => BookResource::collection($books),
            'links' => [
                'first' => $books->url(1),
                'last' => $books->url($books->lastPage()),
                'prev' => $books->previousPageUrl(),
                'next' => $books->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $books->currentPage(),
                'from' => $books->firstItem(),
                'last_page' => $books->lastPage(),
                'path' => $books->path(),
                'per_page' => $books->perPage(),
                'to' => $books->lastItem(),
                'total' => $books->total(),

            ],
        ]);
    }
}

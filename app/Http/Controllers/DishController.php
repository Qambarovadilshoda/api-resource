<?php

namespace App\Http\Controllers;

use App\Http\Resources\DishResource;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index(){
        $dishes = Dish::with("category")->paginate(5);
        return response()->json(
        [
            'posts' => DishResource::collection($dishes),
            'links' => [
                'first' => $dishes->url(1),
                'last' => $dishes->url($dishes->lastPage()),
                'prev' => $dishes->previousPageUrl(),
                'next' => $dishes->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $dishes->currentPage(),
                'from' => $dishes->firstItem(),
                'last_page' => $dishes->lastPage(),
                'path' => $dishes->path(),
                'per_page' => $dishes->perPage(),
                'to' => $dishes->lastItem(),
                'total' => $dishes->total(),

            ],
        ]);
    }
}

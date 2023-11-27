<?php

namespace App\Http\Controllers;

use App\Services\PlaceService;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public $placeService;

    public function __construct(PlaceService $placeService)
    {
        $this->placeService = $placeService;
    }

    public function getPlaces(Request $request)
    {
        $places = $this->placeService->getData($request->all());
        
        return response()->json([
            'data' => $places
        ]);
    }
}

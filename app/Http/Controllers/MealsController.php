<?php

namespace App\Http\Controllers;

use App\Models\Meals\Meal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MealsController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $meals = $request->user()->meals;

        return response()->json(['data' => $meals], JsonResponse::HTTP_OK);
    }

    public function store(Request $request): JsonResponse
    {
        $meal = $request->user()->meals()->create($request->get('meal'));
        $meal->ingredients()->sync($request->get('ingredients'));

        return response()->json(['data' => $meal], JsonResponse::HTTP_CREATED);
    }

    public function show(Meal $meal): JsonResponse
    {
        return response()->json(['data' => $meal], JsonResponse::HTTP_OK);
    }

    public function update(Meal $meal, Request $request): JsonResponse
    {
        $meal->ingredients()->sync($request->get('ingredients'));

        return response()->json([], JsonResponse::HTTP_NO_CONTENT);
    }

    public function destroy(Meal $meal): Response
    {
        $meal->delete();

        return response()->noContent();
    }
}

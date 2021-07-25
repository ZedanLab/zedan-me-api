<?php

namespace App\Http\Controllers;

use App\Actions\Testimonial\Store;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use ArinaSystems\JsonResponse\Facades\JsonResponse;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $testimonials = Testimonial::published()->get();

        return JsonResponse::json('ok', [
            'data' => TestimonialResource::collection($testimonials),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $testimonial = Store::run($request->all());

        return JsonResponse::json('ok', [
            'message' => "I'm delighted of your testimonial 😍, it'll be published as soon as possible. Thank you!",
            'data'    => $testimonial,
        ]);
    }
}

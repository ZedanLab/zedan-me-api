<?php

namespace App\Http\Controllers;

use App\Actions\ContactMessage\Store;
use ArinaSystems\JsonResponse\Facades\JsonResponse;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = Store::run($request->all());

        return JsonResponse::json('ok', [
            'message' => "Thank you for getting in touch, I'll respond ASAP.",
            'data'    => $message,
        ]);
    }
}

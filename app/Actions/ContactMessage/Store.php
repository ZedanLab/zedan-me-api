<?php

namespace App\Actions\ContactMessage;

use App\Mail\ContactMessageSent;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;

class Store
{
    use AsAction, WithAttributes;

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|string|min:3',
            'email'    => 'required|string|email',
            'position' => 'nullable|string|min:3',
            'subject'  => 'required|string|min:3',
            'body'     => 'required|string|min:10',
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle(array $attributes): ContactMessage
    {
        $this->fill($attributes);

        $message = ContactMessage::create($this->validateAttributes());

        Mail::to($message->email)->send(new ContactMessageSent($message->toArray()));

        return $message;
    }
}

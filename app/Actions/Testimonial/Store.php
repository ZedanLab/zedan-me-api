<?php

namespace App\Actions\Testimonial;

use App\Mail\TestimonialSubmitted;
use App\Models\Testimonial;
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
            'avatar'   => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',
            'name'     => 'required|string|min:3',
            'email'    => 'required|string|email',
            'position' => 'required|string|min:3',
            'body'     => 'required|string|min:20',
            'stars'    => 'required|integer|max:5',
        ];
    }

    /**
     * Define validation attributes.
     *
     * @return array
     */
    public function getValidationAttributes()
    {
        return [
            'body' => 'testimonial',
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle(array $attributes): Testimonial
    {
        $this->fill($attributes);

        $testimonial = Testimonial::create($this->validateAttributes());

        Mail::to($testimonial->email)->send(new TestimonialSubmitted($testimonial->toArray()));

        return $testimonial;
    }
}

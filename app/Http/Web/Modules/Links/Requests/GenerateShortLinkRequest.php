<?php

namespace App\Http\Web\Modules\Links\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateShortLinkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'origin_url' => ['required', 'string', 'url']
        ];
    }

    public function getOriginUrl(): string
    {
        return $this->validated('origin_url');
    }
}
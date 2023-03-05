<?php

namespace App\Http\Api\Support\Requests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Redirector;

abstract class BaseFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public static function createFromArray(array $requestData, bool $validate = false, ?Application $app = null): static
    {
        $app = $app ?? app();
        $request = new static($requestData);

        $request->setContainer($app)
            ->setRedirector($app->make(Redirector::class));

        if ($validate) {
            $request->validateResolved();
        }

        return $request;
    }
}

<?php

namespace App\Http\Web\Modules\Links\Controllers;

use App\Domain\Links\Actions\GenerateShortLinkAction;
use App\Domain\Links\Models\Link;
use App\Http\Web\Modules\Links\Requests\GenerateShortLinkRequest;
use Illuminate\Support\Facades\Redirect;

class LinksController
{
    public function show()
    {
        return view('links');
    }

    public function generate(GenerateShortLinkRequest $request, GenerateShortLinkAction $action)
    {
        $shortLink = $action->execute($request->getOriginUrl());

        return view('links', ['shortLink' => $shortLink]);
    }

    public function redirect(string $hash)
    {
        /** @var Link $link */
        $link = Link::query()->where('short_url', $hash)->firstOrFail();

        return Redirect::to($link->origin_url);
    }
}
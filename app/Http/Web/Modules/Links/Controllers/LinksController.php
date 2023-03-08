<?php

namespace App\Http\Web\Modules\Links\Controllers;

use App\Domain\Links\Actions\GenerateShortLinkAction;
use App\Domain\Links\Models\Link;
use App\Http\Web\Modules\Links\Requests\GenerateShortLinkRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LinksController
{
    public function show(): View
    {
        return view('links');
    }

    public function generate(GenerateShortLinkRequest $request, GenerateShortLinkAction $action): View
    {
        $shortLink = $action->execute($request->getOriginUrl());

        return view('links', ['shortLink' => $shortLink]);
    }

    public function redirect(string $hash): RedirectResponse
    {
        /** @var Link $link */
        $link = Link::query()->where('short_url', $hash)->firstOrFail();

        return Redirect::to($link->origin_url);
    }
}
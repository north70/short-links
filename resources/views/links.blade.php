@extends('layouts.main')

@section('content')
    <div class="text-center font-mono p-10">
        <a href="{{ route('links.show') }}">
            <h1 class="text-white text-2xl">Link reduction</h1>
        </a>


        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div>
            <div class="md:grid md:grid-cols-4 md:gap-6">
                @if( isset($shortLink))
                    <div class="md:col-span-2 md:col-start-2" role="alert">
                        <div class="bg-blue-700 text-white font-bold rounded-t px-4 py-2">
                            Your short link
                        </div>
                        <div class="border border-t-0 rounded-b bg-white px-4 py-3 text-blue-700">
                            <a href=" {{ route('links.redirect', ['hash' => $shortLink]) }}" target="_blank">
                            {{ route('links.redirect', ['hash' => $shortLink]) }}
                            </a>
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="md:col-span-2 md:col-start-2" role="alert">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                Error
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                <p>{{ $error }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="mt-5 md:col-span-2 md:col-start-2 md:mt-0">
                    <form action="{{ route('links.generate') }}" method="POST">
                        @csrf
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="origin_url" class="block text-sm font-medium leading-6 text-gray-900">Origin url</label>
                                        <div class="mt-2 flex rounded-md shadow-sm">
                                            <input type="text" name="origin_url" id="origin_url" class="text-center block w-full flex-1 rounded-none rounded-r-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="www.example.com">
                                        </div>
                                    </div>

                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-center sm:px-6">
                                <button type="submit" class="inline-flex justify-center rounded-md bg-blue-800 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-500">
                                    Generate
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>
    </div>

@endsection
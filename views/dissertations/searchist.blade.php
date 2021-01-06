@extends('layouts.app')

@section('content')
<div class="container">
    <h3>
        Search History
    </h3>
    @if($history->isEmpty())
        <h2 class="my-4">No data!</h2>
    @else
        @foreach($history as $key => $keyword)
            <div style='border: 2px solid black;' class="mb-2 p-3">
                <div class="context">
                    <a>
                        <b>{{ $keyword->keyword }}</b>
                    </a>
                </div>
            </div>
        @endforeach

        <div class="mt-4 d-flex justify-content-center">
            {{ $history->links() }}
        </div>
    @endif
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    <h3>
        Saved Dissertations
    </h3>
    @if($dissertations->isEmpty())
        <h2 class="my-4">No data!</h2>
    @else
        @foreach($dissertations as $dissertation)
            <div style='border: 2px solid black;' class="mb-2 p-3">
                <div class="context">
                    <a href="{{ url('/dissertations/'.$dissertation->id) }}">
                        <b>{!! $dissertation->title !!}</b>
                    </a>
                </div>
                <div>
                    <i>{!! $dissertation->contributor_author !!}</i>
                </div>
                <div>
                    <i>{!! $dissertation->degree_grantor !!}</i>
                </div>
                <div>
                    <i>{!! $dissertation->publisher !!}</i>
                </div>
                <div>
                    <i><a href="{{ url('/dissertations/'.$dissertation->id.'/remove') }}">Remove</a></i>
            </div>
        @endforeach

        <div class="mt-4 d-flex justify-content-center">
            {{ $dissertations->links() }}
        </div>
    @endif
</div>
@endsection

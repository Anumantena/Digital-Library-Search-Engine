@extends('layouts.app')

@section('content')
<div class="container">
    <h3>
        Search Result
    </h3>

    <form action="" method="GET" role="search" class="mb-2">
        <div>
            <input id="keyword-input" type ="text" class="form-control" name="keyword" placeholder = "Search a book" value="{{ request()->get('keyword') }}">
        </div>

        <div class="mt-3">
            <button class ="btn btn-primary" type="submit"> Search</button>
        </div>
    </form>

    @if(isset($words))
        <div class="my-3">
            @foreach($words as $word)
                <div class="badge badge-pill">{{ $word }}</div>
            @endforeach
        </div>
    @endif

    @if($dissertations->isEmpty())
        <h2 class="my-4">No data!</h2>
    @else
        @foreach($dissertations as $dissertation)
            <div style='border: 2px solid black;' class="mb-2 p-3">
                <div class="context">
                    {{ $dissertation->number }}
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

                @auth
                    <div class="mt-2">
                        @if($dissertation->can_save)
                            <a class="btn btn-primary" href="{{ url('dissertations/'.$dissertation->id.'/save') }}">
                                Save
                            </a>
                        @else
                            <button disabled="disabled" class="btn btn-success">
                                Saved
                            </button>
                        @endif
                    </div>
                @endauth
            </div>
        @endforeach

        <div>
            Total: {{ $dissertations->total()  }}
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $dissertations->links() }}
        </div>
    @endif
</div>

@endsection

@push("styles")
    <style>
        mark{
            background: orange;
            color: black;
        }
    </style>
    <link href="{{ asset('css/auto-complete.css') }}" rel="stylesheet" />
@endpush

@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/mark.min.js" integrity="sha512-5CYOlHXGh6QpOFA/TeTylKLWfB3ftPsde7AnmhuitiTX4K5SqCLBeKro6sPS8ilsz1Q4NRx3v8Ko2IBiszzdww==" crossorigin="anonymous"></script>
    <script src="{{ asset('js/auto-complete.min.js') }}"></script>
    <script>
        var instance = new Mark('div.context');
        instance.mark('{{ $keyword }}', {})

        $(document).ready(function() {
            new autoComplete({
                selector: '#keyword-input',
                minChars: -1,
                source: async function(term, suggest){
                    term = term.toLowerCase();

                    let choices = await $.ajax({
                        method: 'GET',
                        url: '{{ url('api/auto-completes') }}?keyword=' + term
                    });
                    suggest(choices);
                }
            });
        })
    </script>
@endpush

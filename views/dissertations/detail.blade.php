@extends("layouts.app")

@section('content')
    <div class="container">
        <h2>{{ $dissertation ->title }}</h2>

        <div class="mt-3">
            <div>
                <b>Author</b>
            </div>
            <div>
                {{ $dissertation->contributor_author }}
            </div>
        </div>

        @if(isset($dissertation->contributor_committeechair))
            <div class="mt-3">
                <div>
                    <b>Author Committee Chair</b>
                </div>
                <ul>
                    @foreach($dissertation ->contributor_committeechair as $name)
                        <li>{{ $name }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        @if(isset($dissertation ->contributor_committeemember))
            <div class="mt-3">
                <div>
                    <b>Author Committee Member</b>
                </div>
                <ul>
                    @foreach($dissertation ->contributor_committeemember as $name)
                        <li>{{ $name }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="mt-3">
            <div>
                <b>Description Abstract</b>
            </div>
            <div align="justify">
                {!! $dissertation ->description_abstract !!}
            </div>
        </div>
        <div class="mt-3">
            <div>
                <b>Date</b>
            </div>
            <div>
                {{ $dissertation ->date_issued }}
            </div>
        </div>
    </div>
@endsection

@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <h1>{{ config('tracks.title') }}</h1>
            <h5>Page {{ $tracks->currentPage() }} of {{ $tracks->lastPage() }}</h5>
            @foreach ( $tracks as $track )
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="/track/{{ $track->slug }}">{{ $track->title }}</a>
                    </div>

                    <div class="panel-body">
                        <img src="{{ $track->image }}" alt="{{ $track->title }}">
                        <em>({{ $track->published_at->format('M jS Y g:ia') }})</em>
                    </div>
                </div><!-- panel -->
            @endforeach
            <h5>Page {{ $tracks->currentPage() }} of {{ $tracks->lastPage() }}</h5>
        </div><!-- col-md-10 -->

    </div><!--row-->
@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
//        console.log(test);
    </script>
@stop
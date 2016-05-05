@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <h1>{{ $track->title }} {{ $track->id }}</h1>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="/tracks/{{ $track->slug }}">{{ $track->title }}</a>
                    </div>

                    <div class="panel-body">
                        <img src="{{ $track->image }}" alt="{{ $track->title }}">
                        <em>({{ $track->published_at->format('M jS Y g:ia') }})</em>
                        <p>{{ $track->description }}</p>
                        <p>{{ $track->zip }}</p>
                        <p>{{ $track->user_id }}</p>
                        <p>{{ $track->file }}</p>
                        <p>{{ $track->type }}</p>
                    </div>
                </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        //        console.log(test);
    </script>
@stop
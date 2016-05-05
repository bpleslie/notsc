<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Track;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TracksController extends FrontendController
{
    public function index()
    {
        $tracks = Track::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('tracks.tracks_per_page'));

        return view('frontend.tracks.index', compact('tracks'));
    }

    public function showTrack( $slug )
    {
        $track = Track::whereSlug( $slug )->firstOrFail();

        return view('frontend.tracks.track')->withTrack( $track );
    }

    public function add( ) {
        return view('frontend.tracks.add');
    }
}

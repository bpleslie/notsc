<?php

namespace App\Http\Controllers\Frontend\User;

use Illuminate\Http\Request;
use App\Track;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class UserTracksController extends Controller
{
    public function my()
    {
        $tracks = Track::where('user_id', '=', access()->user()->id )
            ->orderBy('published_at', 'desc')
            ->paginate(config('tracks.tracks_per_page'));

        return view('frontend.user.tracks.my', compact('tracks'));
    }

    public function show( $slug )
    {
        $track = Track::whereSlug( $slug )->firstOrFail();

        return view('frontend.user.tracks.track')->withTrack( $track );
    }

    public function add( ) {
        return view('frontend.user.tracks.add');
    }

    public function create()
    {

        $rules = array(
            'title'         => 'required',
            'description'   => 'required',
            'zip'           => 'required',
            'type'          => 'required',
            'image'         => 'required',
            'file'          => 'required'
        );

        $validator = Validator::make( Input::all(), $rules );

        if ( $validator->fails() )
        {
            return Redirect::to('tracks/add')
                        ->withErrors( $validator )
                        ->withInput();
        }
        else {
                $track = new Track;
                $track->title           = Input::get('title');
                $track->description     = Input::get('description');
                $track->published_at    = Carbon::now();
                $track->zip             = Input::get('zip');
                $track->user_id         = access()->user()->id;
                $track->type            = Input::get('type');
                $slug                   = Str::slug($track->title);
                $track->slug            = $slug;

                if ( Input::hasFile('image') && Input::file('image')->isValid() )
                {
                    $track->image           = Input::file('image')->getRealPath();
                }

                if ( Input::hasFile('file') && Input::file('file')->isValid() )
                {
                    $track->file           = Input::file('file')->getRealPath();
                }

                $track->save();
        }

        return Redirect::to('tracks/add');
    }
}

@extends('frontend.layouts.master')

@section('content')
    <?php
    $ip = $_SERVER['REMOTE_ADDR'];
    $details = json_decode( file_get_contents("http://ipinfo.io/$ip") );
    $postcode = (isset( $details->postcode ) ? $details->postcode : '' );
    ?>
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">Add Track</div>

                <div class="panel-body">
                    {!! Form::open( array('route' => 'tracks.create', 'files' => true, 'class' => 'form-horizontal', 'method' => 'create' ) ) !!}
                        <div class="form-group">
                            <?php echo Form::label('title', 'Title'); ?>
                            <?php echo Form::text('title'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('description', 'Description'); ?>
                            <?php echo Form::textarea('description'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('type', 'Type'); ?>
                            <?php echo Form::select('type', array( 0 => 'Original', 1 => 'Remix') ); ?>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('image', 'Image'); ?>
                            <?php echo Form::file('image'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('file', 'Track'); ?>
                            <?php echo Form::file('file'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('zip', 'Zip'); ?>
                            <?php echo Form::text('zip', $postcode ); ?>
                        </div>
                        <div class="form-group">
                            <?php echo Form::submit('Add Track'); ?>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection
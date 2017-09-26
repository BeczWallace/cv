@extends('app')

@section('content')

    <div class="widget">
        <h4 class="widgettitle">&nbsp;</h4>
        <div class="widgetcontent">
            {!!Form::open(['url' => 'social/'.$socials->id, 'class' => 'stdform', 'method' => 'put'])!!}
                <p>
                    {!!Form::label('facebook', 'Facebook:')!!}
                    <span class="field">
                        {!!Form::text('facebook', $socials->facebook, ['class' => 'input-block-level'])!!}
                    </span>
                    <small class="desc">Leave empty to hide</small>
                </p>
                <p>
                    {!!Form::label('dribble', 'Dribble:')!!}
                    <span class="field">
                        {!!Form::text('dribble', $socials->dribble, ['class' => 'input-block-level'])!!}
                    </span>
                    <small class="desc">Leave empty to hide</small>
                </p>
                <p>
                    {!!Form::label('flickr', 'Flickr:')!!}
                    <span class="field">
                        {!!Form::text('flickr', $socials->flickr, ['class' => 'input-block-level'])!!}
                    </span>
                    <small class="desc">Leave empty to hide</small>
                </p>
                <p>
                    {!!Form::label('linkedin', 'Linkedin:')!!}
                    <span class="field">
                        {!!Form::text('linkedin', $socials->linkedin, ['class' => 'input-block-level'])!!}
                    </span>
                    <small class="desc">Leave empty to hide</small>
                </p>
                <p>
                    {!!Form::label('pinterest', 'Pinterest:')!!}
                    <span class="field">
                        {!!Form::text('pinterest', $socials->pinterest, ['class' => 'input-block-level'])!!}
                    </span>
                    <small class="desc">Leave empty to hide</small>
                </p>
                <p>
                    {!!Form::label('dropbox', 'Dropbox:')!!}
                    <span class="field">
                        {!!Form::text('dropbox', $socials->dropbox, ['class' => 'input-block-level'])!!}
                    </span>
                    <small class="desc">Leave empty to hide</small>
                </p>
                <p>
                    {!!Form::label('instagram', 'Instagram:')!!}
                    <span class="field">
                        {!!Form::text('instagram', $socials->instagram, ['class' => 'input-block-level'])!!}
                    </span>
                    <small class="desc">Leave empty to hide</small>
                </p>
                <p>
                    {!!Form::label('twitter', 'Twitter:')!!}
                    <span class="field">
                        {!!Form::text('twitter', $socials->twitter, ['class' => 'input-block-level'])!!}
                    </span>
                    <small class="desc">Leave empty to hide</small>
                </p>
                <p>
                    {!!Form::label('google_plus', 'Google+:')!!}
                    <span class="field">
                        {!!Form::text('google_plus', $socials->google_plus, ['class' => 'input-block-level'])!!}
                    </span>
                    <small class="desc">Leave empty to hide</small>
                </p>
                <p class="stdformbutton">
                    {!!Form::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
                </p>
            {!!Form::close()!!}
        </div>
    </div>

@endsection
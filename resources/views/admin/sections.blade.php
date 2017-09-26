@extends('app')

@section('content')

{!!Form::open(['url' => 'section/update_all', 'class' => 'stdform'])!!}
    @foreach ($user->sections as $section)
        {!!Form::hidden('section[' . $section->id . '][id]', $section->id)!!}
        <div class="widget">
            <h4 class="widgettitle">{{$section->section_id}}</h4>
            <div class="widgetcontent">
                <p>
                    {!!Form::label('section[' . $section->id . '][header]', 'Header:')!!}
                    <span class="field">
                        {!!Form::text('section[' . $section->id . '][header]', $section->header, ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('section[' . $section->id . '][sub]', 'Sub:')!!}
                    <span class="field">
                        {!!Form::text('section[' . $section->id . '][sub]', $section->sub, ['class' => 'input-block-level'])!!}
                    </span>
                    @if ($section->section_id == 'head')
                        <small class="desc">Separated by "|"</small>
                    @endif
                </p>
                @if ($section->section_id == 'welcome')
                    <p>
                        {!!Form::label('section[' . $section->id . '][glance]', 'At a glance:')!!}
                        <span class="field">
                            {!!Form::text('section[' . $section->id . '][glance]', $section->glance, ['class' => 'input-block-level'])!!}
                        </span>
                    </p>
                @endif
            </div>
        </div>
    @endforeach
    <p>
        {!!Form::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
    </p>
{!!Form::close()!!}

@endsection
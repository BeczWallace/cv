@extends('app')

@section('content')

    <div class="tabbedwidget tab-primary">
        <ul>
            @foreach ($user->offers as $offer)
                <li><a href="#{{$offer->id}}">{{$offer->title}}</a></li>
            @endforeach
        </ul>
        @foreach ($user->offers as $offer)
            <div id="{{$offer->id}}">
                {!!Form::open(['url' => 'offer/'.$offer->id, 'class' => 'stdform', 'method' => 'put'])!!}
                    <p>
                        {!!Form::label('title', 'Title:')!!}
                        <span class="field">
                            {!!Form::text('title', $offer->title, ['class' => 'input-block-level'])!!}
                        </span>
                    </p>
                    <p>
                        {!!Form::label('icon', 'Icon:')!!}
                        <select class="s2-icons form-control" name="icon">
                            <option value="{{$offer->icon}}" selected>iconfa-{{$offer->icon}} (Current)</option>
                            @foreach ($icons as $icon)
                            <option value="{{substr($icon->name, 7)}}">{{$icon->name}}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        {!!Form::label('description', 'Description:')!!}
                        <span class="field">
                            {!!Form::textarea('description', $offer->description, ['class' => 'input-block-level', 'style' => 'resize: vertical'])!!}
                        </span>
                    </p>
                    <p>
                        {!!Form::label('full_description', 'Full Description:')!!}
                        <span class="field">
                            {!!Form::textarea('full_description', $offer->full_description, ['class' => 'input-block-level', 'style' => 'resize: vertical'])!!}
                        </span>
                    </p>
                    <p class="stdformbutton">
                        {!!Form::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
                    </p>
                {!!Form::close()!!}
            </div>
        @endforeach
    </div><!--tabbedwidget-->

@endsection

@section('scripts')

    <script type="text/javascript">
        $('textarea').autogrow();
    </script>

    

    <script type="text/javascript">

        function formatIcon(icon) {
            if (!icon.id) {
                return icon.text;
            }
            var $icon = $(
                '<span>' +
                    '<span class="' +
                    icon.text +
                    '"></span> ' +
                    icon.text +
                '</span>'
            );
            return $icon;
        };

        $('.s2-icons').select2({
            templateResult: formatIcon,
            templateSelection: formatIcon
        });
    </script>

@endsection
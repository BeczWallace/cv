@extends('app')

@section('content')
    
    <div class="widgetbox">
        <div class="headtitle">
            @if ($work)
                <div class="btn-group">
                    {!!Form::open(['url' => 'work/' . $work->id, 'method' => 'delete', 'id' => 'delete'])!!}
                        {!!Form::button('Delete', ['class' => 'btn dropdown-toggle', 'id' => 'delete-button'])!!}
                    {!!Form::close()!!}
                </div>
            @endif
            <h4 class="widgettitle">{{$work->title or 'New'}}</h4>
        </div>
        <div class="widgetcontent">
            {!!Form::open(['url' => 'work' . ($work ? '/' . $work->id : ''), 'class' => 'stdform', 'method' => ($work ? 'put' : 'post')])!!}
                <p>
                    {!!Form::label('title', 'Title:')!!}
                    <span class="field">
                        {!!Form::text('title', ($work ? $work->title : ''), ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('company', 'Company:')!!}
                    <span class="field">
                        {!!Form::text('company', ($work ? $work->company : ''), ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('description', 'Description:')!!}
                    <span class="field">
                        {!!Form::textarea('description', ($work ? $work->description : ''), ['class' => 'input-block-level', 'style' => 'resize: vertical'])!!}
                    </span>
                </p>
                <div class="par">
                    {!!Form::label('date_start', 'Date start:')!!}
                    <span class="field">
                        {!!Form::text('date_start', ($work && $work->date_start ? $work->date_start->format('Y-m-d') : ''), ['class' => 'input-block-level'])!!}
                    </span>
                </div>
                <div class="par">
                    {!!Form::label('date_end', 'Date end:')!!}
                    <span class="field">
                        {!!Form::text('date_end', ($work && $work->date_end ? $work->date_end->format('Y-m-d') : ''), ['class' => 'input-block-level'])!!}
                    </span>
                    <small class="desc">Leve empty if current</small>
                </div>
                <p class="stdformbutton">
                    {!!Form::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
                </p>
            {!!Form::close()!!}
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $('textarea').autogrow();
        $("#date_start").datepicker({dateFormat: 'yy-mm-dd'});
        $("#date_end").datepicker({dateFormat: 'yy-mm-dd'});

        // delete entry
        $('#delete-button').click(function(e){

            $.alerts.dialogClass = 'alert-danger';
            jConfirm('Continue delete?', null, function(conf){

                $.alerts.dialogClass = null; // reset to default
                if(conf) {
                    $('#delete').submit();
                }
            });
            return false;
        }); 
    </script>

@endsection
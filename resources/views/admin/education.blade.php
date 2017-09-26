@extends('app')

@section('content')
    
    <div class="widgetbox">
        <div class="headtitle">
            @if ($education)
                <div class="btn-group">
                    {!!Form::open(['url' => 'education/' . $education->id, 'method' => 'delete', 'id' => 'delete'])!!}
                        {!!Form::button('Delete', ['class' => 'btn dropdown-toggle', 'id' => 'delete-button'])!!}
                    {!!Form::close()!!}
                </div>
            @endif
            <h4 class="widgettitle">{{$education->title or 'New'}}</h4>
        </div>
        <div class="widgetcontent">
            {!!Form::open(['url' => 'education' . ($education ? '/' . $education->id : ''), 'class' => 'stdform', 'method' => ($education ? 'put' : 'post')])!!}
                <p>
                    {!!Form::label('title', 'Title:')!!}
                    <span class="field">
                        {!!Form::text('title', ($education ? $education->title : ''), ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('school', 'School:')!!}
                    <span class="field">
                        {!!Form::text('school', ($education ? $education->school : ''), ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('type', 'Type:')!!}
                    <span class="field">
                        {!!Form::text('type', ($education ? $education->type : ''), ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('description', 'Description:')!!}
                    <span class="field">
                        {!!Form::textarea('description', ($education ? $education->description : ''), ['class' => 'input-block-level', 'style' => 'resize: vertical'])!!}
                    </span>
                </p>
                <div class="par">
                    {!!Form::label('graduation', 'Graduation:')!!}
                    <span class="field">
                        {!!Form::text('graduation', ($education ? $education->graduation->format('Y-m-d') : ''), ['class' => 'input-block-level'])!!}
                    </span>
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
        $("#graduation").datepicker({dateFormat: 'yy-mm-dd'});

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
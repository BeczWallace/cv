@extends('app')

@section('content')
    <div class="headtitle">
        <div class="btn-group">
            {!!Form::button('New Award', ['class' => 'btn dropdown-toggle', 'id' => 'new', 'data-toggle' => 'modal', 'data-target' => '#newModal'])!!}
        </div>
        <h4 class="widgettitle">Awards</h4>
    </div>
    <table class="table table-bordered responsive">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Icon</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->awards as $award)
                <tr data-id="{{$award->id}}" data-title="{{$award->title}}" data-description="{{$award->description}}" data-date="{{$award->date ? $award->date->format('Y-m-d') : ''}}" data-icon="{{$award->icon}}">
                    <td>{{$award->title}}</td>
                    <td>{{$award->description}}</td>
                    <td>{{$award->date ? $award->date->format('Y-m-d') : 'NA'}}</td>
                    <td><span class="iconfa-{{$award->icon}}"></span> {{$award->icon}}</td>
                    <td class="centeralign">
                        <a href="" class="editrow"><span class="icon-edit"></span></a>
                        <a href="" class="deleterow confirmbutton"><span class="icon-trash"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div aria-hidden="false" aria-labelledby="editModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="editModal">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
            <h3 id="editModalLabel">Edit award</h3>
        </div>
        {!!Form::open(['class' => 'stdform', 'id' => 'editAwards', 'method' => 'put'])!!}
            <div class="modal-body">
                <p>
                    {!!Form::label('title', 'Title:')!!}
                    <span class="field">
                        {!!Form::text('title', '', ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('description', 'Description:')!!}
                    <span class="field">
                        {!!Form::textarea('description', '', ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('date', 'Date:')!!}
                    <span class="field">
                        {!!Form::text('date', '', ['class' => 'input-block-level datepicker'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('icon', 'Icon:')!!}
                    <select class="s2-icons form-control" id="editIcons" name="icon">
                        @foreach ($icons as $icon)
                        <option value="{{substr($icon->name, 7)}}">{{$icon->name}}</option>
                        @endforeach
                    </select>
                </p>
            </div>
            <div class="modal-footer">
                {!!Form::button('Close', ['data-dismiss' => 'modal', 'class' => 'btn'])!!}
                {!!Form::button('Save changes', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
            </div>
        {!!Form::close()!!}
    </div><!--#editModal-->
    <div aria-hidden="false" aria-labelledby="newModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="newModal">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
            <h3 id="newModalLabel">New award</h3>
        </div>
        {!!Form::open(['url' => 'award', 'class' => 'stdform'])!!}
            <div class="modal-body">
                <p>
                    {!!Form::label('title', 'Title:')!!}
                    <span class="field">
                        {!!Form::text('title', '', ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('description', 'Description:')!!}
                    <span class="field">
                        {!!Form::textarea('description', '', ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('date-new', 'Date:')!!}
                    <span class="field">
                        {!!Form::text('date-new', '', ['class' => 'input-block-level datepicker'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('icon', 'Icon:')!!}
                    <select class="s2-icons form-control" name="icon">
                        @foreach ($icons as $icon)
                        <option value="{{substr($icon->name, 7)}}">{{$icon->name}}</option>
                        @endforeach
                    </select>
                </p>
            </div>
            <div class="modal-footer">
                {!!Form::button('Close', ['data-dismiss' => 'modal', 'class' => 'btn'])!!}
                {!!Form::button('Save changes', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
            </div>
        {!!Form::close()!!}
    </div><!--#newModal-->
@endsection

@section('scripts')
    <script type="text/javascript">

    $(".datepicker").datepicker({dateFormat: 'yy-mm-dd'});


        $(document).ready(function() {
            // delete row in a table
            if(jQuery('.deleterow').length > 0) {
                jQuery('.deleterow').click(function(){
                    jQuery.alerts.dialogClass = 'alert-danger';
                    var row = jQuery(this).parents('tr');
                    jConfirm('Continue delete?', null, function(conf){

                        jQuery.alerts.dialogClass = null; // reset to default
                        if(conf) {
                            row.fadeOut(function(){
                                jQuery(this).remove();
                                var id = $(this).data('id');
                                $.ajax({
                                    type: 'DELETE',
                                    url: '/award/'+id,
                                    data: {_token: '{{csrf_token()}}'},
                                    dataType: 'json'
                                }).done(function(data) {
                                    if (data.success) {
                                        $('.maincontentinner').prepend('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> ' + data.success);
                                    } else {
                                        $('.maincontentinner').prepend('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Error!</strong> ' + data.error);
                                    }
                                }).error(function(data) {
                                    alert(JSON.stringify(data));
                                });
                            });
                        }
                    });
                    return false;
                }); 
            }

            // edit row
            if ($('.editrow').length > 0) {
                $('.editrow').click(function() {
                    var row = $(this).parents('tr');
                    
                    $('#editAwards').attr('action', 'award/' + $(row).data('id'));
                    $('#title').val($(row).data('title'));
                    $('#description').val($(row).data('description'));
                    $('#date').val($(row).data('date'));
                    $('#editIcons').prepend('<option value="' + $(row).data('icon') + '">iconfa-' + $(row).data('icon') + '</option>');
                    $('.s2-icons').val($(row).data('icon')).trigger('change');
                    
                    $('#editModal').modal('show');
                    return false;
                });
            };

        });
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
@extends('app')

@section('content')
    <div class="headtitle">
        <div class="btn-group">
            {!!Form::button('New Skill', ['class' => 'btn dropdown-toggle', 'id' => 'new', 'data-toggle' => 'modal', 'data-target' => '#newModal'])!!}
        </div>
        <h4 class="widgettitle">Skills</h4>
    </div>
    <table class="table table-bordered responsive">
        <thead>
            <tr>
                <th>Skill</th>
                <th>Percentage</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->skills as $skill)
                <tr data-id="{{$skill->id}}" data-name="{{$skill->name}}" data-percentage="{{$skill->percentage}}">
                    <td>{{$skill->name}}</td>
                    <td>
                        <div class="progress progress-striped active nomargin">
                            <div style="width: {{$skill->percentage}}%" class="bar">{{$skill->percentage}}%</div>
                        </div><!--progress-->
                    </td>
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
            <h3 id="editModalLabel">Edit skill</h3>
        </div>
        {!!Form::open(['class' => 'stdform', 'id' => 'editSkills', 'method' => 'put'])!!}
            <div class="modal-body">
                <p>
                    {!!Form::label('name', 'Skill:')!!}
                    <span class="field">
                        {!!Form::text('name', '', ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                   {!!Form::label('percentage', 'Percentage:')!!}
                    <span class="field">
                        {!!Form::text('percentage', '', ['class' => 'input-block-level'])!!}
                    </span> 
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
            <h3 id="newModalLabel">New skill</h3>
        </div>
        {!!Form::open(['url' => 'skill', 'class' => 'stdform'])!!}
            <div class="modal-body">
                <p>
                    {!!Form::label('name', 'Skill:')!!}
                    <span class="field">
                        {!!Form::text('name', '', ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                   {!!Form::label('percentage', 'Percentage:')!!}
                    <span class="field">
                        {!!Form::text('percentage', '', ['class' => 'input-block-level'])!!}
                    </span> 
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
                                    url: '/skill/'+id,
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
                    
                    $('#editSkills').attr('action', 'skill/' + $(row).data('id'));
                    $('#name').val($(row).data('name'));
                    $('#percentage').val($(row).data('percentage'));
                    
                    $('#editModal').modal('show');
                    return false;
                });
            };

        });
    </script>
@endsection
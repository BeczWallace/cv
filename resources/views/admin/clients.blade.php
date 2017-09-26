@extends('app')

@section('content')

    <div class="headtitle">
        <div class="btn-group">
            {!!Form::button('New Client', ['class' => 'btn dropdown-toggle', 'id' => 'new', 'data-toggle' => 'modal', 'data-target' => '#newModal'])!!}
        </div>
        <h4 class="widgettitle">Clients</h4>
    </div>
    <table class="table table-bordered responsive">
        <thead>
            <tr>
                <th class="span2">Client</th>
                <th class="span9">Image</th>
                <th class="span1">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->clients as $client)
                <tr data-id="{{$client->id}}" data-name="{{$client->name}}" data-image="{{$client->image}}">
                    <td class="span2">{{$client->name}}</td>
                    <td class="span9">
                        <img src="{{url('img/'.$client->image)}}" class="img-responsive">
                    </td>
                    <td class="centeralign span1">
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
            <h3 id="editModalLabel">Edit client</h3>
        </div>
        {!!Form::open(['class' => 'stdform', 'id' => 'editClients', 'method' => 'put', 'files' => true])!!}
            <div class="modal-body">
                <p>
                    {!!Form::label('name', 'Client:')!!}
                    <span class="field">
                        {!!Form::text('name', '', ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <div class="par">
                    {!!Form::label('image', 'Image:')!!}
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input span3">
                                <i class="iconfa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                            </div>
                            <span class="btn btn-file">
                                <span class="fileupload-new">Select file</span>
                                <span class="fileupload-exists">Change</span>
                                {!!Form::file('image')!!}
                            </span>
                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
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
            <h3 id="newModalLabel">New client</h3>
        </div>
        {!!Form::open(['url' => 'client', 'class' => 'stdform', 'files' => true])!!}
            <div class="modal-body">
                <p>
                    {!!Form::label('name', 'Client:')!!}
                    <span class="field">
                        {!!Form::text('name', '', ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <div class="par">
                    {!!Form::label('image', 'Image:')!!}
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input span3">
                                <i class="iconfa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                            </div>
                            <span class="btn btn-file">
                                <span class="fileupload-new">Select file</span>
                                <span class="fileupload-exists">Change</span>
                                {!!Form::file('image')!!}
                            </span>
                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
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
                                    url: '/client/'+id,
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
                    
                    $('#editClients').attr('action', 'client/' + $(row).data('id'));
                    $('#name').val($(row).data('name'));
                    $('.fileupload').removeClass('fileupload-exists').addClass('fileupload-new');
                    $('.fileupload-preview').text($(row).data('image'));
                    
                    $('#editModal').modal('show');
                    return false;
                });
            };

        });
    </script>
@endsection
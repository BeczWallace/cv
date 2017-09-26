@extends('app')

@section('content')

    <div class="headtitle">
        <div class="btn-group">
            {!!Form::button('New Testimonial', ['class' => 'btn dropdown-toggle', 'id' => 'new', 'data-toggle' => 'modal', 'data-target' => '#newModal'])!!}
        </div>
        <h4 class="widgettitle">Testimonials</h4>
    </div>
    <table class="table table-bordered responsive">
        <thead>
            <tr>
                <th>Text</th>
                <th>Author</th>
                <th>Photo</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->testimonials as $testimonial)
                <tr data-id="{{$testimonial->id}}" data-text="{{$testimonial->text}}" data-author="{{$testimonial->author}}" data-photo="{{$testimonial->photo}}">
                    <td><p>{!!$testimonial->text!!}</p></td>
                    <td>{{$testimonial->author}}</td>
                    <td>
                        <img src="{{url('img/'.$testimonial->photo)}}" class="img-responsive">
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
            <h3 id="editModalLabel">Edit testimonial</h3>
        </div>
        {!!Form::open(['class' => 'stdform', 'id' => 'editTestimonials', 'method' => 'put', 'files' => true])!!}
            <div class="modal-body">
                <p>
                    {!!Form::label('text', 'Text:')!!}
                    <span class="field">
                        {!!Form::textarea('text', '', ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('author', 'Author:')!!}
                    <span class="field">
                        {!!Form::text('author', '', ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <div class="par">
                    {!!Form::label('photo', 'Photo:')!!}
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input span3">
                                <i class="iconfa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                            </div>
                            <span class="btn btn-file">
                                <span class="fileupload-new">Select file</span>
                                <span class="fileupload-exists">Change</span>
                                {!!Form::file('photo')!!}
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
            <h3 id="newModalLabel">New testimonial</h3>
        </div>
        {!!Form::open(['url' => 'testimonial', 'class' => 'stdform', 'files' => true])!!}
            <div class="modal-body">
                <p>
                    {!!Form::label('text', 'Text:')!!}
                    <span class="field">
                        {!!Form::textarea('text', '', ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('author', 'Author:')!!}
                    <span class="field">
                        {!!Form::text('author', '', ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <div class="par">
                    {!!Form::label('photo', 'Photo:')!!}
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input span3">
                                <i class="iconfa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                            </div>
                            <span class="btn btn-file">
                                <span class="fileupload-new">Select file</span>
                                <span class="fileupload-exists">Change</span>
                                {!!Form::file('photo')!!}
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
                                    url: '/testimonial/'+id,
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
                    
                    $('#editTestimonials').attr('action', 'testimonial/' + $(row).data('id'));
                    $('#text').val($(row).data('text'));
                    $('#author').val($(row).data('author'));
                    $('.fileupload').removeClass('fileupload-exists').addClass('fileupload-new');
                    $('.fileupload-preview').text($(row).data('photo'));
                    
                    $('#editModal').modal('show');
                    return false;
                });
            };

        });
    </script>
@endsection
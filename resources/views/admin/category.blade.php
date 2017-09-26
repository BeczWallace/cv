@extends('app')

@section('content')
    <div class="headtitle">
        <div class="btn-group">
            {!!Form::button('New Category', ['class' => 'btn dropdown-toggle', 'id' => 'new', 'data-toggle' => 'modal', 'data-target' => '#newModal'])!!}
        </div>
        <h4 class="widgettitle">Project Categories</h4>
    </div>
    <table class="table table-bordered responsive">
        <thead>
            <tr>
                <th>Category</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr data-id="{{$category->id}}" data-name="{{$category->name}}">
                    <td>{{$category->name}}</td>
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
            <h3 id="editModalLabel">Edit Category</h3>
        </div>
        {!!Form::open(['class' => 'stdform', 'id' => 'editCategories', 'method' => 'put'])!!}
            <div class="modal-body">
                <p>
                    {!!Form::label('name', 'Category:')!!}
                    <span class="field">
                        {!!Form::text('name', '', ['class' => 'input-block-level'])!!}
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
            <h3 id="newModalLabel">New category</h3>
        </div>
        {!!Form::open(['url' => 'category', 'class' => 'stdform'])!!}
            <div class="modal-body">
                <p>
                    {!!Form::label('name', 'Category:')!!}
                    <span class="field">
                        {!!Form::text('name', '', ['class' => 'input-block-level'])!!}
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
                                    url: '/category/'+id,
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
                    
                    $('#editCategories').attr('action', 'category/' + $(row).data('id'));
                    $('#name').val($(row).data('name'));
                    
                    $('#editModal').modal('show');
                    return false;
                });
            };

        });
    </script>
@endsection
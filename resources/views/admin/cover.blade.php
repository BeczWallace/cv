@extends('app')

@section('content')

    <div class="mediamgr">
        <div class="mediamgr_left">
            <div class="mediamgr_head">
                <ul class="mediamgr_menu">
                    {{-- <li class="right newfilebtn">
                        <a href="" class="btn btn-primary" id="save-order">Save Order</a>
                    </li> --}}
                    <li class="right newfilebtn">
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newModal">Add New</a>
                    </li>
                </ul>
                <span class="clearall"></span>
            </div><!--mediamgr_head-->

            <div class="mediamgr_content">
                <ul id="medialist" class="listfile">
                    @foreach($user->covers->sortBy('sort_order') as $cover)
                        <li class="image" id="{{$cover->id}}">
                            <a href="{{url('cover/'.$cover->id)}}">
                                <img src="{{url('img/'.$cover->image)}}" alt="" />
                            </a>
                            <span class="filename">{{$cover->image}}</span>
                        </li>
                    @endforeach
                </ul>
                <br class="clearall" />
                {!!Form::button('Save Order', ['class' => 'btn btn-primary', 'id' => 'save-order', 'disabled' => 'true'])!!}
            </div><!--mediamgr_content-->
                    
        </div><!--mediamgr_left -->
        <br class="clearall" />
    </div><!--mediamgr-->

    <div aria-hidden="false" aria-labelledby="editModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="editModal">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
            <h3 id="editModalLabel">Edit Cover Image</h3>
        </div>
        {!!Form::open(['class' => 'stdform', 'id' => 'editCover', 'method' => 'put', 'files' => true])!!}
            <div class="modal-body">
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
            <h3 id="newModalLabel">New Cover Image</h3>
        </div>
        {!!Form::open(['url' => 'cover', 'class' => 'stdform', 'files' => true])!!}
            <div class="modal-body">
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
        $(document).ready(function(){
            
            //Replaces data-rel attribute to rel.
            //We use data-rel because of w3c validation issue
            $('a[data-rel]').each(function() {
                $(this).attr('rel', $(this).data('rel'));
            });
            
            $("#medialist a").colorbox();

            $("#medialist").sortable({
                update: function() {
                    $('#save-order').attr('disabled', false);
                }
            });

            $("#save-order").click(function() {
                var covers = [];

                $.each($('#medialist').sortable('toArray'), function(i, val) {
                    covers.push({id: val, sort_order: i})
                });

                $.ajax({
                    type: 'POST',
                    url: 'cover/sort',
                    data: {_token: '{{csrf_token()}}', covers: covers},
                    dataType: 'json'
                }).done(function(data) {
                    $('.maincontentinner').prepend('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> ' + data.success);
                }).error(function(data) {
                    alert(JSON.stringify(data));
                });

            })
            
        });

        
    </script>

@endsection
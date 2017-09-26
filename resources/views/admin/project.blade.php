@extends('app')

@section('content')
    
    <div class="widgetbox">
        <div class="headtitle">
            @if ($project)
                <div class="btn-group">
                    {!!Form::open(['url' => 'project/' . $project->id, 'method' => 'delete', 'id' => 'delete'])!!}
                        {!!Form::button('Delete', ['class' => 'btn dropdown-toggle', 'id' => 'delete-button'])!!}
                    {!!Form::close()!!}
                </div>
            @endif
            <h4 class="widgettitle">{{$project->title or 'New'}}</h4>
        </div>
        <div class="widgetcontent">
            {!!Form::open(['url' => 'project' . ($project ? '/' . $project->id : ''), 'class' => 'stdform', 'method' => ($project ? 'put' : 'post'), 'files' => true])!!}
                <p>
                    {!!Form::label('title', 'Title:')!!}
                    <span class="field">
                        {!!Form::text('title', ($project ? $project->title : ''), ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('categories', 'Categories:')!!}
                    <span class="field">
                        <select class="s2-categories form-control input-block-level" name="categories[]" multiple="multiple">
                            @foreach ($categories as $category)
                                <option value="{{strtolower($category->name)}}" {{$project && in_array(strtolower($category->name), explode(',', $project->categories)) ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </span>
                </p>
                <p>
                    {!!Form::label('client', 'Client:')!!}
                    <span class="field">
                        {!!Form::text('client', ($project ? $project->client : ''), ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <div class="par">
                    {!!Form::label('date_start', 'Date start:')!!}
                    <span class="field">
                        {!!Form::text('date_start', ($project && $project->date_start ? $project->date_start->format('Y-m-d') : ''), ['class' => 'input-block-level'])!!}
                    </span>
                </div>
                <div class="par">
                    {!!Form::label('date_end', 'Date end:')!!}
                    <span class="field">
                        {!!Form::text('date_end', ($project && $project->date_end ? $project->date_end->format('Y-m-d') : ''), ['class' => 'input-block-level'])!!}
                    </span>
                </div>
                <p>
                    {!!Form::label('url', 'URL:')!!}
                    <span class="field">
                        {!!Form::text('url',($project ? $project->url : ''), ['class' => 'input-block-level'])!!}
                    </span>
                </p>
                <p>
                    {!!Form::label('tags', 'tags:')!!}
                    <span class="field">
                        <select class="s2-tags form-control input-block-level" name="tags[]" multiple="multiple">
                            @if ($project)
                                @foreach (explode(',', $project->tags) as $tag)
                                    <option value="{{$tag}}" selected>{{$tag}}</option>
                                @endforeach
                            @endif
                        </select>
                    </span>
                </p>
                <div class="par">
                    {!!Form::label('image', 'Main Image:')!!}
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                    @if ($project && $project->image)
                        <div class="preview">
                            <img src="{{url('img/'.$project->image)}}" class="img-polaroid">
                        </div>
                        Remove
                        {!!Form::checkbox('image_delete', 'true')!!}
                    @endif
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
                <div class="par">
                    {!!Form::label('img1', 'Image 1:')!!}
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                    @if ($project && $project->img1)
                        <div class="preview">
                            <img src="{{url('img/'.$project->img1)}}" class="img-polaroid">
                        </div>
                        Remove
                        {!!Form::checkbox('img1_delete', 'true')!!}
                    @endif
                        <div class="input-append">
                            <div class="uneditable-input span3">
                                <i class="iconfa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                            </div>
                            <span class="btn btn-file">
                                <span class="fileupload-new">Select file</span>
                                <span class="fileupload-exists">Change</span>
                                {!!Form::file('img1')!!}
                            </span>
                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="par">
                    {!!Form::label('img2', 'Image 2:')!!}
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                    @if ($project && $project->img2)
                        <div class="preview">
                            <img src="{{url('img/'.$project->img2)}}" class="img-polaroid">
                        </div>
                        Remove
                        {!!Form::checkbox('img2_delete', 'true')!!}
                    @endif
                        <div class="input-append">
                            <div class="uneditable-input span3">
                                <i class="iconfa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                            </div>
                            <span class="btn btn-file">
                                <span class="fileupload-new">Select file</span>
                                <span class="fileupload-exists">Change</span>
                                {!!Form::file('img2')!!}
                            </span>
                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="par">
                    {!!Form::label('img3', 'Image 3:')!!}
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                    @if ($project && $project->img3)
                        <div class="preview">
                            <img src="{{url('img/'.$project->img3)}}" class="img-polaroid">
                        </div>
                        Remove
                        {!!Form::checkbox('img3_delete', 'true')!!}
                    @endif
                        <div class="input-append">
                            <div class="uneditable-input span3">
                                <i class="iconfa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                            </div>
                            <span class="btn btn-file">
                                <span class="fileupload-new">Select file</span>
                                <span class="fileupload-exists">Change</span>
                                {!!Form::file('img3')!!}
                            </span>
                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
                <p>
                    {!!Form::label('description', 'Description:')!!}
                    {!!Form::textarea('description', ($project ? $project->description : ''), ['class' => 'tinymce', 'style' => 'width: 80%'])!!}
                </p>
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

        // categories
        $('.s2-categories').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });

        // tags
        $('.s2-tags').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });

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
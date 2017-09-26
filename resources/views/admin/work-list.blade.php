@extends('app')

@section('content')
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <a href="{{url('work/create')}}" class="btn dropdown-toggle">New Work</a>
            </div>
            <h4 class="widgettitle">Work</h4>
        </div>
        <div class="widgetcontent">
            {!!Form::open(['url' => 'user/'.$user->id, 'class' => 'stdform', 'method' => 'put'])!!}
                <p>
                    {!!Form::label('experience', 'Experience:')!!}
                    {!!Form::textarea('experience', $user->experience, ['class' => 'tinymce', 'style' => 'width: 80%'])!!}
                </p>
                <p class="stdformbutton">
                    {!!Form::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
                </p>
                {!!Form::close()!!}
        </div>
    </div>

    <table class="table table-bordered responsive">
        <thead>
            <tr>
                <th>Title</th>
                <th>Company</th>
                <th>Period</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->work as $item)
                <tr data-id="{{$item->id}}">
                    <td>{{$item->title}}</td>
                    <td>{{$item->company}}</td>
                    <td>{{$item->date_start->format('M Y') . ' - ' . ($item->date_end ? $item->date_end->format('M Y') : 'Current')}}</td>
                    <td class="centeralign">
                        <a href="{{url('work/'.$item->id.'/edit')}}" class="editrow"><span class="icon-edit"></span></a>
                        <a href="" class="deleterow confirmbutton"><span class="icon-trash"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

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
                                $('<form>', {
                                    html: '<input type="hidden" value="{{csrf_token()}}" name="_token"> <input type="hidden" value="DELETE" name="_method">',
                                    method: 'POST',
                                    action: '/work/'+id
                                }).appendTo(document.body).submit();
                                
                            });
                        }
                    });
                    return false;
                }); 
            }

            

        });
    </script>
@endsection
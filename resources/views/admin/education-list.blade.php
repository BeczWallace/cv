@extends('app')

@section('content')
    <div class="headtitle">
        <div class="btn-group">
            <a href="{{url('education/create')}}" class="btn dropdown-toggle">New Education</a>
        </div>
        <h4 class="widgettitle">Education</h4>
    </div>
    <table class="table table-bordered responsive">
        <thead>
            <tr>
                <th>Title</th>
                <th>School</th>
                <th>Graduation</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->education as $item)
                <tr data-id="{{$item->id}}">
                    <td>{{$item->title}}</td>
                    <td>{{$item->school}}</td>
                    <td>{{$item->graduation->format('M Y')}}</td>
                    <td class="centeralign">
                        <a href="{{url('education/'.$item->id.'/edit')}}" class="editrow"><span class="icon-edit"></span></a>
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
                                    action: '/education/'+id
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
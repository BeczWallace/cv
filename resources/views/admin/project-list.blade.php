@extends('app')

@section('content')
    <div class="headtitle">
        <div class="btn-group">
            <a href="{{url('project/create')}}" class="btn dropdown-toggle">New Project</a>
        </div>
        <h4 class="widgettitle">Projects</h4>
    </div>
    <table class="table table-bordered responsive">
        <thead>
            <tr>
                <th>Title</th>
                <th>Period</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->projects as $item)
                <tr data-id="{{$item->id}}">
                    <td>{{$item->title}}</td>
                    <td>{{($item->date_start ? $item->date_start->format('M Y') : '') . ' - ' . ($item->date_end ? $item->date_end->format('M Y') : '')}}</td>
                    <td class="centeralign">
                        <a href="{{url('project/'.$item->id.'/edit')}}" class="editrow"><span class="icon-edit"></span></a>
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
                                    action: '/project/'+id
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
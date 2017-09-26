<div class="mediaWrapper row-fluid">
    <div class="span12 imginfo">
        <img src="{{url('img/'.$cover->image)}}" alt="" class="imgpreview img-polaroid" />
        <p style="margin-top: 10px;">
            <a href="#" class="btn btn-small editModal" data-id="{{$cover->id}}">
                <span class="icon-pencil"></span> Change Image
            </a>
            <a href="{{url('img/'.$cover->image)}}" target="_blank" class="btn btn-small">
                <span class="icon-eye-open"></span> View Original Size
            </a> 
        </p>
        <p>
            <strong>Filename:</strong> {{$cover->image}} <br />
            <strong>Upload Date:</strong> {{$cover->updated_at->format('F jS Y')}} <br />
        </p>
        <p>
            {!!Form::open(['url' => 'cover/' . $cover->id, 'method' => 'delete', 'id' => 'delete'])!!}
                <button class="btn" id="delete-button"><span class="icon-trash"></span> Delete</button>
            {!!Form::close()!!}
        </p>
    </div><!--span12-->
</div><!--imageWrapper-->

<script type="text/javascript">
    $('.editModal').click(function() {
        $.colorbox.close();

        $('#editCover').attr('action', 'cover/' + $(this).data('id'));

        $('#editModal').modal('show');
        return false;
    })

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
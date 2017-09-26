@extends('app')

@section('content')

<div id="dashboard-left" class="span12">
    
    <ul class="shortcuts">
        <li>
            <a href="{{url('section')}}">
                <span class="shortcuts-icon iconfa-th-list"></span>
                <span class="shortcuts-label">Sections</span>
            </a>
            <input type="checkbox" class="section-switch" data-handle-width="53" checked readonly>
        </li>
        <li>
            <a href="{{url('cover')}}">
                <span class="shortcuts-icon iconfa-picture"></span>
                <span class="shortcuts-label">Cover Images</span>
            </a>
            <input type="checkbox" class="section-switch" data-handle-width="53" checked readonly>
        </li>
        <li>
            <a href="{{url('social')}}">
                <span class="shortcuts-icon iconfa-share"></span>
                <span class="shortcuts-label">Social Profiles</span>
            </a>
            <input type="checkbox" class="section-switch" data-handle-width="53" checked readonly>
        </li>
        <li>
            <a href="{{url('skill')}}">
                <span class="shortcuts-icon iconfa-align-left"></span>
                <span class="shortcuts-label">Skills</span>
            </a>
            <input type="checkbox" class="section-switch" data-handle-width="53" checked readonly>
        </li>
        <li>
            <a href="{{url('offer')}}">
                <span class="shortcuts-icon iconfa-briefcase"></span>
                <span class="shortcuts-label">Offers</span>
            </a>
            <input type="checkbox" class="section-switch" data-handle-width="53" data-id="{{SectionControls::get('offers')->id}}" {{SectionControls::get('offers')->enabled ? 'checked' : ''}}>
        </li>
        <li>
            <a href="{{url('client')}}">
                <span class="shortcuts-icon iconfa-user"></span>
                <span class="shortcuts-label">Clients</span>
            </a>
            <input type="checkbox" class="section-switch" data-handle-width="53" data-id="{{SectionControls::get('clients')->id}}" {{SectionControls::get('clients')->enabled ? 'checked' : ''}}>
        </li>
        <li>
            <a href="{{url('education')}}">
                <span class="shortcuts-icon iconfa-book"></span>
                <span class="shortcuts-label">Education</span>
            </a>
            <input type="checkbox" class="section-switch" data-handle-width="53" data-id="{{SectionControls::get('education')->id}}" {{SectionControls::get('education')->enabled ? 'checked' : ''}}>
        </li>
        <li>
            <a href="{{url('work')}}">
                <span class="shortcuts-icon iconfa-building"></span>
                <span class="shortcuts-label">Work</span>
            </a>
            <input type="checkbox" class="section-switch" data-handle-width="53" data-id="{{SectionControls::get('work')->id}}" {{SectionControls::get('work')->enabled ? 'checked' : ''}}>
        </li>
        <li>
            <a href="{{url('project')}}">
                <span class="shortcuts-icon iconfa-bar-chart"></span>
                <span class="shortcuts-label">Projects</span>
            </a>
            <input type="checkbox" class="section-switch" data-handle-width="53" data-id="{{SectionControls::get('projects')->id}}" {{SectionControls::get('projects')->enabled ? 'checked' : ''}}>
        </li>
        <li>
            <a href="{{url('category')}}">
                <span class="shortcuts-icon iconfa-folder-open"></span>
                <span class="shortcuts-label">Project Categories</span>
            </a>
            <input type="checkbox" class="section-switch" data-handle-width="53" data-id="{{SectionControls::get('project-categories')->id}}" {{SectionControls::get('project-categories')->enabled ? 'checked' : ''}}>
        </li>
        <li>
            <a href="{{url('testimonial')}}">
                <span class="shortcuts-icon iconfa-comments"></span>
                <span class="shortcuts-label">Testimonials</span>
            </a>
            <input type="checkbox" class="section-switch" data-handle-width="53" data-id="{{SectionControls::get('testimonials')->id}}" {{SectionControls::get('testimonials')->enabled ? 'checked' : ''}}>
        </li>
        <li>
            <a href="{{url('award')}}">
                <span class="shortcuts-icon iconfa-trophy"></span>
                <span class="shortcuts-label">Awards</span>
            </a>
            <input type="checkbox" class="section-switch" data-handle-width="53" data-id="{{SectionControls::get('awards')->id}}" {{SectionControls::get('awards')->enabled ? 'checked' : ''}}>
        </li>
    </ul>
    
    <br />
    
    
    
    
</div><!--span12-->
                
@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $.uniform.restore('.section-switch');

        })
        $(window).load(function() {

            $('.section-switch').bootstrapSwitch();
        })

        $('.section-switch').on('switchChange.bootstrapSwitch', function(event, state) {
            var id = $(this).data('id');
            
            $.ajax({
                type: 'PUT',
                url: '/section-control/'+id,
                data: {_token: '{{csrf_token()}}', enabled: state},
                dataType: 'json'
            }).done(function(data) {
                if (data.success) {
                    $('.maincontentinner').prepend('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> ' + data.success);
                } else {
                    $('.maincontentinner').prepend('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Error!</strong> ' + data.error);
                }

                // --- [SL][Nick] Added refresh after save so that the menu will be updated
                setInterval(function () {
                    location.reload();
                }, 2000);

            }).error(function(data) {
                alert(JSON.stringify(data));
            });
        })
    </script>

@endsection
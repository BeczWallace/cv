@extends('app')

@section('content')

    <div class="profile-left">
        <div class="widgetbox profile-photo">
            <div class="headtitle">
                <div class="btn-group">
                    {!!Form::button('Change Photo', ['data-toggle' => 'modal', 'data-target' => '#modal', 'class' => 'btn dropdown-toggle'])!!}
                </div>
                <h4 class="widgettitle">Profile Photo</h4>
            </div>
            <div class="widgetcontent">
                <div class="profilethumb">
                    <img src="img/{{$user->photo}}" alt="" class="img-polaroid" />
                </div><!--profilethumb-->
            </div>
        </div>
        {!!Form::open(['url' => 'user/'.$user->id, 'class' => 'stdform', 'method' => 'put'])!!}
            
            <div class="widgetbox login-information">
                <h4 class="widgettitle">Login Information</h4>
                <div class="widgetcontent">
                    <p>
                        {!!Form::label('email', 'Email:')!!}
                        <span class="field">
                            {!!Form::email('email', $user->email, ['class' => 'input-block-level'])!!}
                        </span>
                    </p>
                    <p id="pwd-field">
                        <label style="padding:0">Password</label>
                        <span class="field">
                            <a href="" id="pwd">Change Password?</a>
                        </span>
                    </p>
                </div>
            </div>
            
            
            <div class="widgetbox personal-information">
                <h4 class="widgettitle">Personal Information</h4>
                <div class="widgetcontent">
                    <p>
                        {!!Form::label('name', 'Firstname:')!!}
                        <span class="field">
                            {!!Form::text('name', $user->name, ['class' => 'input-block-level'])!!}
                        </span>
                    </p>
                    <p>
                        {!!Form::label('lastname', 'Lastname:')!!}
                        <span class="field">
                            {!!Form::text('lastname', $user->lastname, ['class' => 'input-block-level'])!!}
                        </span>
                    </p>
                    <p>
                        {!!Form::label('address', 'Address')!!}
                        <span class="field">
                            {!!Form::textarea('address', $user->address, ['class' => 'span9', 'rows' => '2'])!!}
                        </span>
                    </p>
                    <p>
                        {!!Form::label('phone', 'Phone:')!!}
                        <span class="field">
                            {!!Form::text('phone', $user->phone, ['class' => 'input-block-level'])!!}
                        </span>
                    </p>
                    <p>
                        {!!Form::label('profile_title', 'Profile title:')!!}
                        <span class="field">
                            {!!Form::text('profile_title', $user->profile_title, ['class' => 'input-block-level'])!!}
                        </span>
                    </p>
                    <p>
                        {!!Form::label('introduction', 'Introduction:')!!}
                        {!!Form::textarea('introduction', $user->introduction, ['class' => 'tinymce', 'style' => 'width: 80%'])!!}
                    </p>
                    <p>
                        {!!Form::label('philosophy', 'Philosophy:')!!}
                        {!!Form::textarea('philosophy', $user->philosophy, ['class' => 'tinymce', 'style' => 'width: 80%'])!!}
                    </p>
                </div>
            </div>
            
            <p>
                {!!Form::button('Update profile', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
            </p>
            
        {!!Form::close()!!}
    </div><!--span8-->

    <div aria-hidden="false" aria-labelledby="modalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="modal">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
            <h3 id="modalLabel">Change Photo</h3>
        </div>
        {!!Form::open(['url' => 'user/'.$user->id, 'class' => 'stdform', 'method' => 'put', 'files' => true])!!}
            <div class="modal-body">
                <div class="par">
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
        jQuery(document).ready(function(){

            
            jQuery('.taglist .close').click(function(){
                jQuery(this).parent().remove();
                return false;
            });
            
        });

        $('#pwd').click(function(e) {
            e.preventDefault();
            var html = '{!!Form::label('password', 'Password:')!!}' +
                    '<span class="field">' +
                    '{!!Form::password('password', ['class' => 'input-block-level'])!!}' +
                    '</span>' +
                    '{!!Form::label('password_confirmation', 'Confirm Password:')!!}' +
                    '<span class="field">' +
                    '{!!Form::password('password_confirmation', ['class' => 'input-block-level'])!!}' +
                    '</span>';

            $('#pwd-field').html(html);
        })
    </script>
@endsection
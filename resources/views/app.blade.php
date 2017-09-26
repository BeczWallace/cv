<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Alex Davids </title>
    {!!HTML::style('admin/css/style.default.css')!!}
    {!!HTML::style('admin/css/style.navyblue.css')!!}
    {!!HTML::style('admin/css/responsive-tables.css')!!}
    {!!HTML::style('admin/css/bootstrap-fileupload.min.css')!!}
    {!!HTML::style('admin/css/bootstrap-timepicker.min.css')!!}
    {!!HTML::style('admin/prettify/prettify.css')!!}
    {!!HTML::style('admin/css/select2.min.css')!!}
    {!!HTML::style('admin/css/isotope.css')!!}
    {!!HTML::style('admin/css/bootstrap-switch.min.css')!!}
    {!!HTML::style('admin/css/custom.css')!!}

    {!!HTML::script('admin/js/jquery-1.9.1.min.js')!!}
    {!!HTML::script('admin/js/jquery-migrate-1.1.1.min.js')!!}
    {!!HTML::script('admin/js/jquery-ui-1.9.2.min.js')!!}
    {!!HTML::script('admin/js/modernizr.min.js')!!}
    {!!HTML::script('admin/js/bootstrap.min.js')!!}
    {!!HTML::script('admin/js/jquery.cookie.js')!!}
    {!!HTML::script('admin/js/jquery.uniform.min.js')!!}
    {!!HTML::script('admin/js/flot/jquery.flot.min.js')!!}
    {!!HTML::script('admin/js/flot/jquery.flot.resize.min.js')!!}
    {!!HTML::script('admin/js/responsive-tables.js')!!}
    {!!HTML::script('admin/js/custom.js')!!}
    {!!HTML::script('admin/js/tinymce/jquery.tinymce.js')!!}
    {!!HTML::script('admin/js/wysiwyg.js')!!}
    {!!HTML::script('admin/js/jquery.alerts.js')!!}
    {!!HTML::script('admin/js/bootstrap-fileupload.min.js')!!}
    {!!HTML::script('admin/js/bootstrap-timepicker.min.js')!!}
    {!!HTML::script('admin/js/jquery.validate.min.js')!!}
    {!!HTML::script('admin/js/jquery.tagsinput.min.js')!!}
    {!!HTML::script('admin/js/jquery.autogrow-textarea.js')!!}
    {!!HTML::script('admin/js/charCount.js')!!}
    {!!HTML::script('admin/js/colorpicker.js')!!}
    {!!HTML::script('admin/js/ui.spinner.min.js')!!}
    {!!HTML::script('admin/js/chosen.jquery.min.js')!!}
    {!!HTML::script('admin/js/forms.js')!!}
    {!!HTML::script('admin/prettify/prettify.js')!!}
    {!!HTML::script('admin/js/elements.js')!!}
    {!!HTML::script('admin/js/jquery.autogrow-textarea.js')!!}
    {!!HTML::script('admin/js/select2.full.js')!!}
    {!!HTML::script('admin/js/jquery.colorbox-min.js')!!}
    {!!HTML::script('admin/js/jquery.isotope.min.js')!!}  
    {!!HTML::script('admin/js/bootstrap-switch.min.js')!!}


    <!--[if lte IE 8]>{!!HTML::script('admin/js/excanvas.min.js')!!}<![endif]-->

</head>
<body>
    <div class="mainwrapper">
        
        <div class="header">
            <div class="logo">
                <a href="{{url('home')}}"><img src="{{url('admin/images/logo.png')}}" alt="" /></a>
            </div>
            <div class="headerinner">
                <ul class="headmenu">
                    <li class="odd"></li>
                    <li class="right">
                        <div class="userloggedinfo">
                            <img src="{{url('img/'.$user->photo)}}" alt="" />
                            <div class="userinfo">
                                <h5>{{$user->fullname}}<small>- {{$user->email}}</small></h5>
                                <ul>
                                    <li><a href="{{url('user')}}">Edit Profile</a></li>
                                    <li><a href="{{url('home')}}">Account Settings</a></li>
                                    <li><a href="{{url('auth/logout')}}">Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul><!--headmenu-->
            </div>
        </div>
        
        <div class="leftpanel">
            
            <div class="leftmenu">        
                <ul class="nav nav-tabs nav-stacked">
                    <li class="nav-header">Navigation</li>
                    <li class="{{$curr_page['title'] == 'Dashboard' ? 'active' : ''}}">
                        <a href="{{url('home')}}">
                            <span class="iconfa-laptop"></span> Dashboard
                        </a>
                    </li>
                    <li class="{{$curr_page['title'] == 'Sections' ? 'active' : ''}}">
                        <a href="{{url('section')}}">
                            <span class="iconfa-th-list"></span> Sections
                        </a>
                    </li>
                    <li class="{{$curr_page['title'] == 'Cover Images' ? 'active' : ''}}">
                        <a href="{{url('cover')}}">
                            <span class="iconfa-picture"></span> Cover Images
                        </a>
                    </li>
                    <li class="{{$curr_page['title'] == 'Social profiles' ? 'active' : ''}}">
                        <a href="{{url('social')}}">
                            <span class="iconfa-share-alt"></span> Social profiles
                        </a>
                    </li>
                    <li class="{{$curr_page['title'] == 'Skills' ? 'active' : ''}}">
                        <a href="{{url('skill')}}">
                            <span class="iconfa-align-left"></span> Skills ({{ Section::get('skills', 1)->header }})
                        </a>
                    </li>
                    @if (SectionControls::get('offers')->enabled)
                    <li class="{{$curr_page['title'] == 'Offers' ? 'active' : ''}}">
                        <a href="{{url('offer')}}">
                            <span class="iconfa-briefcase"></span> Offers
                        </a>
                    </li>
                    @endif
                    @if (SectionControls::get('clients')->enabled)
                    <li class="{{$curr_page['title'] == 'Clients' ? 'active' : ''}}">
                        <a href="{{url('client')}}">
                            <span class="iconfa-user"></span>
                            Clients
                            {{strtolower(Section::get('clients')->header) != 'clients' ? '(' . Section::get('clients')->header . ')' : ''}}
                        </a>
                    </li>
                    @endif
                    @if (SectionControls::get('education')->enabled)
                    <li class="dropdown {{$curr_page['title'] == 'Education' || $curr_page['title'] == 'New Education' ? 'active' : ''}}">
                        <a href="">
                            <span class="iconfa-book"></span>
                            Education
                            {{strtolower(Section::get('cv')->header) != 'education' ? '(' . Section::get('cv')->header . ')' : ''}}
                        </a>
                        <ul style="{{$curr_page['title'] == 'Education' || $curr_page['title'] == 'New Education' ? 'display:block;' : ''}}">
                            <li class="{{$curr_page['title'] == 'Education' && !$education ? 'active' : ''}}">
                                <a href="{{url('education')}}">
                                    All Education
                                </a>
                            </li>
                            @foreach ($user->education as $item)
                                <li class="{{$curr_page['title'] == 'Education' && $education && $education->id == $item->id ? 'active' : ''}}">
                                    <a href="{{url('education/'.$item->id.'/edit')}}">
                                        {{$item->title}}
                                    </a>
                                </li>
                            @endforeach
                            <li class="{{$curr_page['title'] == 'New Education' ? 'active' : ''}}">
                                <a href="{{url('education/create')}}">Add new</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (SectionControls::get('work')->enabled)
                    <li class="dropdown {{$curr_page['title'] == 'Work' || $curr_page['title'] == 'New Work' ? 'active' : ''}}">
                        <a href="">
                            <span class="iconfa-building"></span>
                            Work
                            {{strtolower(Section::get('cv')->header) != 'work' ? '(' . Section::get('cv')->header . ')' : ''}}
                        </a>
                        <ul style="{{$curr_page['title'] == 'Work' || $curr_page['title'] == 'New Work' ? 'display:block;' : ''}}">
                            <li class="{{$curr_page['title'] == 'Work' && !$work ? 'active' : ''}}">
                                <a href="{{url('work')}}">
                                    All Work
                                </a>
                            </li>
                            @foreach ($user->work as $item)
                                <li class="{{$curr_page['title'] == 'Work' && $work && $work->id == $item->id ? 'active' : ''}}">
                                    <a href="{{url('work/'.$item->id.'/edit')}}">
                                        {{$item->title}}
                                    </a>
                                </li>
                            @endforeach
                            <li class="{{$curr_page['title'] == 'New Work' ? 'active' : ''}}">
                                <a href="{{url('work/create')}}">Add new</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (SectionControls::get('projects')->enabled)
                    <li class="dropdown {{$curr_page['title'] == 'Project' || $curr_page['title'] == 'New Project' ? 'active' : ''}}">
                        <a href="">
                            <span class="iconfa-bar-chart"></span>
                            Projects
                            {{strtolower(Section::get('portfolio')->header) != 'projects' ? '(' . Section::get('portfolio')->header . ')' : ''}}
                        </a>
                        <ul style="{{$curr_page['title'] == 'Project' || $curr_page['title'] == 'New Project' ? 'display:block;' : ''}}">
                            <li class="{{$curr_page['title'] == 'Project' && !$project ? 'active' : ''}}">
                                <a href="{{url('project')}}">
                                    All Projects
                                </a>
                            </li>
                            @foreach ($user->projects as $item)
                                <li class="{{$curr_page['title'] == 'Project' && $project && $project->id == $item->id ? 'active' : ''}}">
                                    <a href="{{url('project/'.$item->id.'/edit')}}">
                                        {{$item->title}}
                                    </a>
                                </li>
                            @endforeach
                            <li class="{{$curr_page['title'] == 'New Project' ? 'active' : ''}}">
                                <a href="{{url('project/create')}}">Add new</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (SectionControls::get('project-categories')->enabled)
                    <li class="{{$curr_page['title'] == 'Project Categories' ? 'active' : ''}}">
                        <a href="{{url('category')}}">
                            <span class="iconfa-folder-open"></span>
                            Project Categories
                            {{strtolower(Section::get('portfolio')->header) != 'projects' ? '(' . Section::get('portfolio')->header . ' Categories)' : ''}}
                        </a>
                    </li>
                    @endif
                    @if (SectionControls::get('testimonials')->enabled)
                    <li class="{{$curr_page['title'] == 'Testimonials' ? 'active' : ''}}">
                        <a href="{{url('testimonial')}}">
                            <span class="iconfa-comments"></span>
                            Testimonials
                            {{strtolower(Section::get('testimonials')->header) != 'testimonials' ? '(' . Section::get('testimonials')->header . ')' : ''}}
                        </a>
                    </li>
                    @endif
                    @if (SectionControls::get('awards')->enabled)
                    <li class="{{$curr_page['title'] == 'Awards' ? 'active' : ''}}">
                        <a href="{{url('award')}}">
                            <span class="iconfa-trophy"></span>
                            Awards
                            {{strtolower(Section::get('awards')->header) != 'awards' ? '(' . Section::get('awards')->header . ')' : ''}}
                        </a>
                    </li>
                    @endif
                </ul>
            </div><!--leftmenu-->
            
        </div><!-- leftpanel -->
        
        <div class="rightpanel">
            
            <ul class="breadcrumbs">
                <li><a href="{{url('home')}}"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
                <li>{{$curr_page['title']}}</li>
            </ul>
            
            <div class="pageheader">
                <div class="pageicon"><span class="icon{{$curr_page['icon']}}"></span></div>
                <div class="pagetitle">
                    <h5>{{$curr_page['sub']}}</h5>
                    <h1>{{$curr_page['title']}}</h1>
                </div>
            </div><!--pageheader-->
            
            <div class="maincontent">
                <div class="maincontentinner">
                    @if (Session::has('warning'))
                        <div class="alert">
                            <button data-dismiss="alert" class="close" type="button">&times;</button>
                            <strong>Warning!</strong> {!!Session::get('warning')!!}
                        </div><!--alert-->
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-error">
                            <button data-dismiss="alert" class="close" type="button">&times;</button>
                            <strong>Error!</strong> {!!Session::get('error')!!}
                        </div><!--alert-->
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <button data-dismiss="alert" class="close" type="button">&times;</button>
                            <strong>Success!</strong> {!!Session::get('success')!!}
                        </div><!--alert-->
                    @endif
                    
                    <div class="row-fluid"> 

                        @yield('content')

                    </div><!--row-fluid-->
                    
                    <div class="footer">
                        <div class="footer-left">
                            <span>&copy; 2015. Alex Davids.</span>
                        </div>
                        <div class="footer-right">
                            <span>Designed by: <a href="http://superlogical.org/">SuperLogical</a></span>
                        </div>
                    </div><!--footer-->
                    
                </div><!--maincontentinner-->
            </div><!--maincontent-->
            
        </div><!--rightpanel-->
        
    </div><!--mainwrapper-->

    <!-- Scripts -->
    @yield('scripts')
    
</body>
</html>

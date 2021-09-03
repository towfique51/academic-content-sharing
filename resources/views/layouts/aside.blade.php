<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item menu-item-active" aria-haspopup="true">
                <a href="{{ route('admin.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="menu-section">
                <h4 class="menu-text">Post</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-graphic"></i>
                    <span class="menu-text">Post</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Post</span>
                            </span>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('panelpost.create') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Add Post</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">View All Post</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-section">
                <h4 class="menu-text">Application</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-graphic"></i>
                    <span class="menu-text">Application</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Application</span>
                            </span>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/aside-light.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Users</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Author</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>			
            <li class="menu-section">
                <h4 class="menu-text">Institution</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-graphic"></i>
                    <span class="menu-text">Varsity</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Varsity</span>
                            </span>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('panelvarsity.create') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Add New Varsity</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">View Varsities</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-graphic"></i>
                    <span class="menu-text">Department</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Department</span>
                            </span>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('paneldepartment.create') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Add New Department</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">View Department</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-section">
                <h4 class="menu-text">Course</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-graphic"></i>
                    <span class="menu-text">Course</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Course</span>
                            </span>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('panelcourse.create') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Add New Course</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">View Course</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-section">
                <h4 class="menu-text">Assesment</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-graphic"></i>
                    <span class="menu-text">Notes</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Notes</span>
                            </span>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('panelnote.create') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Add New Note</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">View Notes</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Specific Course Notes</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-graphic"></i>
                    <span class="menu-text">Labs</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Labs</span>
                            </span>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('panelLab.create') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Add New Lab</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">View Labs</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Specific Course Labs</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-graphic"></i>
                    <span class="menu-text">Assignments</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Assignment</span>
                            </span>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('panelassignment.create') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Add New Assignment</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">View Assignments</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Specific Course Assignments</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-graphic"></i>
                    <span class="menu-text">Assessments</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Assessments</span>
                            </span>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('panelassessment.create') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Add New Assessments</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">View Assessments</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Specific Course Notes</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-graphic"></i>
                    <span class="menu-text">Books</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Books</span>
                            </span>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/aside-light.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Add New Book</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">View Book</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Specific Course Books</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-graphic"></i>
                    <span class="menu-text">Quizs</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Quizs</span>
                            </span>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/aside-light.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Add New Quiz</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">View Quizs</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Specific Course Quizs</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-graphic"></i>
                    <span class="menu-text">Previous Question</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Questions</span>
                            </span>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/aside-light.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Add New Question</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">View Question</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="layout/themes/header-dark.html" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Specific Course Question</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
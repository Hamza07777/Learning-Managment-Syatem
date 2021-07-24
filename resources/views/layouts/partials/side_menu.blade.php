<!-- Page Sidebar Start-->
<nav-menus></nav-menus>
<header class="main-nav">
  <nav>
    <div class="main-navbar">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="mainnav">
        <ul class="nav-menu custom-scrollbar">
          <li class="back-btn">
            <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
          </li>
          @if (Auth::user()->role=='admin')
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="user"></i><span>Users</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('user.index')  }}">All Users</a></li>
                <li><a href="{{  route('user.create')  }}">Add User</a></li>
                <li><a href="{{  route('admin_profile')  }}">Profile</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="book"></i><span>Courses</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('course.index')  }}">All Courses</a></li>
                <li><a href="{{  route('course_evaluation.index')  }}">Courses Under Evaluation</a></li>
                <li><a href="{{  route('course.create')  }}">Add Course</a></li>

                </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="file-text"></i><span>Assignments</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('assignment.index')  }}">All Assignments</a></li>
                <li><a href="{{  route('all_user_course_assignment')  }}">All User Course Assignments</a></li>

                <li><a href="{{  route('assignment.create')  }}">Add Assignment</a></li>

                </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="file-text"></i><span>Quizzes</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('quiz.index')  }}">All Quizzes</a></li>
                <li><a href="{{  route('all_user_course_quiz')  }}">All User Course Quizzes</a></li>
                <li><a href="{{  route('assignment.create')  }}">Add Quizzes</a></li>

                </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="map-pin"></i><span>Locations</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('location.index')  }}">All Locations</a></li>
                <li><a href="{{  route('location.create')  }}">Add Location</a></li>

                </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="tag"></i><span>Tags</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('tag.index')  }}">All Tags</a></li>
                <li><a href="{{  route('tag.create')  }}">Add Tag</a></li>

                </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="folder-plus"></i><span>Categories</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('category.index')  }}">All Categories</a></li>
                <li><a href="{{  route('category.create')  }}">Add Category</a></li>

                </ul>
            </li>

            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="pocket"></i><span>Units</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('unit.index')  }}">All Units</a></li>
                <li><a href="{{  route('unit.create')  }}">Add Unit</a></li>

                </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="pocket"></i><span>Course Locations</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('course_location.index')  }}">All Course Locations</a></li>
                <li><a href="{{  route('course_location.create')  }}">Add Course Location</a></li>

                </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="tag"></i><span>Course Tags</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('course_tag.index')  }}">All Course Tags</a></li>
                <li><a href="{{  route('course_tag.create')  }}">Add Course Tag</a></li>

                </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="tag"></i><span>Course Categories</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('course_category.index')  }}">All Course Categories</a></li>
                <li><a href="{{  route('course_category.create')  }}">Add Course Category</a></li>

                </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="tag"></i><span>Course Assignments</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('course_assignment.index')  }}">All Course Assignments</a></li>
                <li><a href="{{  route('course_assignment.create')  }}">Add Course Assignment</a></li>

                </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="tag"></i><span>Course Quizzes</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('course_quiz.index')  }}">All Course Quizzes</a></li>
                <li><a href="{{  route('course_quiz.create')  }}">Add Course Quiz</a></li>

                </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="user"></i><span>Course Instructors</span></a>
                <ul class="nav-submenu menu-content">
                <li><a href="{{  route('course_instructor.index')  }}">All Course Instructors</a></li>
                <li><a href="{{  route('course_instructor.create')  }}">Add Course Instructor</a></li>

                </ul>
            </li>
          @endif






          @if (Auth::user()->role=='user')
          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="user"></i><span>Courses</span></a>
            <ul class="nav-submenu menu-content">
            <li><a href="{{  route('user-coureses.index')  }}">All Courses</a></li>
            <li><a href="{{  route('completed_courses')  }}">Completed Courses</a></li>

            </ul>
          </li>

          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="user"></i><span>Profile</span></a>
            <ul class="nav-submenu menu-content">
            <li><a href="{{  route('user_profile')  }}">Profile</a></li>
            </ul>
          </li>
          @endif




              @if (Auth::user()->role=='instructor')
          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="user"></i><span>Courses</span></a>
            <ul class="nav-submenu menu-content">
            <li><a href="{{  route('instructor-coureses.index')  }}">All Courses</a></li>
            <li><a href="{{  route('instrucotr_course_evaluation')  }}">Courses Under Evaluation</a></li>

            </ul>
          </li>

          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="file-text"></i><span>Assignments</span></a>
            <ul class="nav-submenu menu-content">
            <li><a href="{{  route('all_course_instructor_assignment')  }}">All Assignments</a></li>
            <li><a href="{{  route('all_user_course_instructor_assignment')  }}">All User Course Assignments</a></li>

            <li><a href="{{  route('instructor-assignment.create')  }}">Add Assignment</a></li>

            </ul>
        </li>
        <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="file-text"></i><span>Quizzes</span></a>
            <ul class="nav-submenu menu-content">
            <li><a href="{{  route('all_course_instructor_quizzes')  }}">All Quizzes</a></li>
            <li><a href="{{  route('all_user_course_instructor_quizzes')  }}">All User Course Quizzes</a></li>
            <li><a href="{{  route('instructor-quiz.create')  }}">Add Quizzes</a></li>

            </ul>
        </li>

          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="user"></i><span>Profile</span></a>
            <ul class="nav-submenu menu-content">
            <li><a href="{{  route('instructor_profile')  }}">Profile</a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </div>
  </nav>
</header>
    <!-- Page Sidebar Ends-->

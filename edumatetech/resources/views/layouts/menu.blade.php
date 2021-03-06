<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>Collagename</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- search form (Optional) -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <!-- <li class="active treeview"> -->
    <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Super Master</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('academicyear.index') }}">Academic Year</a></li>
        <li><a href="{{ route('role.index') }}">Role</a></li>
        <li><a href="{{ route('user.index') }}">User</a></li>
        <li><a href="{{ route('class-detail.index') }}">Class Detail</a></li>
        <li><a href="{{ route('class-division.index') }}">Class Division</a></li>
        <li><a href="{{ route('classBranch.index') }}">Class Branch</a></li>
        <li><a href="{{ route('classMapping.index') }}">Manage Batch</a></li>
        <li><a href="{{ route('casteCategory.index') }}">Caste Category</a></li>
        <li><a href="{{ route('religion.index') }}">Religion</a></li>        
        <li><a href="{{ route('caste.index') }}">Caste</a></li>
        <li><a href="{{ route('subject.index') }}">Subject</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Master</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('academicyear.index') }}">Academic Year</a></li>        
        <li><a href="{{ route('user.index') }}">User</a></li>        
        <li><a href="{{ route('classMapping.index') }}">Manage Batch</a></li>
        <li><a href="{{ route('casteCategory.index') }}">Caste Category</a></li>
        <li><a href="{{ route('religion.index') }}">Religion</a></li>        
        <li><a href="{{ route('caste.index') }}">Caste</a></li>
        <li><a href="{{ route('subject.index') }}">Subject</a></li>
        <li><a href="{{ route('examtype.index') }}">Exam Type</a></li>
      </ul>
    </li>

    <!-- <li class=""><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li> -->
    <li><a href="{{ route('student.index') }}"><i class="fa fa-link"></i> <span>Student</span></a></li>
    <li><a href="{{ route('role.index') }}"><i class="fa fa-link"></i> <span>Role</span></a></li>
    <!-- <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li> -->
    <li class="treeview">
    <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Time Table</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
      <li><a href="{{ route('day.index') }}">Day</a></li>
      <li><a href="{{ route('period.index') }}">Period</a></li>
      <li><a href="{{ route('timeTable.index') }}">Assign Time-Table</a></li>
      </ul>
    </li>
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>
 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="{{ route('home') }}" class="nav-link">Website</a>
         </li>
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto pr-5">
         <!-- Profile Dropdown Menu -->
         <li class="nav-item dropdown">
             <a class="nav-link" data-bs-toggle="dropdown" href="#">
                 {{ Auth::user()->name }}
             </a>
             <div class="dropdown-menu dropdown-menu-right">
                 <a href="{{ route('logout') }}" class="dropdown-item"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                     <!-- Logout option -->
                     <i class="fas fa-sign-out-alt mr-2"></i> Logout
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>

             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                 <i class="fas fa-expand-arrows-alt"></i>
             </a>
         </li>
     </ul>
 </nav>
 <!-- /.navbar -->

<!DOCTYPE html>
<html>

<head>
  @include('layouts.css')
</head>

<body>
  <!-- Sidenav -->
  @include('layouts.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('layouts.top_bar')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            
          </div>
          <!-- Card stats -->
            @yield('content')
        </div>
      </div>
    </div>
    <!-- Page content -->
    
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('layouts.javascript')
</body>

</html>

<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
   <!-- Navbar -->
   @include('layouts.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.partials.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('layouts.partials.scripts')
</body>
</html>

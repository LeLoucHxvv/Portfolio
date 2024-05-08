<!DOCTYPE html>
<html lang="en">
    @include('layouts.partials.header')
<body >
    <div class="container-scroller">
    @include('layouts.partials._navbarr')
    <div class="container-fluid page-body-wrapper">
        @include('layouts.partials._sidebarr')
        <div class="main-panel">
            @yield('content')
        </div>
    </div>
    @include('layouts.partials.footer')
    </div>
</body>
</html>

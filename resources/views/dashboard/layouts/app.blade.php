<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    @yield('css')
</head>
<body>
 
<div>
    @include('dashboard.layouts.sidebar')

    
    <div class="lg:pl-72">
        
        @include('dashboard.layouts.headers')

      <main class="py-10">
        <div class="px-4 sm:px-6 lg:px-8">
                @yield('content')
        </div>
      </main>
    </div>
  </div>


  <script>
        let container = document.getElementById('userProfileContainer');

        function toggleSidebar() {
            let sidebarContainer = document.getElementById('mobile-sidebar');
            sidebarContainer.style.display = sidebarContainer.style.display === 'none' ? 'block' : 'none';
        }
        function toggleProfile() {
            container.style.display = container.style.display === 'none' ? 'block' : 'none';
        }

        document.addEventListener('click', function(event) {
            let button = document.getElementById('user-menu-button');
             if (! container.contains(event.target) && event.target !== button && event.target.contains(button)) {
                container.style.display = 'none'; 
                console.log('hi');
            }
        });

   </script>
    @yield('script')
</body>
</html>
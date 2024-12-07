<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <title>Learnify</title>

    @vite('resources/css/app.css')
    @notifyCss

    <style>
           .notify {
    position: fixed !important;
    top: 20px;
    right: 20px;
    z-index: 9999;
}
    </style>
</head>
<body>

@yield('content')

<x-notify::notify/>
@notifyJs
<script>
    const toggleSidebar = document.getElementById('toggleSidebarBtn')
    const toggleSidebarItem = document.getElementById('toggleSidebarItemBtn')
    const sidebarContainer = document.getElementById('sidebarContainer')
    const contentContainer = document.getElementById('dashboard')
    const sidebarItem = document.querySelectorAll('#sidebar-item')
    const sidebarItemTitles = document.querySelectorAll('#sidebar-item-title')
    const sidebarContentContainer = document.querySelectorAll('.sidebar-content-container p')
    const sidebarHeader = document.querySelector('#sidebarHeader')

    toggleSidebarItem
        .addEventListener('click', () => {
            sidebarItemTitles.forEach(title => {
                title.classList.toggle('hidden')
            })

            sidebarItem.forEach(icon => {
                icon.classList.toggle('justify-end');
                icon.classList.toggle('px-1.5');
            })

            sidebarContentContainer.forEach(p => {
                p.classList.toggle('hidden')
            })
        })

    toggleSidebarItem
        .addEventListener('click', () => {
            if (sidebarContainer.hasAttribute('active')) {
                sidebarContainer.classList.remove('lg:-translate-x-40', 'translate-x-0')
                sidebarContainer.classList.add('lg:translate-x-0', '-translate-x-60')
                contentContainer.classList.add('lg:ml-60')
                contentContainer.classList.remove('lg:ml-20')
                sidebarContainer.removeAttribute('active')
            } else {
                sidebarContainer.setAttribute('active', 'true')
                sidebarContainer.classList.remove('lg:translate-x-0')
                sidebarContainer.classList.add('lg:-translate-x-40')
                contentContainer.classList.remove('lg:ml-60')
                contentContainer.classList.add('lg:ml-20')
            }
        })

    toggleSidebar.addEventListener('click', () => {
        if (!sidebarContainer.hasAttribute('active')) {
            sidebarContainer.setAttribute('active', 'true')
            sidebarContainer.classList.remove('-translate-x-60')
            sidebarContainer.classList.add('translate-x-0')
        }
    })
</script>


<!-- Script tambahan dari stack -->
@stack('additional-scripts')

<script>
    const button = document.getElementById('user-menu-button');
    const dropdown = document.getElementById('user-dropdown');

    button.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
    });
    window.addEventListener('click', (event) => {
        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>

</body>
</html>

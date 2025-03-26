<x-admin.sidebar.main>
    <x-admin.sidebar.menu menu="Dashboard" icon="bi-grid" href="{{ route('dashboard') }}" id="menu-dashboard" />
    <x-admin.sidebar.menu-title menu="MENU" />
    <x-admin.sidebar.menu-parent menu="Data" icon="bi bi-file-earmark-bar-graph" id="menu-test">
        <x-admin.sidebar.menu-child menu="Content" id="menu-test-content" href="{{ route('test-content.index') }}" />
        <x-admin.sidebar.menu-child menu="Image" id="menu-test-image" href="{{ route('test-image.index') }}" />
        <x-admin.sidebar.menu-child menu="Modal" id="menu-test-modal" href="{{ route('test-modal.index') }}" />
        <x-admin.sidebar.menu-child menu="Standart" id="menu-test-standart" href="{{ route('test-standart.index') }}" />
        <x-admin.sidebar.menu-child menu="Tag" id="menu-test-tag" href="{{ route('test-tag.index') }}" />
    </x-admin.sidebar.menu-parent>
    <x-admin.sidebar.menu-parent menu="Information" icon="bi-activity" id="menu-info">
        <x-admin.sidebar.menu-child menu="Activity" id="menu-info-activity" href="{{ route('log-activity.index') }}" />
    </x-admin.sidebar.menu-parent>
    <x-admin.sidebar.menu-parent menu="Settings" icon="bi-gear" id="menu-setting">
        <x-admin.sidebar.menu-child menu="Users" id="menu-setting-user" href="{{ route('user.index') }}" />
    </x-admin.sidebar.menu-parent>
</x-admin.sidebar.main>

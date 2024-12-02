<div class="p-3">
    <h5 class="text-muted mb-3">Manager Dashboard</h5>
    <div class="nav flex-column">
        <a href="{{ route('manager.dashboard') }}" class="nav-link mb-2">
            <i class="bi bi-speedometer2 me-2"></i>
            Dashboard
        </a>
        <a href="{{ route('manager.inventory.index') }}" class="nav-link mb-2">
            <i class="bi bi-box-seam me-2"></i>
            Inventory Management
        </a>
        <a href="{{ route('manager.users.index') }}" class="nav-link mb-2">
            <i class="bi bi-people me-2"></i>
            User Management
        </a>
        <a href="{{ route('manager.reports.index') }}" class="nav-link mb-2">
            <i class="bi bi-file-earmark-text me-2"></i>
            Reports
        </a>
        <a href="{{ route('manager.settings.index') }}" class="nav-link mb-2">
            <i class="bi bi-gear me-2"></i>
            Settings
        </a>
    </div>
</div>
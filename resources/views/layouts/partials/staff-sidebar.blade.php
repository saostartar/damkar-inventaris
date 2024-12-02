<div class="p-3">
    <h5 class="text-muted mb-3">Staff Dashboard</h5>
    <div class="nav flex-column">
        <a href="{{ route('staff.inventory.index') }}" class="nav-link mb-2">
            <i class="bi bi-box-seam me-2"></i>
            View Inventory
        </a>
        <a href="{{ route('staff.loans.index') }}" class="nav-link mb-2">
            <i class="bi bi-clipboard-check me-2"></i>
            Equipment Loans
        </a>
        <a href="{{ route('staff.profile.index') }}" class="nav-link mb-2">
            <i class="bi bi-person me-2"></i>
            My Profile
        </a>
    </div>
</div>
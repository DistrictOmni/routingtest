<?php
// app/Core/Auth/Views/AllRolesView.php
// Variables available:
//   $roles         -> An instance of Illuminate\Pagination\LengthAwarePaginator
//   $currentPage   -> e.g. 1
//   $totalPages    -> e.g. 3

// For convenience, let's store the Eloquent items in a variable:
$roleItems = $roles->items(); // Array or collection of role rows
?>

<div class="container mx-auto p-4">
  <!-- Page Title -->
  <h1 class="text-3xl font-bold mb-4">All Roles</h1>

  <!-- Search/Filter Bar -->
  <div class="bg-white p-4 rounded shadow mb-4">
    <form method="GET" action="" class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
      <div class="flex flex-col gap-2 w-full md:w-1/2">
        <label for="search" class="text-sm font-semibold text-gray-600">Search Roles</label>
        <input
          type="text"
          id="search"
          name="search"
          placeholder="Role Name"
          class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <!-- (Optional) Additional filters could go here, like guard name, status, etc. -->

      <!-- Filter Button -->
      <button
        type="submit"
        class="bg-blue-600 text-white font-semibold px-4 py-2 rounded hover:bg-blue-700
               focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
        <i class="fas fa-filter mr-1"></i> Filter
      </button>
    </form>
  </div>

  <!-- Bulk Actions -->
  <div class="flex items-center space-x-2 mb-2">
    <button
      class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold px-3 py-1 rounded inline-flex items-center"
      onclick="bulkActivate()"
    >
      <i class="fas fa-toggle-on mr-1"></i> Activate
    </button>
    <button
      class="bg-red-500 hover:bg-red-600 text-white font-semibold px-3 py-1 rounded inline-flex items-center"
      onclick="bulkDelete()"
    >
      <i class="fas fa-trash mr-1"></i> Delete
    </button>
    <button
      class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-3 py-1 rounded inline-flex items-center"
      onclick="bulkReset()"
    >
      <i class="fas fa-sync-alt mr-1"></i> Reset
    </button>
  </div>

  <!-- Roles Table -->
  <div class="overflow-x-auto bg-white rounded shadow">
    <table class="min-w-full text-left align-middle">
      <thead class="bg-gray-50 border-b border-gray-200">
        <tr>
          <th class="px-4 py-3">
            <input type="checkbox" onclick="toggleAllCheckboxes(this)" />
          </th>
          <th class="px-4 py-3">Name</th>
          <th class="px-4 py-3">Guard</th>
          <th class="px-4 py-3">Permissions</th>
          <th class="px-4 py-3">Description</th>
          <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <?php if (!empty($roleItems)): ?>
          <?php foreach ($roleItems as $role): ?>
            <tr>
              <td class="px-4 py-3">
                <input type="checkbox" name="role_ids[]" value="<?= $role->id ?>" />
              </td>
              <td class="px-4 py-3">
                <!-- Example: Link to a “show” or “edit” page for the role -->
                <a href="/admin/auth/roles/<?= $role->id ?>" class="text-blue-600 hover:underline">
                  <?= htmlspecialchars($role->name) ?>
                </a>
              </td>
              <td class="px-4 py-3">
                <!-- Often roles have a guard (e.g., "web", "api"). Adjust as needed. -->
                <?= htmlspecialchars($role->guard_name ?? 'web') ?>
              </td>
              <td class="px-4 py-3">
                <!-- If $role->permissions is a relationship or array, list them -->
                <?php
                if (!empty($role->permissions)) {
                    foreach ($role->permissions as $perm) {
                        // For example, $perm could be an object with $perm->name
                        echo '<span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-1 rounded mr-1">'
                             . htmlspecialchars($perm->name ?? $perm) // Adjust if it's just a string
                             . '</span>';
                    }
                } else {
                    echo '<em>No Permissions</em>';
                }
                ?>
              </td>
              <td class="px-4 py-3">
                <?= htmlspecialchars($role->description ?? '') ?>
              </td>
              <td class="px-4 py-3">
                <button
                  class="text-blue-600 hover:text-blue-800 mr-2"
                  onclick="editRole(<?= $role->id ?>)"
                  title="Edit Role"
                >
                  <i class="fas fa-edit"></i>
                </button>
                <button
                  class="text-red-600 hover:text-red-800"
                  onclick="deleteRole(<?= $role->id ?>)"
                  title="Delete Role"
                >
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="px-4 py-4 text-center text-gray-500">No roles found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-4 flex items-center justify-between">
    <!-- Previous / Next Buttons -->
    <div>
      <?php
        // Basic logic for "Prev" / "Next" based on current and last page
        $prevPage = max($roles->currentPage() - 1, 1);
        $nextPage = min($roles->currentPage() + 1, $roles->lastPage());
      ?>
      <a
        href="?page=<?= $prevPage ?>"
        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded"
      >
        &laquo; Prev
      </a>
      <a
        href="?page=<?= $nextPage ?>"
        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded ml-2"
      >
        Next &raquo;
      </a>
    </div>
    <div class="text-sm text-gray-600">
      Page <strong><?= $roles->currentPage() ?></strong>
      of <strong><?= $roles->lastPage() ?></strong>
      (<?= $roles->total() ?> total roles)
    </div>
  </div>
</div>

<!-- Example JavaScript (No framework) -->
<script>
function toggleAllCheckboxes(source) {
  const checkboxes = document.querySelectorAll('input[name="role_ids[]"]');
  for (const cb of checkboxes) {
    cb.checked = source.checked;
  }
}

// Example placeholders for bulk actions:
function bulkActivate() {
  alert('Bulk activate triggered for selected roles.');
}
function bulkDelete() {
  alert('Bulk delete triggered for selected roles.');
}
function bulkReset() {
  alert('Bulk reset triggered for selected roles.');
}

// Example placeholders for single actions:
function editRole(roleId) {
  alert('Edit role with ID: ' + roleId);
  // Implement your actual edit logic or modal here
}
function deleteRole(roleId) {
  if (confirm('Are you sure you want to delete role ID ' + roleId + '?')) {
    alert('Delete logic for role: ' + roleId);
  }
}
</script>

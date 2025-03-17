<?php
// app/Core/Auth/Views/AllUsersView.php
// Variables available:
//   $users         -> An instance of Illuminate\Pagination\LengthAwarePaginator
//   $currentPage   -> e.g. 1
//   $totalPages    -> e.g. 3

// For convenience, let's store the Eloquent items in a variable:
$userItems = $users->items(); // This is an array or collection of user rows
?>


<div class="container mx-auto p-4">
  <!-- Page Title -->
  <h1 class="text-3xl font-bold mb-4">All Users</h1>

  <!-- Search/Filter Bar -->
  <div class="bg-white p-4 rounded shadow mb-4">
    <form method="GET" action="" class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
      <div class="flex flex-col gap-2 w-full md:w-1/2">
        <label for="search" class="text-sm font-semibold text-gray-600">Search Users</label>
        <input
          type="text"
          id="search"
          name="search"
          placeholder="Name or Email"
          class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <div class="flex gap-4 flex-wrap md:flex-nowrap">
        <!-- Role Filter -->
        <div>
          <label for="role" class="text-sm font-semibold text-gray-600">Role</label>
          <select
            id="role"
            name="role"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="">All Roles</option>
            <option value="admin">Admin</option>
            <option value="staff">Staff</option>
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
          </select>
        </div>

        <!-- Status Filter -->
        <div>
          <label for="status" class="text-sm font-semibold text-gray-600">Status</label>
          <select
            id="status"
            name="status"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="">All Statuses</option>
            <option value="active">Active</option>
            <option value="pending">Pending</option>
            <option value="suspended">Suspended</option>
          </select>
        </div>

        <!-- 2FA Filter -->
        <div>
          <label for="twofa" class="text-sm font-semibold text-gray-600">2FA</label>
          <select
            id="twofa"
            name="twofa"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="">Any</option>
            <option value="1">Enabled</option>
            <option value="0">Disabled</option>
          </select>
        </div>
      </div>

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
      onclick="bulkResetPassword()"
    >
      <i class="fas fa-key mr-1"></i> Reset Password
    </button>
  </div>

  <!-- Users Table -->
  <div class="overflow-x-auto bg-white rounded shadow">
    <table class="min-w-full text-left align-middle">
      <thead class="bg-gray-50 border-b border-gray-200">
        <tr>
          <th class="px-4 py-3">
            <input type="checkbox" onclick="toggleAllCheckboxes(this)" />
          </th>
          <th class="px-4 py-3">Name</th>
          <th class="px-4 py-3">Status</th>
          <th class="px-4 py-3">Email</th>
          <th class="px-4 py-3">Roles</th>
          <!-- Replaced "Email Verified" column with "Scope" -->
          <th class="px-4 py-3">Scope</th>
          <th class="px-4 py-3">2FA</th>
          <th class="px-4 py-3">Last Login</th>
          <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <?php if (!empty($userItems)): ?>
          <?php foreach ($userItems as $user): ?>
            <tr>
              <td class="px-4 py-3">
                <input type="checkbox" name="user_ids[]" value="<?= $user->id ?>" />
              </td>
              <td class="px-4 py-3">
                <a href="/admin/auth/users/<?= $user->id ?>" class="text-blue-600 hover:underline">
                <?= htmlspecialchars($user->display_name) ?>
                </a>
              </td>
              <td class="px-4 py-3">
                <?php
                  $status = $user->status ?? 'unknown';
                  if ($status === 'active') {
                      echo '<span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Active</span>';
                  } elseif ($status === 'pending') {
                      echo '<span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-semibold">Pending</span>';
                  } elseif ($status === 'suspended') {
                      echo '<span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-semibold">Suspended</span>';
                  } else {
                      echo htmlspecialchars($status);
                  }
                ?>
              </td>
              <td class="px-4 py-3">
                <?= htmlspecialchars($user->email) ?>
              </td>
              <td class="px-4 py-3">
                <?php
                // Example: If roles is a simple array or a CSV string, adjust as needed
                if (!empty($user->roles)) {
                    foreach ($user->roles as $role) {
                        echo '<span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-1 rounded mr-1">'
                             . htmlspecialchars($role) . '</span>';
                    }
                } else {
                    echo '<em>No Roles</em>';
                }
                ?>
              </td>
              <!-- New "Scope" column cell -->
              <td class="px-4 py-3">
                <?= htmlspecialchars($user->scope ?? '') ?>
              </td>
              <td class="px-4 py-3">
                <?php if (!empty($user->twofa_enabled)): ?>
                  <span class="text-green-600"><i class="fas fa-lock"></i> On</span>
                <?php else: ?>
                  <span class="text-gray-400"><i class="fas fa-lock-open"></i> Off</span>
                <?php endif; ?>
              </td>
              <td class="px-4 py-3">
                <?php
                  echo $user->last_login ? date('Y-m-d H:i', strtotime($user->last_login)) : 'Never';
                ?>
              </td>
              <td class="px-4 py-3">
                <button
                  class="text-blue-600 hover:text-blue-800 mr-2"
                  onclick="editUser(<?= $user->id ?>)"
                  title="Edit User"
                >
                  <i class="fas fa-edit"></i>
                </button>
                <button
                  class="text-red-600 hover:text-red-800"
                  onclick="deleteUser(<?= $user->id ?>)"
                  title="Delete User"
                >
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="9" class="px-4 py-4 text-center text-gray-500">No users found.</td>
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
        // Basic logic for "Prev" / "Next"
        $prevPage = max($users->currentPage() - 1, 1);
        $nextPage = min($users->currentPage() + 1, $users->lastPage());
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
      Page <strong><?= $users->currentPage() ?></strong>
      of <strong><?= $users->lastPage() ?></strong>
      (<?= $users->total() ?> total users)
    </div>
  </div>
</div>

<!-- Example JavaScript (No framework) -->
<script>
function toggleAllCheckboxes(source) {
  const checkboxes = document.querySelectorAll('input[name="user_ids[]"]');
  for (const cb of checkboxes) {
    cb.checked = source.checked;
  }
}
function bulkActivate() {
  alert('Bulk activate triggered for selected users.');
}
function bulkDelete() {
  alert('Bulk delete triggered for selected users.');
}
function bulkResetPassword() {
  alert('Bulk reset password triggered for selected users.');
}
function editUser(userId) {
  alert('Edit user with ID: ' + userId);
  // Open your "Edit user" form or modal here
}
function deleteUser(userId) {
  if (confirm('Are you sure you want to delete user ID ' + userId + '?')) {
    alert('Delete logic for user: ' + userId);
  }
}
</script>

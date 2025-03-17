<?php
// AllUsersView.php

// Example: $users is an array of user data, each user is an object or associative array
// For demonstration, we mock an array of user objects here. In real usage, you'd query your DB.
$users = [
    (object)[
        'id'              => 1,
        'name'            => 'John Doe',
        'email'           => 'john@example.com',
        'roles'           => ['Admin', 'Teacher'],
        'status'          => 'active',      // could be 'active', 'pending', 'suspended'
        'email_verified'  => true,
        'twofa_enabled'   => false,
        'last_login'      => '2023-04-05 10:15:00'
    ],
    (object)[
        'id'              => 2,
        'name'            => 'Jane Smith',
        'email'           => 'jane@example.com',
        'roles'           => ['Staff'],
        'status'          => 'pending',
        'email_verified'  => false,
        'twofa_enabled'   => true,
        'last_login'      => '2023-04-07 09:25:00'
    ],
    // ... more users ...
];

// If you have pagination data, you can pass it in, or just mock it:
$currentPage = 1;
$totalPages  = 3;
?>


<div class="max-w-7xl mx-auto p-4">
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

        <!-- Email Verified Filter -->
        <div>
          <label for="email_verified" class="text-sm font-semibold text-gray-600">Email Verified</label>
          <select
            id="email_verified"
            name="email_verified"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="">Any</option>
            <option value="1">Verified</option>
            <option value="0">Not Verified</option>
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
          <th class="px-4 py-3">Email</th>
          <th class="px-4 py-3">Roles</th>
          <th class="px-4 py-3">Status</th>
          <th class="px-4 py-3">Email Verified</th>
          <th class="px-4 py-3">2FA</th>
          <th class="px-4 py-3">Last Login</th>
          <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <?php if (!empty($users)): ?>
          <?php foreach ($users as $user): ?>
            <tr>
              <td class="px-4 py-3">
                <input type="checkbox" name="user_ids[]" value="<?= $user->id ?>" />
              </td>
              <td class="px-4 py-3">
                <?= htmlspecialchars($user->name) ?>
              </td>
              <td class="px-4 py-3">
                <?= htmlspecialchars($user->email) ?>
              </td>
              <td class="px-4 py-3">
                <?php if (!empty($user->roles)): ?>
                  <?php foreach ($user->roles as $role): ?>
                    <span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-1 rounded mr-1">
                      <?= htmlspecialchars($role) ?>
                    </span>
                  <?php endforeach; ?>
                <?php else: ?>
                  <em>No Roles</em>
                <?php endif; ?>
              </td>
              <td class="px-4 py-3">
                <?php if ($user->status === 'active'): ?>
                  <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Active</span>
                <?php elseif ($user->status === 'pending'): ?>
                  <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-semibold">Pending</span>
                <?php else: ?>
                  <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-semibold">Suspended</span>
                <?php endif; ?>
              </td>
              <td class="px-4 py-3">
                <?php if (!empty($user->email_verified)): ?>
                  <span class="text-green-600"><i class="fas fa-check-circle"></i></span>
                <?php else: ?>
                  <span class="text-gray-400"><i class="fas fa-times-circle"></i></span>
                <?php endif; ?>
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
                  // For readability, handle “never” or format date
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
    <div>
      <button
        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded"
        onclick="goToPage(<?= max($currentPage - 1, 1) ?>)"
      >
        &laquo; Prev
      </button>
      <button
        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded ml-2"
        onclick="goToPage(<?= min($currentPage + 1, $totalPages) ?>)"
      >
        Next &raquo;
      </button>
    </div>
    <div class="text-sm text-gray-600">
      Page <strong><?= $currentPage ?></strong> of <strong><?= $totalPages ?></strong>
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
function goToPage(pageNumber) {
  alert('Go to page ' + pageNumber);
  // Implement your pagination logic or reload the page with ?page=pageNumber
}
</script>
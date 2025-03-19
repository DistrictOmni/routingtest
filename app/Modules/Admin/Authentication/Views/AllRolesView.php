<div class="mx-auto p-6">

    <!-- Tabs Navigation -->
    <div class="mb-6 border-b border-gray-200">
      <ul class="flex" id="tabs">
        <li class="mr-1">
          <button
            class="tab-link inline-block py-2 px-4 text-blue-600 font-semibold border-b-2 border-blue-600 focus:outline-none"
            onclick="openTab(event, 'roles')"
          >
            Roles
          </button>
        </li>
        <li class="mr-1">
          <button
            class="tab-link inline-block py-2 px-4 text-gray-500 hover:text-blue-600 border-b-2 border-transparent focus:outline-none"
            onclick="openTab(event, 'permissions')"
          >
            Permissions
          </button>
        </li>
        <li class="mr-1">
          <button
            class="tab-link inline-block py-2 px-4 text-gray-500 hover:text-blue-600 border-b-2 border-transparent focus:outline-none"
            onclick="openTab(event, 'scopes')"
          >
            Scopes
          </button>
        </li>
      </ul>
    </div>
  
    <!-- Tab Content Wrapper -->
    <div>
  
<!-- ROLES TAB CONTENT -->
<div id="roles" class="tab-content">
  <div class="mb-4">
    <h3 class="text-xl font-semibold text-gray-700">Roles Overview</h3>
    <p class="text-sm text-gray-600">
      Roles are derived from predefined base roles. They determine which features a user can access, such as viewing or editing information about students, staff, and more.
    </p>
  </div>
  
  <!-- Action Bar: Search, Scope Filter, and Add/Delete Buttons -->
  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
    <div class="mb-2 sm:mb-0 sm:mr-2 w-full sm:w-1/3">
      <input
        type="text"
        placeholder="Search Roles..."
        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-200"
        onkeyup="filterTable(event, 'rolesTable')"
      >
    </div>

    <div class="mb-2 sm:mb-0 sm:mr-2 w-full sm:w-1/4">
      <select
        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-200"
        onchange="filterScope(event, 'rolesTable')"
      >
        <option value="">Scope: All</option>
        <option value="District">District</option>
        <option value="Alta High School">Alta High School</option>
        <option value="Blackcomb High School">Blackcomb High School</option>
        <option value="Blackwater High School">Blackwater High School</option>
      </select>
    </div>

    <div class="flex gap-2">
      <a
        href="/admin/auth/roles/new"
        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded inline-flex items-center"
      >
        Add Role +
      </a>
    </div>
  </div>

  <!-- Roles Table -->
  <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
    <table class="min-w-full text-left table-auto" id="rolesTable">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2 border-b border-gray-300">Role Name</th>
          <th class="px-4 py-2 border-b border-gray-300">Short Name</th>
          <th class="px-4 py-2 border-b border-gray-300">Scope</th>
          <th class="px-4 py-2 border-b border-gray-300">Base Role</th>
          <th class="px-4 py-2 border-b border-gray-300">Status</th>
        </tr>
      </thead>
      <tbody class="bg-white">
        <tr class="hover:bg-gray-50 cursor-pointer">
          <td class="px-4 py-2 border-b border-gray-200">
            <a href="#" class="text-blue-600 hover:underline">Administrator</a>
          </td>
          <td class="px-4 py-2 border-b border-gray-200">Admin</td>
          <td class="px-4 py-2 border-b border-gray-200">District</td>
          <td class="px-4 py-2 border-b border-gray-200">
            <a href="#" class="text-blue-600 hover:underline">District Administrator</a>
          </td>
          <td class="px-4 py-2 border-b border-gray-200">
  <span class="inline-block px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full">
    Active
  </span>
</td>

        </tr>
        <tr class="bg-gray-50 hover:bg-gray-100 cursor-pointer">
          <td class="px-4 py-2 border-b border-gray-200">
            <a href="#" class="text-blue-600 hover:underline">Counselor - Alta High School</a>
          </td>
          <td class="px-4 py-2 border-b border-gray-200">Counselor - Alta High</td>
          <td class="px-4 py-2 border-b border-gray-200">Alta High School</td>
          <td class="px-4 py-2 border-b border-gray-200">
            <a href="#" class="text-blue-600 hover:underline">School Counselor</a>
          </td>
          <td class="px-4 py-2 border-b border-gray-200">
  <span class="inline-block px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full">
    Active
  </span>
</td>

        </tr>
        <tr class="hover:bg-gray-50 cursor-pointer">
          <td class="px-4 py-2 border-b border-gray-200">
            <a href="#" class="text-blue-600 hover:underline">Counselor - Blackcomb High School</a>
          </td>
          <td class="px-4 py-2 border-b border-gray-200">Counselor - Blackcomb</td>
          <td class="px-4 py-2 border-b border-gray-200">Blackcomb High School</td>
          <td class="px-4 py-2 border-b border-gray-200">
            <a href="#" class="text-blue-600 hover:underline">School Counselor</a>
          </td>
          <td class="px-4 py-2 border-b border-gray-200">
  <span class="inline-block px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full">
    Active
  </span>
</td>

        </tr>
        <!-- More rows can be added here -->
      </tbody>
    </table>
  </div>
</div>

<!-- Minimal JavaScript for Table Filters and Actions -->
<script>
  // Function to toggle all checkboxes
  function toggleSelectAll(event) {
    const checkboxes = document.querySelectorAll('.checkbox-item');
    checkboxes.forEach(checkbox => {
      checkbox.checked = event.target.checked;
    });
  }

  // Function to filter roles by scope
  function filterScope(event, tableId) {
    const filterValue = event.target.value.toLowerCase();
    const table = document.getElementById(tableId);
    const rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) {
      const scopeCell = rows[i].cells[3];
      if (scopeCell) {
        const scopeText = scopeCell.textContent.toLowerCase();
        if (scopeText.indexOf(filterValue) > -1 || filterValue === "") {
          rows[i].style.display = '';
        } else {
          rows[i].style.display = 'none';
        }
      }
    }
  }

  // Function to filter table based on search query
  function filterTable(event, tableId) {
    const filterValue = event.target.value.toLowerCase();
    const table = document.getElementById(tableId);
    const rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) {
      const rowText = rows[i].textContent.toLowerCase();
      if (rowText.indexOf(filterValue) > -1) {
        rows[i].style.display = '';
      } else {
        rows[i].style.display = 'none';
      }
    }
  }
</script>



  
      <!-- PERMISSIONS TAB CONTENT -->
      <div id="permissions" class="hidden tab-content">
        <div class="mb-4">
          <h3 class="text-xl font-semibold text-gray-700">Module Permissions</h3>
          <p class="text-sm text-gray-600">
            Module permissions define what actions a role can take. Permissions can range from viewing data to editing or deleting it. You can assign permission types such as "View", "Edit", and "Delete".
          </p>
        </div>
  
        <!-- Action Bar: Search and Add -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
          <div class="mb-2 sm:mb-0 sm:mr-2 w-full sm:w-1/3">
            <input
              type="text"
              placeholder="Search Permissions..."
              class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-200"
              onkeyup="filterTable(event, 'permissionsTable')"
            >
          </div>
  
          <div>
            <a
              href="#"
              class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded inline-flex items-center"
            >
              Add Permission +
            </a>
          </div>
        </div>
  
        <!-- Permissions Table -->
        <div class="overflow-x-auto bg-white rounded shadow">
          <table class="min-w-full text-left table-auto" id="permissionsTable">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2 border-b border-gray-200">Permission Name</th>
                <th class="px-4 py-2 border-b border-gray-200">Description</th>
                <th class="px-4 py-2 border-b border-gray-200">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 border-b border-gray-100">View Student Data</td>
                <td class="px-4 py-2 border-b border-gray-100">Grants the ability to view student information.</td>
                <td class="px-4 py-2 border-b border-gray-100">
                  <a href="#" class="text-blue-600 hover:underline">Edit</a>
                </td>
              </tr>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 border-b border-gray-100">Edit Student Data</td>
                <td class="px-4 py-2 border-b border-gray-100">Allows the user to edit student details.</td>
                <td class="px-4 py-2 border-b border-gray-100">
                  <a href="#" class="text-blue-600 hover:underline">Edit</a>
                </td>
              </tr>
              <!-- More permissions can be added here -->
            </tbody>
          </table>
        </div>
      </div>
  
      <!-- SCOPES TAB CONTENT -->
      <div id="scopes" class="hidden tab-content">
        <div class="mb-4">
          <h3 class="text-xl font-semibold text-gray-700">Scopes Overview</h3>
          <p class="text-sm text-gray-600">
            Scopes define the level of access to data. A scope can be district-wide or specific to a school. It determines which data a user can access based on their role.
          </p>
        </div>
  
        <!-- Action Bar: Search and Add -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
          <div class="mb-2 sm:mb-0 sm:mr-2 w-full sm:w-1/3">
            <input
              type="text"
              placeholder="Search Scopes..."
              class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-200"
              onkeyup="filterTable(event, 'scopesTable')"
            >
          </div>
  
          <div>
            <a
              href="#"
              class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded inline-flex items-center"
            >
              Add Scope +
            </a>
          </div>
        </div>
  
        <!-- Scopes Table -->
        <div class="overflow-x-auto bg-white rounded shadow">
          <table class="min-w-full text-left table-auto" id="scopesTable">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2 border-b border-gray-200">Scope Name</th>
                <th class="px-4 py-2 border-b border-gray-200">Description</th>
                <th class="px-4 py-2 border-b border-gray-200">Assigned Roles</th>
                <th class="px-4 py-2 border-b border-gray-200">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 border-b border-gray-100">District-wide</td>
                <td class="px-4 py-2 border-b border-gray-100">Access to all data across the entire district.</td>
                <td class="px-4 py-2 border-b border-gray-100">Admin, Teacher, Health Professional</td>
                <td class="px-4 py-2 border-b border-gray-100">
                  <a href="#" class="text-blue-600 hover:underline">Edit</a>
                </td>
              </tr>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 border-b border-gray-100">Specific School</td>
                <td class="px-4 py-2 border-b border-gray-100">Access to data for a specific school within the district.</td>
                <td class="px-4 py-2 border-b border-gray-100">School Admin, Secretary</td>
                <td class="px-4 py-2 border-b border-gray-100">
                  <a href="#" class="text-blue-600 hover:underline">Edit</a>
                </td>
              </tr>
              <!-- More scopes can be added here -->
            </tbody>
          </table>
        </div>
      </div>
  
    </div>
  
    <!-- Minimal JavaScript to handle tab switching and simple table filtering -->
    <script>
      function openTab(event, tabId) {
        // Hide all tab contents
        const tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach((content) => {
          content.classList.add('hidden');
        });
  
        // Remove active styles from all tab links
        const tabLinks = document.querySelectorAll('.tab-link');
        tabLinks.forEach((link) => {
          link.classList.remove('text-blue-600', 'font-semibold', 'border-blue-600');
          link.classList.add('text-gray-500', 'border-transparent');
        });
  
        // Show the selected tab content
        document.getElementById(tabId).classList.remove('hidden');
  
        // Add active styles to the clicked tab link
        event.currentTarget.classList.remove('text-gray-500', 'border-transparent');
        event.currentTarget.classList.add('text-blue-600', 'font-semibold', 'border-blue-600');
      }
  
      function filterTable(event, tableId) {
        const filterValue = event.target.value.toLowerCase();
        const table = document.getElementById(tableId);
        const rows = table.getElementsByTagName('tr');
  
        // Loop through all rows (except thead) and hide those that don't match the query
        for (let i = 1; i < rows.length; i++) {
          const rowText = rows[i].textContent.toLowerCase();
          // If the row text includes the filterValue, show it; otherwise, hide it
          if (rowText.indexOf(filterValue) > -1) {
            rows[i].style.display = '';
          } else {
            rows[i].style.display = 'none';
          }
        }
      }
    </script>
    </div>
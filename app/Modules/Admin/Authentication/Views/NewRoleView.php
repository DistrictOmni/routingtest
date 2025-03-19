<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Create New Role</h3>
        
        <form action="/roles/new" method="POST" class="space-y-6">
           <!-- General Section -->
<div class="space-y-4">
    <h4 class="text-lg font-semibold text-gray-600">General</h4>

  <!-- Base Role Checkbox -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">

  <!-- Base Role Dropdown (visible when checkbox is unchecked) -->
  <div class="mt-4 grid grid-cols-1 gap-4">
    <div id="base-role-dropdown" class="col-span-1">
      <label for="role" class="block text-sm font-medium text-gray-600">Base Role</label>
      <select id="role" name="role" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="School Counselor">School Counselor</option>
        <option value="District Administrator">District Administrator</option>
        <option value="Teacher">Teacher</option>
        <!-- Add more roles as needed -->
      </select>
      <p class="text-xs text-gray-500">Choose the role to assign for the user. This dropdown will be hidden if "Base Role" is checked.</p>
    </div>
  </div>

  
  <div>
    <div class="flex items-center">
      <input type="checkbox" id="base_role" name="base_role" class="h-5 w-5 text-blue-500 border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
      <label for="base_role" class="ml-2 text-sm font-medium text-gray-600">Base Role</label>
    </div>

    <!-- Help Text for Base Role -->
    <p class="text-xs text-gray-500">Check this box if the selected role should be a base role.</p>
  </div>
</div>

<script>
  // Get the checkbox and dropdown elements
  const baseRoleCheckbox = document.getElementById('base_role');
  const roleDropdown = document.getElementById('role');

  // Function to toggle the 'disabled' state of the dropdown
  function toggleDropdown() {
    if (baseRoleCheckbox.checked) {
      // Disable the dropdown and clear the selection
      roleDropdown.disabled = true;
      roleDropdown.value = ""; // Clears the selected value
    } else {
      // Enable the dropdown
      roleDropdown.disabled = false;
    }
  }

  // Add event listener to the checkbox to call toggleDropdown on change
  baseRoleCheckbox.addEventListener('change', toggleDropdown);

  // Initialize the dropdown state on page load
  toggleDropdown();
</script>


    <!-- Role Description and Short Name in Two Columns -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Role Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
            <input type="text" id="description" name="description" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter role description">
            <p class="text-xs text-gray-500">Provide a brief description for this role.</p>
        </div>

        <!-- Short Name -->
        <div>
            <label for="short_name" class="block text-sm font-medium text-gray-600">Short Name</label>
            <input type="text" id="short_name" name="short_name" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter short name">
            <p class="text-xs text-gray-500">Enter a short name or abbreviation for the role.</p>
        </div>
    </div>

    <!-- Scope Section in Two Columns -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Scope -->
        <div>
            <label for="scope" class="block text-sm font-medium text-gray-600">Scope</label>
            <select id="scope" name="scope" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="District">District</option>
                <option value="School">School</option>
                <!-- Add more scope options here -->
            </select>
            <p class="text-xs text-gray-500">Select the scope of the role (District or School-specific).</p>
        </div>
    </div>
</div>

            <!-- Permissions Section -->
            <div class="space-y-4">
                <h4 class="text-lg font-semibold text-gray-600">Permissions</h4>
                <?php
// Assuming permissions.json holds the structure from above
$permissionsData = json_decode(file_get_contents('PermissionCatalog.json'), true);
?>

<div class="container mx-auto mt-6 p-4">
<table id="permissions-table" class="w-full bg-white border border-gray-300 rounded-lg text-sm">
<thead>
        <tr class="bg-gray-200 text-gray-700">
            <th class="px-3 py-2 border-b border-gray-200 text-left w-3/4">Permission Name</th>
            <th class="px-3 py-2 border-b border-gray-200 text-left w-1/4">Access</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($permissionsData as $category => $permissions): ?>
            <tr class="group">
                <td class="py-2 px-3 border-b border-gray-200 font-bold cursor-pointer btn-collapse text-blue-600 hover:bg-gray-200" colspan="2" onclick="toggleGroup('<?php echo strtolower(str_replace(' ', '-', $category)); ?>')">
                    <span id="<?php echo strtolower(str_replace(' ', '-', $category)); ?>-toggle">+</span> <?php echo $category; ?>
                </td>
            </tr>
            <?php foreach ($permissions as $permission): ?>
                <tr class="<?php echo strtolower(str_replace(' ', '-', $category)); ?> hidden">
                    <td class="pl-10 py-2 px-3 border-b border-gray-200 text-left"><?php echo $permission['permission_name']; ?></td>
                    <td class="border-b border-gray-200 text-left">
                        <select class="bg-gray-100 border border-gray-300 p-1 rounded w-full">
                            <?php foreach ($permission['options'] as $option): ?>
                                <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>

                    <p class="text-xs text-gray-500 mt-2">Search and filter through the permissions.</p>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-md">
                    Create Role
                </button>
            </div>
        </form>
    </div>

    
<script>
    function toggleGroup(group) {
        const groupRows = document.querySelectorAll(`.${group}`);
        const toggleButton = document.getElementById(`${group}-toggle`);
        
        groupRows.forEach(row => {
            row.classList.toggle('hidden');
        });

        if (toggleButton.innerText === '+') {
            toggleButton.innerText = '-';
        } else {
            toggleButton.innerText = '+';
        }
    }
</script>
<!-- Outer container: max width, centered, with some padding -->
<div class="max-w-7xl mx-auto p-6 space-y-8">
    <!-- First row: User Details and Session Data -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- USER DETAILS -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Current User Details</h2>
            <span class="block mb-4 text-sm text-gray-500">(Values from auth_users Table)</span>
            <table class="w-full border-collapse">
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <th class="text-left px-4 py-2 font-medium text-gray-700 w-1/3">
                            User ID
                        </th>
                        <td class="px-4 py-2 text-gray-900">
                            <?= htmlspecialchars($user->id ?? '') ?>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="text-left px-4 py-2 font-medium text-gray-700">District ID</th>
                        <td class="px-4 py-2 text-gray-900">
                            <?= htmlspecialchars($user->district_id ?? '') ?>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="text-left px-4 py-2 font-medium text-gray-700">Email</th>
                        <td class="px-4 py-2 text-gray-900">
                            <?= htmlspecialchars($user->email ?? '') ?>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="text-left px-4 py-2 font-medium text-gray-700">Display Name</th>
                        <td class="px-4 py-2 text-gray-900">
                            <?= htmlspecialchars($user->display_name ?? '') ?>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="text-left px-4 py-2 font-medium text-gray-700">Full Name</th>
                        <td class="px-4 py-2 text-gray-900">
                            <?= htmlspecialchars($user->full_name ?? '') ?>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="text-left px-4 py-2 font-medium text-gray-700">Initials</th>
                        <td class="px-4 py-2 text-gray-900">
                            <?= htmlspecialchars($user->initials ?? '') ?>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="text-left px-4 py-2 font-medium text-gray-700">Profile</th>
                        <td class="px-4 py-2 text-gray-900">
                            <?= htmlspecialchars($user->profile ?? '') ?>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="text-left px-4 py-2 font-medium text-gray-700">Last Login</th>
                        <td class="px-4 py-2 text-gray-900">
                            <?= htmlspecialchars($user->last_login ?? '') ?>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="text-left px-4 py-2 font-medium text-gray-700">Failed Logins</th>
                        <td class="px-4 py-2 text-gray-900">
                            <?= htmlspecialchars($user->failed_login ?? '') ?>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="text-left px-4 py-2 font-medium text-gray-700">Status</th>
                        <td class="px-4 py-2 text-gray-900">
                            <?= htmlspecialchars($user->status ?? '') ?>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="text-left px-4 py-2 font-medium text-gray-700">Created At</th>
                        <td class="px-4 py-2 text-gray-900">
                            <?= htmlspecialchars($user->created_at ?? '') ?>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="text-left px-4 py-2 font-medium text-gray-700">Last Modified</th>
                        <td class="px-4 py-2 text-gray-900">
                            <?= htmlspecialchars($user->updated_at ?? '') ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> <!-- End User Details -->

        <div>
        <!-- SESSION DATA -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Session Data</h2>
            <span class="block mb-4 text-sm text-gray-500">(All values from PHP $_SESSION)</span>

            <?php if (empty($sessionData)): ?>
                <p class="text-gray-600"><em>No session data found.</em></p>
            <?php else: ?>
                <table class="w-full border-collapse">
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($sessionData as $key => $value): ?>
                            <tr class="hover:bg-gray-50">
                                <th class="text-left px-4 py-2 font-medium text-gray-700 w-1/3">
                                    <?= htmlspecialchars($key) ?>
                                </th>
                                <td class="px-4 py-2 text-gray-900">
                                    <?php
                                    // If the value is an array or object, convert to JSON for display
                                    if (is_array($value) || is_object($value)) {
                                        echo htmlspecialchars(json_encode($value, JSON_PRETTY_PRINT));
                                    } else {
                                        echo htmlspecialchars($value ?? '');
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div> <!-- End Session Data -->
<!-- COOKIE DATA -->
<div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Cookie Data</h2>
            <span class="block mb-4 text-sm text-gray-500">(All values from PHP $_COOKIE)</span>

            <?php if (empty($cookies)): ?>
                <p class="text-gray-600"><em>No cookies found.</em></p>
            <?php else: ?>
                <table class="w-full border-collapse">
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($cookies as $key => $value): ?>
                            <tr class="hover:bg-gray-50">
                                <th class="text-left px-4 py-2 font-medium text-gray-700 w-1/3">
                                    <?= htmlspecialchars($key) ?>
                                </th>
                                <td class="px-4 py-2 text-gray-900">
                                    <?php
                                    // If the value is an array or object, convert to JSON for display
                                    if (is_array($value) || is_object($value)) {
                                        echo htmlspecialchars(json_encode($value, JSON_PRETTY_PRINT));
                                    } else {
                                        echo htmlspecialchars($value ?? '');
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div> <!-- End Cookie Data -->
        <!-- Modules Card -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Modules You Can Access</h2>

    <?php if ($accessibleModules->isEmpty()): ?>
        <p class="text-gray-600">You don’t have access to any modules.</p>
    <?php else: ?>
        <ul class="list-disc list-inside space-y-2">
            <?php foreach ($accessibleModules as $mod): ?>
                <li>
                    <!-- Example: show the module's name, or link to it -->
                    <?= htmlspecialchars($mod->name ?? 'Unnamed Module') ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

        </div>

    </div> <!-- End Grid Row -->

    <!-- Second row: Cookie Data and Roles & Permissions -->
        

        <!-- USER ROLES & PERMISSIONS -->
        <div x-data="{ openIndex: null }" class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">User Roles &amp; Permissions</h2>
            <?php if ($roles->isEmpty()): ?>
                <p class="text-gray-600">No roles assigned.</p>
            <?php else: ?>
                <table class="w-full border-collapse">
                    <thead class="text-left bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 font-semibold text-gray-700">ID</th>
                            <th class="px-4 py-2 font-semibold text-gray-700">Name</th>
                            <th class="px-4 py-2 font-semibold text-gray-700">Is Custom</th>
                            <th class="px-4 py-2 font-semibold text-gray-700">Guard Name</th>
                            <th class="px-4 py-2 font-semibold text-gray-700">Base Role</th>
                            <th class="px-4 py-2 font-semibold text-gray-700">Status</th>
                            <th class="px-4 py-2 font-semibold text-gray-700">Created At</th>
                            <th class="px-4 py-2 font-semibold text-gray-700">Updated At</th>
                            <th class="px-4 py-2 font-semibold text-gray-700">Description</th>
                            <th class="px-4 py-2 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($roles as $index => $role): ?>
                            <!-- Role Row -->
                            <tr 
                                class="hover:bg-gray-50 transition-colors cursor-pointer"
                                @click="openIndex === <?= $index ?> ? openIndex = null : openIndex = <?= $index ?>"
                            >
                                <td class="px-4 py-2"><?= htmlspecialchars($role->id ?? '') ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($role->name ?? '') ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($role->is_custom ?? '') ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($role->guard_name ?? '') ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($role->base_role_id ?? '') ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($role->status ?? '') ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($role->created_at ?? '') ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($role->updated_at ?? '') ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($role->description ?? '') ?></td>
                                <td class="px-4 py-2 text-blue-600 underline">
                                    <span x-show="openIndex !== <?= $index ?>">Show Permissions ▼</span>
                                    <span x-show="openIndex === <?= $index ?>">Hide Permissions ▲</span>
                                </td>
                            </tr>

                            <!-- Expanded Permissions Row -->
                            <tr x-show="openIndex === <?= $index ?>" x-collapse>
                                <td colspan="10" class="bg-gray-50">
                                    <?php 
                                        $permissions = $role->permissions ?? collect(); 
                                        if ($permissions->isEmpty()):
                                    ?>
                                        <div class="px-4 py-2 text-gray-600">
                                            No permissions assigned to this role.
                                        </div>
                                    <?php else: ?>
                                        <div class="p-4">
                                            <h3 class="font-semibold mb-2 text-gray-700 text-lg">
                                                Permissions for <?= htmlspecialchars($role->name ?? '') ?>
                                            </h3>
                                            <table class="w-full border-collapse text-sm">
                                                <thead class="bg-gray-100">
                                                    <tr>
                                                        <th class="px-2 py-1 font-semibold text-gray-600">Name</th>
                                                        <th class="px-2 py-1 font-semibold text-gray-600">Module</th>
                                                        <th class="px-2 py-1 font-semibold text-gray-600">Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200">
                                                    <?php foreach ($permissions as $perm): ?>
                                                        <tr class="hover:bg-gray-50">
                                                            <?php 
                                                                // Convert snake_case to Title Case for display
                                                                $permissionNameUI = $perm->name ?? '';
                                                                $permissionNameUI = ucwords(str_replace('_', ' ', $permissionNameUI));
                                                            ?>
                                                            <td class="px-2 py-1"><?= htmlspecialchars($permissionNameUI) ?></td>
                                                            <td class="px-2 py-1">  <?= htmlspecialchars($perm->module->name ?? 'N/A') ?>
                                                            </td>
                                                            <td class="px-2 py-1"><?= htmlspecialchars($perm->description ?? '') ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div> <!-- End Roles & Permissions -->
</div>

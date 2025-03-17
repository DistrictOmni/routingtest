<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Custom App Store</h1>
    <p class="text-gray-600">
      Browse, install, and manage custom applications or integrations for your district's SIS platform.
      This store allows you to enhance functionality and connect with external services.
    </p>
  </header>

  <!-- Installed Apps Section -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Installed Applications</h2>
    <div class="bg-white rounded shadow p-6">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">App Name</th>
            <th class="p-3 text-left font-semibold">Version</th>
            <th class="p-3 text-left font-semibold">Status</th>
            <th class="p-3 text-left font-semibold">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Example Row 1 -->
          <tr>
            <td class="p-3 font-medium">Zoom Integration</td>
            <td class="p-3">v4.2.1</td>
            <td class="p-3 text-green-600">Active</td>
            <td class="p-3">
              <button class="bg-gray-600 text-white px-3 py-1 rounded text-xs hover:bg-gray-700">
                Disable
              </button>
              <button class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">
                Uninstall
              </button>
            </td>
          </tr>
          <!-- Example Row 2 -->
          <tr>
            <td class="p-3 font-medium">Gradebook Sync</td>
            <td class="p-3">v1.0.0</td>
            <td class="p-3 text-yellow-600">Inactive</td>
            <td class="p-3">
              <button class="bg-green-600 text-white px-3 py-1 rounded text-xs hover:bg-green-700">
                Enable
              </button>
              <button class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">
                Uninstall
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="mt-4">
        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
          Browse App Store
        </button>
      </div>
    </div>
  </section>
</div>

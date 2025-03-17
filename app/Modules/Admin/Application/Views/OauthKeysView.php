<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">OAuth API Keys</h1>
    <p class="text-gray-600">
      Manage OAuth keys for API authentication. Create, revoke, or regenerate OAuth credentials used for connecting external services securely.
    </p>
  </header>

  <!-- OAuth Keys Section -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">OAuth Keys</h2>
    <div class="bg-white rounded shadow p-6">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Key Name</th>
            <th class="p-3 text-left font-semibold">Creation Date</th>
            <th class="p-3 text-left font-semibold">Status</th>
            <th class="p-3 text-left font-semibold">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Example Row 1 -->
          <tr>
            <td class="p-3 font-medium">API Key 1</td>
            <td class="p-3">2023-07-15</td>
            <td class="p-3 text-green-600">Active</td>
            <td class="p-3">
              <button class="bg-yellow-600 text-white px-3 py-1 rounded text-xs hover:bg-yellow-700">
                Regenerate
              </button>
              <button class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">
                Revoke
              </button>
            </td>
          </tr>
          <!-- Example Row 2 -->
          <tr>
            <td class="p-3 font-medium">API Key 2</td>
            <td class="p-3">2023-08-01</td>
            <td class="p-3 text-yellow-600">Pending</td>
            <td class="p-3">
              <button class="bg-yellow-600 text-white px-3 py-1 rounded text-xs hover:bg-yellow-700">
                Regenerate
              </button>
              <button class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">
                Revoke
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="mt-4">
        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
          Create New Key
        </button>
      </div>
    </div>
  </section>
</div>

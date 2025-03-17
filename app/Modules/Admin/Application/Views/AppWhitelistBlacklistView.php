<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Application Whitelist/Blacklist</h1>
    <p class="text-gray-600">
      Manage which applications are allowed or blocked from interacting with the system.
      The whitelist includes trusted applications, while the blacklist blocks potentially harmful or unauthorized applications.
    </p>
  </header>

  <!-- Whitelist Section -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Trusted Applications (Whitelist)</h2>
    <div class="bg-white rounded shadow p-6">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Application Name</th>
            <th class="p-3 text-left font-semibold">Domain</th>
            <th class="p-3 text-left font-semibold">Last Verified</th>
            <th class="p-3 text-left font-semibold">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Row 1: Example App -->
          <tr>
            <td class="p-3 font-medium">Google Workspace</td>
            <td class="p-3">google.com</td>
            <td class="p-3">2023-08-25</td>
            <td class="p-3">
              <button class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">
                Remove from Whitelist
              </button>
            </td>
          </tr>
          <!-- Row 2: Example App -->
          <tr>
            <td class="p-3 font-medium">Canvas LMS</td>
            <td class="p-3">instructure.com</td>
            <td class="p-3">2023-09-01</td>
            <td class="p-3">
              <button class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">
                Remove from Whitelist
              </button>
            </td>
          </tr>
          <!-- More rows as needed -->
        </tbody>
      </table>
      <div class="mt-4">
        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
          Add Application to Whitelist
        </button>
      </div>
    </div>
  </section>

  <!-- Blacklist Section -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Blocked Applications (Blacklist)</h2>
    <div class="bg-white rounded shadow p-6">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Application Name</th>
            <th class="p-3 text-left font-semibold">Domain</th>
            <th class="p-3 text-left font-semibold">Reason</th>
            <th class="p-3 text-left font-semibold">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Row 1: Example App -->
          <tr>
            <td class="p-3 font-medium">Example App 1</td>
            <td class="p-3">example1.com</td>
            <td class="p-3">Suspicious activity detected</td>
            <td class="p-3">
              <button class="bg-green-600 text-white px-3 py-1 rounded text-xs hover:bg-green-700">
                Remove from Blacklist
              </button>
            </td>
          </tr>
          <!-- Row 2: Example App -->
          <tr>
            <td class="p-3 font-medium">Example App 2</td>
            <td class="p-3">example2.com</td>
            <td class="p-3">Failed security checks</td>
            <td class="p-3">
              <button class="bg-green-600 text-white px-3 py-1 rounded text-xs hover:bg-green-700">
                Remove from Blacklist
              </button>
            </td>
          </tr>
          <!-- More rows as needed -->
        </tbody>
      </table>
      <div class="mt-4">
        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
          Add Application to Blacklist
        </button>
      </div>
    </div>
  </section>
</div>

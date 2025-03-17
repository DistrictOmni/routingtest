ConsentManagementView<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Consent Management</h1>
    <p class="text-gray-600">
      Manage and track user consent for various data processing activities. Comply with privacy laws and regulations like GDPR and CCPA by collecting and auditing user consent for data usage.
    </p>
  </header>

  <!-- Consent Forms -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Consent Forms</h2>
    <div class="bg-white rounded shadow p-6">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Form Name</th>
            <th class="p-3 text-left font-semibold">Last Updated</th>
            <th class="p-3 text-left font-semibold">Status</th>
            <th class="p-3 text-left font-semibold">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Example Row 1 -->
          <tr>
            <td class="p-3 font-medium">GDPR Consent Form</td>
            <td class="p-3">2023-08-15</td>
            <td class="p-3 text-green-600">Active</td>
            <td class="p-3">
              <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
                Edit
              </button>
              <button class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">
                Archive
              </button>
            </td>
          </tr>
          <!-- Example Row 2 -->
          <tr>
            <td class="p-3 font-medium">CCPA Consent Form</td>
            <td class="p-3">2023-07-20</td>
            <td class="p-3 text-yellow-600">Pending Review</td>
            <td class="p-3">
              <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
                Edit
              </button>
              <button class="bg-gray-600 text-white px-3 py-1 rounded text-xs hover:bg-gray-700">
                Review
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Consent Logs -->
  <section>
    <h2 class="text-2xl font-bold mb-4">Consent Logs</h2>
    <div class="bg-white rounded shadow p-6">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Timestamp</th>
            <th class="p-3 text-left font-semibold">User</th>
            <th class="p-3 text-left font-semibold">Consent Type</th>
            <th class="p-3 text-left font-semibold">Status</th>
            <th class="p-3 text-left font-semibold">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Example Row 1 -->
          <tr>
            <td class="p-3">2023-08-25 02:15 PM</td>
            <td class="p-3">john.doe@school.org</td>
            <td class="p-3">GDPR</td>
            <td class="p-3 text-green-600">Accepted</td>
            <td class="p-3">
              <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
                View Details
              </button>
            </td>
          </tr>
          <!-- Example Row 2 -->
          <tr>
            <td class="p-3">2023-08-23 11:30 AM</td>
            <td class="p-3">jane.doe@school.org</td>
            <td class="p-3">CCPA</td>
            <td class="p-3 text-red-600">Declined</td>
            <td class="p-3">
              <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
                View Details
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</div>

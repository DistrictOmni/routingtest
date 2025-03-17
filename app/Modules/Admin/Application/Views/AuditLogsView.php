<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Audit Logs</h1>
    <p class="text-gray-600">
      Review the full history of system actions, including user logins, configurations, data changes, and more.
      Audit logs are crucial for tracking administrative activities and maintaining security.
    </p>
  </header>

  <!-- Filters -->
  <section class="mb-8">
    <h2 class="text-2xl font-bold mb-4">Filter Logs</h2>
    <div class="bg-white rounded shadow p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
      <div>
        <label class="block text-sm font-medium mb-1" for="logType">Log Type</label>
        <select
          id="logType"
          class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
        >
          <option value="">All</option>
          <option value="login">Login Attempts</option>
          <option value="config">Configuration Changes</option>
          <option value="data">Data Modifications</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium mb-1" for="dateRange">Date Range</label>
        <input
          type="date"
          id="startDate"
          class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300 mb-3"
        />
        <input
          type="date"
          id="endDate"
          class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
        />
      </div>
      <div>
        <label class="block text-sm font-medium mb-1" for="userFilter">User</label>
        <input
          id="userFilter"
          type="text"
          placeholder="Search by username"
          class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
        />
      </div>
    </div>
  </section>

  <!-- Logs Table -->
  <section>
    <h2 class="text-2xl font-bold mb-4">Audit Logs</h2>
    <div class="bg-white rounded shadow p-6">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Timestamp</th>
            <th class="p-3 text-left font-semibold">User</th>
            <th class="p-3 text-left font-semibold">Action</th>
            <th class="p-3 text-left font-semibold">Details</th>
            <th class="p-3 text-left font-semibold">IP Address</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Example Row 1 -->
          <tr>
            <td class="p-3">2023-08-29 10:20 AM</td>
            <td class="p-3">Admin</td>
            <td class="p-3">Login Attempt</td>
            <td class="p-3">Successful login to Dashboard</td>
            <td class="p-3">192.168.1.100</td>
          </tr>
          <!-- Example Row 2 -->
          <tr>
            <td class="p-3">2023-08-29 11:00 AM</td>
            <td class="p-3">JaneDoe</td>
            <td class="p-3">Configuration Change</td>
            <td class="p-3">Updated email notification settings</td>
            <td class="p-3">192.168.2.200</td>
          </tr>
          <!-- More rows as needed -->
        </tbody>
      </table>
    </div>
  </section>
</div>

<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Data Synchronization</h1>
    <p class="text-gray-600">
      Manage and monitor the synchronization of data between your SIS platform and external systems (e.g., district, state databases).
      Ensure data integrity and consistency with scheduled sync tasks.
    </p>
  </header>

  <!-- Sync Status -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Current Sync Status</h2>
    <div class="bg-white rounded shadow p-6">
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Last Sync -->
        <div>
          <h3 class="text-lg font-semibold mb-2">Last Sync</h3>
          <p class="text-xl font-bold">2023-09-01 02:30 AM</p>
          <p class="text-sm text-gray-500">Completed successfully</p>
        </div>
        <!-- Next Sync -->
        <div>
          <h3 class="text-lg font-semibold mb-2">Next Sync</h3>
          <p class="text-xl font-bold">2023-09-02 02:30 AM</p>
          <p class="text-sm text-gray-500">Scheduled for tonight</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Sync Logs -->
  <section>
    <h2 class="text-2xl font-bold mb-4">Sync Logs</h2>
    <div class="bg-white rounded shadow p-6">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Timestamp</th>
            <th class="p-3 text-left font-semibold">Source</th>
            <th class="p-3 text-left font-semibold">Status</th>
            <th class="p-3 text-left font-semibold">Details</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Example Row 1 -->
          <tr>
            <td class="p-3">2023-08-29 03:00 AM</td>
            <td class="p-3">State Database</td>
            <td class="p-3 text-green-600">Success</td>
            <td class="p-3">Updated student records</td>
          </tr>
          <!-- Example Row 2 -->
          <tr>
            <td class="p-3">2023-08-29 10:15 PM</td>
            <td class="p-3">External API</td>
            <td class="p-3 text-yellow-600">Warning</td>
            <td class="p-3">Partial sync (some records skipped)</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</div>

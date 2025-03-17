<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Bounce & Spam Tracking</h1>
    <p class="text-gray-600">
      Track and manage email bounces and spam complaints. See detailed logs and troubleshoot issues to improve
      deliverability. This section provides a real-time view of email reputation.
    </p>
  </header>

  <!-- Bounce Rate Metrics -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Bounce Rate & Statistics</h2>
    <div class="bg-white rounded shadow p-6">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Bounces -->
        <div class="bg-gray-100 rounded shadow p-4">
          <h3 class="text-lg font-semibold mb-2">Total Bounces</h3>
          <p class="text-3xl font-bold">42</p>
          <p class="text-sm text-gray-500">Last 24 hours</p>
        </div>
        <!-- Bounce Rate -->
        <div class="bg-gray-100 rounded shadow p-4">
          <h3 class="text-lg font-semibold mb-2">Bounce Rate</h3>
          <p class="text-3xl font-bold">1.5%</p>
          <p class="text-sm text-gray-500">Of total emails sent</p>
        </div>
        <!-- Spam Complaints -->
        <div class="bg-gray-100 rounded shadow p-4">
          <h3 class="text-lg font-semibold mb-2">Spam Complaints</h3>
          <p class="text-3xl font-bold">3</p>
          <p class="text-sm text-gray-500">Last 24 hours</p>
        </div>
        <!-- Delivered Emails -->
        <div class="bg-gray-100 rounded shadow p-4">
          <h3 class="text-lg font-semibold mb-2">Delivered Emails</h3>
          <p class="text-3xl font-bold">2,800</p>
          <p class="text-sm text-gray-500">Last 24 hours</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Bounce Logs -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Bounce Logs</h2>
    <div class="bg-white rounded shadow p-6">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Timestamp</th>
            <th class="p-3 text-left font-semibold">Email</th>
            <th class="p-3 text-left font-semibold">Error</th>
            <th class="p-3 text-left font-semibold">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Example Row 1 -->
          <tr>
            <td class="p-3">2023-08-29 09:05 AM</td>
            <td class="p-3">john.doe@domain.com</td>
            <td class="p-3">Recipient not found (550)</td>
            <td class="p-3">
              <button class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">
                Investigate
              </button>
            </td>
          </tr>
          <!-- Example Row 2 -->
          <tr>
            <td class="p-3">2023-08-29 10:00 AM</td>
            <td class="p-3">jane.doe@domain.com</td>
            <td class="p-3">Blocked by recipient's mail server</td>
            <td class="p-3">
              <button class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">
                Investigate
              </button>
            </td>
          </tr>
          <!-- More rows as needed -->
        </tbody>
      </table>
    </div>
  </section>

  <!-- Spam Reports -->
  <section>
    <h2 class="text-2xl font-bold mb-4">Spam Complaints</h2>
    <div class="bg-white rounded shadow p-6">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Timestamp</th>
            <th class="p-3 text-left font-semibold">Email</th>
            <th class="p-3 text-left font-semibold">Complaint</th>
            <th class="p-3 text-left font-semibold">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Example Row 1 -->
          <tr>
            <td class="p-3">2023-08-29 09:30 AM</td>
            <td class="p-3">john.doe@domain.com</td>
            <td class="p-3">Reported as spam by user</td>
            <td class="p-3">
              <button class="bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600">
                Review
              </button>
            </td>
          </tr>
          <!-- Example Row 2 -->
          <tr>
            <td class="p-3">2023-08-29 10:15 AM</td>
            <td class="p-3">jane.doe@domain.com</td>
            <td class="p-3">Marked as spam by multiple users</td>
            <td class="p-3">
              <button class="bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600">
                Review
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</div>

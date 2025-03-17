<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Vendor Risk Management</h1>
    <p class="text-gray-600">
      Monitor and manage risks associated with third-party vendors. Evaluate vendor security, compliance, and performance to ensure that all partners meet the district's requirements.
    </p>
  </header>

  <!-- Vendor Risk Overview -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Vendor Risk Overview</h2>
    <div class="bg-white rounded shadow p-6">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Vendor</th>
            <th class="p-3 text-left font-semibold">Risk Level</th>
            <th class="p-3 text-left font-semibold">Last Evaluation</th>
            <th class="p-3 text-left font-semibold">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Example Row 1 -->
          <tr>
            <td class="p-3 font-medium">Vendor 1</td>
            <td class="p-3 text-yellow-600">Medium</td>
            <td class="p-3">2023-08-10</td>
            <td class="p-3">
              <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
                View Details
              </button>
              <button class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">
                Remove
              </button>
            </td>
          </tr>
          <!-- Example Row 2 -->
          <tr>
            <td class="p-3 font-medium">Vendor 2</td>
            <td class="p-3 text-green-600">Low</td>
            <td class="p-3">2023-08-01</td>
            <td class="p-3">
              <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
                View Details
              </button>
              <button class="bg-yellow-600 text-white px-3 py-1 rounded text-xs hover:bg-yellow-700">
                Reevaluate
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Vendor Evaluation -->
  <section>
    <h2 class="text-2xl font-bold mb-4">Vendor Evaluation</h2>
    <div class="bg-white rounded shadow p-6">
      <form action="#" method="POST" class="space-y-6">
        <div>
          <label class="block text-sm font-medium mb-1" for="vendorName">Vendor Name</label>
          <input
            type="text"
            id="vendorName"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="Enter Vendor Name"
          />
        </div>

        <div>
          <label class="block text-sm font-medium mb-1" for="riskLevel">Risk Level</label>
          <select
            id="riskLevel"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
          </select>
        </div>

        <div>
          <label class="block text-sm font-medium mb-1" for="evaluationDate">Evaluation Date</label>
          <input
            type="date"
            id="evaluationDate"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          />
        </div>

        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
        >
          Save Evaluation
        </button>
      </form>
    </div>
  </section>
</div>

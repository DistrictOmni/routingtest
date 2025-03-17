<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Trend Analysis</h1>
    <p class="text-gray-600">
      Analyze trends and patterns in your system's data. Use this tool to track usage patterns, performance metrics, and other key indicators that inform decision-making.
    </p>
  </header>

  <!-- Trend Analysis Options -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Select Trend to Analyze</h2>
    <div class="bg-white rounded shadow p-6">
      <form action="#" method="POST" class="space-y-6">
        <!-- Trend Type -->
        <div>
          <label class="block text-sm font-medium mb-1" for="trendType">Trend Type</label>
          <select
            id="trendType"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="user_activity">User Activity</option>
            <option value="system_performance">System Performance</option>
            <option value="email_delivery">Email Delivery</option>
          </select>
        </div>

        <!-- Date Range -->
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

        <!-- Generate Trend Report -->
        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
        >
          Generate Report
        </button>
      </form>
    </div>
  </section>

  <!-- Trend Report Results -->
  <section>
    <h2 class="text-2xl font-bold mb-4">Trend Analysis Results</h2>
    <div class="bg-white rounded shadow p-6">
      <p class="text-gray-600">No data available for the selected trend and date range.</p>
    </div>
  </section>
</div>

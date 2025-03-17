<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Outbound Email Policies</h1>
    <p class="text-gray-600">
      Manage policies for sending outbound emails. Set rules for email frequency, recipient limits, and overall email security to ensure compliance.
    </p>
  </header>

  <!-- Policy Settings -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Outbound Email Rules</h2>
    <div class="bg-white rounded shadow p-6">
      <form action="#" method="POST" class="space-y-6">
        <!-- Max Emails per Day -->
        <div>
          <label class="block text-sm font-medium mb-1" for="maxEmailsPerDay">Max Emails per Day</label>
          <input
            type="number"
            id="maxEmailsPerDay"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="5000"
          />
        </div>

        <!-- Max Recipients per Email -->
        <div>
          <label class="block text-sm font-medium mb-1" for="maxRecipientsPerEmail">Max Recipients per Email</label>
          <input
            type="number"
            id="maxRecipientsPerEmail"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="1000"
          />
        </div>

        <!-- Enable Secure Delivery -->
        <div>
          <label class="block text-sm font-medium mb-1" for="secureDelivery">Enable Secure Delivery (TLS)</label>
          <select
            id="secureDelivery"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="enabled">Enabled</option>
            <option value="disabled">Disabled</option>
          </select>
        </div>

        <!-- Save Button -->
        <div>
          <button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
          >
            Save Policies
          </button>
        </div>
      </form>
    </div>
  </section>
</div>

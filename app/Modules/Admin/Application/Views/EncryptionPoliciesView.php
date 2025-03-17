<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Encryption Policies</h1>
    <p class="text-gray-600">
      Configure encryption policies for sensitive data both at rest and in transit. Ensure your institution complies with industry standards for securing student and staff data.
    </p>
  </header>

  <!-- Policy Settings -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Encryption Settings</h2>
    <div class="bg-white rounded shadow p-6">
      <form action="#" method="POST" class="space-y-6">
        <!-- Encryption at Rest -->
        <div>
          <label class="block text-sm font-medium mb-1" for="encryptionRest">Encryption at Rest</label>
          <select
            id="encryptionRest"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="enabled">Enabled</option>
            <option value="disabled">Disabled</option>
          </select>
        </div>

        <!-- Encryption in Transit -->
        <div>
          <label class="block text-sm font-medium mb-1" for="encryptionTransit">Encryption in Transit</label>
          <select
            id="encryptionTransit"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="enabled">Enabled</option>
            <option value="disabled">Disabled</option>
          </select>
        </div>

        <!-- Save Button -->
        <div>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
            Save Policies
          </button>
        </div>
      </form>
    </div>
  </section>
</div>

<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Privacy Settings</h1>
    <p class="text-gray-600">
      Configure privacy settings for your district's systems. This includes data protection settings, user consent preferences, and ensuring compliance with laws like GDPR and CCPA.
    </p>
  </header>

  <!-- Data Retention Policies -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Data Retention Policies</h2>
    <div class="bg-white rounded shadow p-6">
      <form action="#" method="POST" class="space-y-6">
        <div>
          <label class="block text-sm font-medium mb-1" for="dataRetention">Data Retention Period</label>
          <select
            id="dataRetention"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="1_year">1 Year</option>
            <option value="2_years">2 Years</option>
            <option value="3_years">3 Years</option>
            <option value="5_years">5 Years</option>
            <option value="indefinite">Indefinite</option>
          </select>
        </div>

        <div>
          <label class="block text-sm font-medium mb-1" for="dataDeletion">Data Deletion Method</label>
          <select
            id="dataDeletion"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="secure">Secure Wipe (recommended)</option>
            <option value="soft">Soft Deletion</option>
            <option value="manual">Manual Review</option>
          </select>
        </div>

        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
        >
          Save Data Retention Settings
        </button>
      </form>
    </div>
  </section>

  <!-- Consent Management -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Consent Management</h2>
    <div class="bg-white rounded shadow p-6">
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- GDPR Consent -->
        <div>
          <h3 class="font-semibold">GDPR Consent</h3>
          <p class="text-sm text-gray-500">Ensure GDPR compliance by collecting consent from users before processing personal data.</p>
          <select
            id="gdprConsent"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="required">Required</option>
            <option value="optional">Optional</option>
            <option value="disabled">Disabled</option>
          </select>
        </div>

        <!-- CCPA Consent -->
        <div>
          <h3 class="font-semibold">CCPA Consent</h3>
          <p class="text-sm text-gray-500">Ensure compliance with the California Consumer Privacy Act by managing consent for data collection and sharing.</p>
          <select
            id="ccpaConsent"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="required">Required</option>
            <option value="optional">Optional</option>
            <option value="disabled">Disabled</option>
          </select>
        </div>
      </div>
      <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm mt-4"
      >
        Save Consent Settings
      </button>
    </div>
  </section>
</div>

<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">SSO Integration</h1>
    <p class="text-gray-600">
      Configure Single Sign-On (SSO) for seamless authentication across applications. Set up third-party identity providers (IdP) like Google, Microsoft, or any SAML 2.0-compatible service.
    </p>
  </header>

  <!-- Identity Provider Settings -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Identity Provider (IdP) Configuration</h2>
    <div class="bg-white rounded shadow p-6">
      <form action="#" method="POST" class="space-y-6">
        <!-- IdP Name -->
        <div>
          <label class="block text-sm font-medium mb-1" for="idpName">Identity Provider Name</label>
          <input
            type="text"
            id="idpName"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="Enter IdP Name (e.g., Google, Microsoft)"
          />
        </div>

        <!-- IdP Metadata URL -->
        <div>
          <label class="block text-sm font-medium mb-1" for="idpMetadataUrl">IdP Metadata URL</label>
          <input
            type="url"
            id="idpMetadataUrl"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="https://example.com/sso/metadata"
          />
        </div>

        <!-- SSO Authentication Method -->
        <div>
          <label class="block text-sm font-medium mb-1" for="authMethod">Authentication Method</label>
          <select
            id="authMethod"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="saml">SAML 2.0</option>
            <option value="oidc">OIDC (OpenID Connect)</option>
          </select>
        </div>

        <!-- Save Button -->
        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
        >
          Save SSO Configuration
        </button>
      </form>
    </div>
  </section>

  <!-- Test Integration -->
  <section>
    <h2 class="text-2xl font-bold mb-4">Test SSO Integration</h2>
    <div class="bg-white rounded shadow p-6">
      <button
        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm"
      >
        Test SSO Integration
      </button>
    </div>
  </section>
</div>

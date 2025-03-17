<div class="mx-auto p-6">

  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Domain Verification & DNS</h1>
    <p class="text-gray-600">
      Prove ownership of your sending domain to reduce spam flags and improve deliverability. Add the following DNS records (TXT, CNAME, or DKIM) and then verify.
    </p>
  </header>

  <!-- Domain Info -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Domain</h2>
    <p class="text-sm mb-4">
      <strong>Domain:</strong> <code>yourdistrict.org</code> 
      <span class="text-green-600 ml-2">Verified</span>
    </p>

    <div class="bg-white rounded shadow p-6">
      <p class="text-sm text-gray-600">
        <strong>Required DNS Records:</strong> 
      </p>
      <ul class="list-disc list-inside space-y-1 text-sm mb-4">
        <li>
          <code>TXT @ "v=spf1 include:spf.mailprovider.com -all"</code>
        </li>
        <li>
          <code>DKIM record: default._domainkey.yourdistrict.org → "k=rsa; p=MIIBIjANBgkqh..."</code>
        </li>
        <li>
          <code>CNAME: mail._domainkey → mail.dkim.mailprovider.com</code>
        </li>
      </ul>

      <div class="flex gap-3">
        <button class="bg-blue-600 text-white px-4 py-2 rounded text-sm hover:bg-blue-700">
          Verify Now
        </button>
        <button class="bg-gray-600 text-white px-4 py-2 rounded text-sm hover:bg-gray-700">
          Refresh Status
        </button>
      </div>
    </div>
  </section>

</div>

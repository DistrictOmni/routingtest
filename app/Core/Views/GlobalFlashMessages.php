<?php
// We assume you required 'Flash.php' in your bootstrap or autoloader
$flashMessages = getFlashMessages(); // fetch + clear messages
?>

<?php if (!empty($flashMessages)): ?>
    <div
  x-data="{
    notifications: <?php echo json_encode($flashMessages); ?>,
    remove(index) { this.notifications.splice(index, 1) }
  }"
  class="fixed top-4 right-4 flex flex-col space-y-2 z-50"
>
  <template x-for="(notif, index) in notifications" :key="index">
    <div
      x-transition
      class="px-4 py-3 rounded shadow-md text-white"
      :class="{
        'bg-green-600': notif.type === 'success',
        'bg-blue-600': notif.type === 'info',
        'bg-yellow-500': notif.type === 'warning',
        'bg-red-600': notif.type === 'error'
      }"
    >
      <div class="flex items-center justify-between">
        <span x-text="notif.message"></span>
        <button class="ml-4" @click="remove(index)">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
  </template>
</>
<?php endif; ?> 
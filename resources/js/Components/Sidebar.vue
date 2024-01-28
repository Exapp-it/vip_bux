<script setup>
import MenuItem from "./UI/MenuItem.vue";
import MenuItemWithDropdown from "./UI/MenuItemWithDropdown.vue";


</script>

<template>
  <aside class="bg-stone-900 text-white min-w-72 rounded-lg shadow-xl min-h-screen p-4 sm:hidden">
    <nav>
      <MenuItem icon="bi bi-house-door-fill" text="Пункт 1" />
      <MenuItemWithDropdown icon="bi bi-chat-left-text-fill" text="Пункт 2" menuItem="item-1" show="false" />
      <MenuItemWithDropdown icon="bi bi-chat-left-text-fill" text="Пункт 3" menuItem="item-2" shaow="false" />
      <!-- Add more menu items as needed -->
    </nav>
  </aside>
</template>



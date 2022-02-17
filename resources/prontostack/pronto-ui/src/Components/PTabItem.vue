<template>
  <div>
    <div v-show="currentTab === $attrs.id">
      <slot />
    </div>
  </div>
</template>

<script setup>
const currentTab = inject('currentTab')
</script>

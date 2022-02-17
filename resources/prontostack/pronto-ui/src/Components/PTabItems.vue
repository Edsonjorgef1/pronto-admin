<template>
  <div>
    <slot />
  </div>
</template>

<script setup>
const props = defineProps({
  modelValue: [String, Number]
})

const internalModelValue = computed(() => props.modelValue)

provide('currentTab', internalModelValue)
</script>

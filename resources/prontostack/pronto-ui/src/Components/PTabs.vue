<template>
  <nav>
    <ul
      class="flex"
      :class="{
        'flex-col space-y-3': isVertical,
        'space-x-3': isHorizontal
      }"
    >
      <slot />
    </ul>
  </nav>
</template>

<script setup>
const props = defineProps({
  selectedTabClass: {
    type: String,
    default: 'text-white tab-primary-800'
  },
  dismissible: Boolean,
  tabClass: {
    type: String,
    default: 'text-white/80 hover:tab-primary-700 focus:tab-primary-700 hover:text-white focus:text-white'
  },
  modelValue: [String, Number],
  placement: {
    type: String,
    default: 'top'
  }
})

const emit = defineEmits(['update:modelValue'])

const internalModelValue = computed({
  get () {
    return props.modelValue
  },
  set (newValue) {
    emit('update:modelValue', newValue)
  }
})

const internalSelectedTabClass = computed(() => props.selectedTabClass)
const internalDismissible = computed(() => props.dismissible)
const internalPlacement = computed(() => props.placement)
const internalTabClass = computed(() => props.tabClass)
const isHorizontal = computed(() => !isVertical)
const isVertical = computed(() => ['left', 'right'].includes(props.placement))

provide('selectedTabClass', internalSelectedTabClass)
provide('currentTab', internalModelValue)
provide('dismissible', internalDismissible)
provide('placement', internalPlacement)
provide('tabClass', internalTabClass)
</script>

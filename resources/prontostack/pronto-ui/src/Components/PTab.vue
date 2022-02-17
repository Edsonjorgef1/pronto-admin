<template>
  <li>
    <button
      class="
        relative
        p-3
        focus:outline-none
      "
      :class="{
        'tab-t': placement === 'top',
        'tab-r': placement === 'right',
        'tab-b': placement === 'bottom',
        'tab-l': placement === 'left',
        'cursor-default': active && !dismissible,
        [selectedTabClass]: active,
        [tabClass]: !active || dismissible
      }"
      v-bind="$attrs"
      @click="onClick"
    >
      <slot />
    </button>
  </li>
</template>

<script setup>
const props = defineProps({
  target: [String, Number]
})

const selectedTabClass = inject('selectedTabClass')
const currentTab = inject('currentTab')
const dismissible = inject('dismissible')
const placement = inject('placement')
const tabClass = inject('tabClass')

const active = computed(() => currentTab.value === props.target)

const onClick = () => {
  if (dismissible.value && active.value) {
    currentTab.value = null
    return
  }

  currentTab.value = props.target
}
</script>

<script>
export default {
  inheritAttrs: false
}
</script>

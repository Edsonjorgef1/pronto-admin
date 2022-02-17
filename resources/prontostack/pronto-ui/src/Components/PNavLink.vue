<template>
  <li class="py-0.5">
    <Link
      v-bind="$attrs"
      class="
        flex
        space-x-4
        p-3
        rounded-lg
        text-white/80
        transition
        duration-300
        font-semibold
        hover:text-white
      "
      :class="{
        'bg-primary-700 text-white cursor-default': active,
        'hover:bg-primary-900': !active
      }"
    >
      <slot />
    </Link>
  </li>
</template>

<script setup>
defineProps({
  active: Boolean
})
</script>

<script>
export default {
  inheritAttrs: false
}
</script>

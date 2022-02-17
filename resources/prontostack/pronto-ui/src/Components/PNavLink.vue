<template>
  <li>
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
        hover:bg-primary-900
        hover:text-white"
    >
      <slot />
    </Link>
  </li>
</template>

<script>
export default {
  inheritAttrs: false
}
</script>

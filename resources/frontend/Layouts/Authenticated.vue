<template>
  <div class="flex min-h-screen">
    <div
      class="
        flex
        flex-col
        fixed
        top-0
        bottom-0
        shadow-xl
        w-[260px]
        shadow-primary-1000
      "
    >
      <NavHeader />
      <div class="flex h-full">
        <div class="flex flex-col justify-between h-full bg-primary-1000 py-2 pl-2">
          <PTabs
            v-model="tab"
            placement="left"
          >
            <PTab target="database">
              <i-mdi-database />
            </PTab>
            <PTab target="dashboard">
              <i-icomoon-free-stats-dots />
            </PTab>
            <PTab target="settings">
              <i-mdi-cog />
            </PTab>
          </PTabs>
          <PTabs
            v-model="accountTab"
            placement="left"
            dismissible
          >
            <PTab target="account">
              <i-mdi-account-circle-outline />
            </PTab>
          </PTabs>
        </div>
        <div class="flex flex-col justify-between w-full h-full bg-primary-800">
          <PTabItems v-model="tab">
            <PTabItem id="database">
              <PNav>
                <PNavLink :href="route('admin.databases')">
                  <i-mdi-database />
                  <span>Collections</span>
                </PNavLink>
              </PNav>
            </PTabItem>
            <PTabItem id="dashboard">
              <PNav>
                <PNavLink>
                  <i-mdi-view-dashboard-outline />
                  <span>Overview</span>
                </PNavLink>
                <PNavLink>
                  <i-icomoon-free-stats-dots />
                  <span>Stats</span>
                </PNavLink>
              </PNav>
            </PTabItem>
            <PTabItem id="settings">
              <PNav>
                <PNavLink>
                  <i-mdi-account-group-outline />
                  <span>Users</span>
                </PNavLink>
                <PNavLink>
                  <i-mdi-badge-account-outline />
                  <span>Roles</span>
                </PNavLink>
                <PNavLink>
                  <i-mdi-lock-outline />
                  <span>Permissions</span>
                </PNavLink>
                <PNavLink>
                  <i-mdi-palette-outline />
                  <span>Appearance</span>
                </PNavLink>
              </PNav>
            </PTabItem>
          </PTabItems>
          <PTabItems v-model="accountTab">
            <PTabItem id="account">
              <PNav>
                <PNavLink>
                  <i-mdi-badge-account-outline />
                  <span>Profile</span>
                </PNavLink>
                <PNavLink
                  :href="route('logout')"
                  method="post"
                >
                  <i-mdi-power-standby />
                  <span>Logout</span>
                </PNavLink>
              </PNav>
            </PTabItem>
          </PTabItems>
        </div>
      </div>
    </div>
    <main class="ml-[260px] w-full">
      <slot />
    </main>
    <Toasts />
  </div>
</template>

<script setup>
const tab = ref('database')
const accountTab = ref('')
</script>

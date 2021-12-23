<template>
  <div>
    <nav
      class="navbar header has-shadow is-primary"
      role="navigation"
      aria-label="main navigation"
    >
      <div class="navbar-brand">
        <a class="navbar-item" href="/">
          <img src="~assets/buefy.png" alt="Buefy" height="28" />
        </a>
        <div></div>
        <div class="navbar-burger">
          <span />
          <span />
          <span />
        </div>
      </div>

    </nav>

    <section class="main-content columns">
      <aside id="menu" class="column is-3 section">
        <b-menu>
          <b-menu-list>
            <NuxtLink class="navbar-item" :to="{ name: 'index' }">
            &nbsp;<span class="icon is-small"><i class="mdi mdi-home"></i></span>&nbsp;
              Home
              </NuxtLink>
            <b-menu-item icon="settings" :active="isActive" expanded>
              <template #label="props">
                Trolley
                <b-icon
                  class="is-pulled-right"
                  :icon="props.expanded ? 'menu-up' : 'menu-down'"
                ></b-icon>
              </template>
                <b-menu-item
                  icon="cellphone-link"
                  label="Basic Location"
                  @click="basicLocation"
                >
                </b-menu-item>
                <b-menu-item
                  icon="cash-multiple"
                  label="Add item"
                  @click="createBasicLocation"
                >
                </b-menu-item>
            </b-menu-item>
          </b-menu-list>
          <b-menu-list label="Actions">
            <b-menu-item v-if="isLoggedIn" label="Logout" @click="logout">
            </b-menu-item>
          </b-menu-list>
        </b-menu>
      </aside>

      <div class="container column is-8">
        <div class="section">
          <Nuxt />
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      labelPosition: "on-border",
      isActive: true
    };
  },

  computed: {
    isLoggedIn() {
      return this.$cookies.get("x-access-token");
    },
    filteredDataArray() {
      return this.data.filter((option) => {
        return (
          option.user.first_name
            .toString()
            .toLowerCase()
            .indexOf(this.name.toLowerCase()) >= 0
        );
      });
    },
  },
  methods: {
    logout() {
      this.$store.dispatch("logout");
      this.$router.push({ name: "staff-login" });
      location.reload();
    },
    basicLocation() {
      this.$router.push({ name: "trolley-basic" });
    },
    createBasicLocation() {
      this.$router.push({ name: "trolley-create" });
    }
  },
};
</script>
<style>
.wrap-search {
  position: absolute;
  right: 0px;
  margin-right: 15px;
  top: 5px;
}
#menu {
  height: 100vh;
  background-color: #fff;
}
</style>

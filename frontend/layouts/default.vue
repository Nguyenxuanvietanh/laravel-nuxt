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
      <section class="wrap-search">
        <b-field label="">
          <b-autocomplete
            rounded
            placeholder="e.g. jQuery"
            icon="magnify"
            clearable
            @select="(option) => (selected = option)"
          >
            <template #empty>No results found</template>
          </b-autocomplete>
        </b-field>
      </section>
    </nav>

    <section class="main-content columns">
      <aside id="menu" class="column is-3 section">
        <b-menu>
          <b-menu-list>
            <NuxtLink class="navbar-item" :to="{ name: 'index' }">
            &nbsp;<span class="icon is-small"><i class="mdi mdi-home"></i></span>&nbsp;
              Home
              </NuxtLink>
            <b-menu-item icon="information-outline" label="Info"></b-menu-item>
            <b-menu-item icon="settings" active="true" expanded>
              <template #label="props">
                Trolley
                <b-icon
                  class="is-pulled-right"
                  :icon="props.expanded ? 'menu-up' : 'menu-down'"
                ></b-icon>
              </template>

              <NuxtLink class="navbar-item" :to="{ name: 'trolley-basic' }">
                <b-menu-item
                  icon="cellphone-link"
                  label="Basic Location"
                ></b-menu-item>
              </NuxtLink>
              <NuxtLink class="navbar-item" :to="{ name: 'trolley-create' }">
                <b-menu-item
                  icon="cash-multiple"
                  label="Add item"
                ></b-menu-item>
              </NuxtLink>
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

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
        <NuxtLink class="navbar-item" :to="{ name: 'staff-login' }">
          Login
        </NuxtLink>
        <NuxtLink class="navbar-item" :to="{ name: 'staff-register' }">
          Register
        </NuxtLink>
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
      <aside class="column is-3 section">
        <b-menu>
          <b-menu-list>
            <b-menu-item icon="information-outline" label="Info"></b-menu-item>
            <b-menu-item icon="settings" active="true" expanded>
              <template #label="props">
                Trolley
                <b-icon
                  class="is-pulled-right"
                  :icon="props.expanded ? 'menu-up' : 'menu-down'"
                ></b-icon>
              </template>
              <b-menu-item icon="cellphone-link">
                <template #label>
                  Basic Location
                  <b-dropdown
                    aria-role="list"
                    class="is-pulled-right"
                    position="is-bottom-left"
                  >
                  </b-dropdown>
                </template>
              </b-menu-item>
              <b-menu-item
                icon="cash-multiple"
                label="Add item"
              ></b-menu-item>
            </b-menu-item>
            <b-menu-item icon="account" label="My Account">
              <b-menu-item label="Account data"></b-menu-item>
              <b-menu-item label="Addresses"></b-menu-item>
            </b-menu-item>
          </b-menu-list>
          <b-menu-list label="Actions">
            <b-menu-item label="Logout"></b-menu-item>
          </b-menu-list>
        </b-menu>
      </aside>

      <div class="container column is-10">
        <Nuxt />
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      labelPosition: "on-border",
      items: [
        {
          title: "Home",
          icon: "home",
          to: { name: "index" },
        },
        {
          title: "Trolley",
          icon: "lightbulb",
          to: { name: "staff-trolley" },
        },
        {
          title: "Location",
          icon: "lightbulb",
          to: { name: "trolley-basic" },
        },
      ],
    };
  },
  computed: {
    isLoggedIn() {
      return this.$store.state.token;
    },
  },
  methods: {
    logout() {
      this.$axios
        .$post("logout")
        .then((resp) => {
          this.$store.dispatch("logout");
          this.$router.push("/");
        })
        .catch((errors) => {
          console.dir(errors);
        });
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
</style>

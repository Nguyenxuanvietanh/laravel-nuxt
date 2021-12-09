<template>
  <div>
    <nav
      class="navbar header has-shadow is-primary"
      role="navigation"
      aria-label="main navigation"
    >
      <div class="navbar-brand">
        <a
          class="navbar-item"
          href="/"
        >
          <img
            src="~assets/buefy.png"
            alt="Buefy"
            height="28"
          >
        </a>
                 <NuxtLink class="navbar-item" :to="{name: 'staff-login'}">
             Login
            </NuxtLink>
          <NuxtLink class="navbar-item" :to="{name: 'staff-register'}">
             Register
            </NuxtLink>
          <div>
                 <!-- <NuxtLink class="navbar-item" @click="logout">Logout</NuxtLink> -->

                 <!-- <NuxtLink class="navbar-item" :to="{name: 'staff-secret'}">Secret Page</NuxtLink> -->
            </div>
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
                v-model="name"
                :data="filteredDataArray"
                placeholder="e.g. jQuery"
                icon="magnify"
                clearable
                @select="option => selected = option">
                <template #empty>No results found</template>
            </b-autocomplete>
        </b-field>
    </section>
    </nav>

    <section class="main-content columns">
      <aside class="column is-2 section">
        <p class="menu-label is-hidden-touch">
          General
        </p>
        <ul class="menu-list">
          <li
            v-for="(item, key) of items"
            :key="key"
          >
            <NuxtLink
              :to="item.to"
              exact-active-class="is-active"
            >
              <b-icon :icon="item.icon" /> {{ item.title }}
            </NuxtLink>
          </li>
        </ul>
      </aside>

      <div class="container column is-10">
        <Nuxt />
      </div>
    </section>
  </div>
</template>

<script>
export default {

  data () {
    return {
      labelPosition: 'on-border',
      items: [
        {
          title: 'Home',
          icon: 'home',
          to: { name: 'index' }
        },
        {
          title: 'Trolley',
          icon: 'lightbulb',
          to: { name: 'staff-trolley' }
        }
      ]
    }
  },
   computed: {
      isLoggedIn() {
        return this.$store.state.token;
      }
    },
      methods: {
      logout() {
        this.$axios.$post('logout')
          .then(resp => {
            this.$store.dispatch('logout');
            this.$router.push('/');
          })
          .catch(errors => {
            console.dir(errors);
          });
      }
    }
}
</script>
<style>
.wrap-search{
  position: absolute;
    right: 0px;
    margin-right: 15px;
    top: 5px;
}
</style>

<template>
  <div class="container">
     <section>
        <b-field
         id="input-group-1"
        label="Email address:"
        label-for="input-1">
            <b-input
             id="input-1"
          v-model="form.email"
          type="email"
          required
          placeholder="Enter email">
            </b-input>
        </b-field>
        <b-field  id="input-group-3" label="Password:" label-for="input-3">
            <b-input  id="input-3"
          type="password"
          v-model="form.password"
          required
          placeholder="Enter password">
            </b-input>
        </b-field>
      <div class="columns">
        <div class="column">
          <NuxtLink class="navbar-item" :to="{ name: 'staff-register' }">Register new account</NuxtLink>
        </div>
        <div class="column" style="flex: inherit">
          <b-button type="is-primary" @click="login">Login</b-button>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
  export default {
    layout: 'none',
    data() {
      return {
        form: {
          email: '',
          password: '',
        },
      }
    },
    methods: {
      login() {
        this.$axios.$post('/api/login', this.form)
          .then((res) => {
            this.$store.dispatch('setToken', {token: res.data.token,expiresIn:6000 });
            this.$router.push({name: 'index'});
          })
          .catch(errors => {
            console.dir(errors);
          });
      },
    }
  }
</script>
<style>
body {
  font-family: "Open Sans", sans-serif;
  height: 100vh;
  background: url("~assets/background.jpg") 50% fixed;
  background-size: cover;
}
</style>
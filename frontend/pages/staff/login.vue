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
    <b-button type="is-primary" @click="login">Login</b-button>
    </section>


  </div>
</template>

<script>
  export default {
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
        console.log("login:");
        console.log(this.form);
        this.$axios.$post('/api/login', this.form)
          .then((res) => {
console.log(res);
            this.$store.dispatch('setToken', {token: res.data.token,expiresIn:60 });
            this.$router.push({name: 'index'});
          })
          .catch(errors => {
            console.dir(errors);
          });
      },
    }
  }
</script>

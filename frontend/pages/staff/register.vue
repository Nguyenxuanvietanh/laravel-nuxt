<template>
  <div class="container">
       <section>
         <b-field
         id="input-name"
        label="name:"
        label-for="input-name">
            <b-input
             id="input-name"
          v-model="form.name"
          type="text"
          required
          placeholder="Enter name">
            </b-input>
        </b-field>

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
         <b-field  id="input-group-4" label="Confirm Password:" label-for="input-4">
            <b-input  id="input-4"
          type="password"
          v-model="form.c_password"
          required
          placeholder="Enter confirm password">
            </b-input>
        </b-field>
    <b-button type="is-primary" @click="register">Register</b-button>
    </section>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        form: {
          name: '',
          email: '',
          password: '',
          c_password: '',
        },
      }
    },
    methods: {
      register() {
        this.$axios.$post('api/register', this.form)
          .then(({success, data, message}) => {

if(success === true){
    this.$store.dispatch('setToken', {token:data.token , expiresIn:60});
    this.$router.push({name: 'staff-secret'});
}

          })
          .catch(errors => {
            console.dir(errors);
          });
      },
    }
  }
</script>

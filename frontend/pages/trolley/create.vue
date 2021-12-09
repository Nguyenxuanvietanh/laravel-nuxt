<template>
  <div class="card">
    <div class="box">
      <section>
        <b-field id="input-group-1" label="Name:" label-for="input-1">
          <b-input id="input-1" v-model="form.name" type="text" required>
          </b-input>
        </b-field>
        <b-field id="input-group-2" label="Slug:" label-for="input-2">
          <b-input id="input-1" v-model="form.slug" type="text" required>
          </b-input>
        </b-field>
        <b-field id="input-group-3" label="Basic Location:" label-for="input-3">
          <b-input
            id="input-3"
            type="text"
            v-model="form.basic_location"
            required
          >
          </b-input>
        </b-field>
        <b-field id="input-group-4" label="Size:" label-for="input-4">
          <b-input id="input-4" v-model="form.size" type="size" required>
          </b-input>
        </b-field>
        <b-field id="input-group-1" label="Description:" label-for="input-5">
          <b-input
            id="input-5"
            v-model="form.description"
            type="description"
            required
          >
          </b-input>
        </b-field>
        <b-button type="is-primary" @click="createItem">Login</b-button>
      </section>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: "",
        slug: "",
        basic_location: "",
        size: "",
        description: "",
      },
    };
  },
};
</script>
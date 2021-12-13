<template>
  <div class="box">
    <section>
      <b-field id="input-group-1" label="Name:" label-for="input-1">
        <b-input id="input-1" v-model="form.name" type="text" required>
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
      <b-button type="is-primary" @click="updateItem">Submit</b-button>
    </section>
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
  methods: {
    getItem(slug) {
      this.$axios
        .$get("/api/basic_location/" + slug)
        .then((res) => {
          if (res.data) {
            this.form = res.data;
          }
        })
        .catch((errors) => {
          console.dir(errors);
        });
    },
    updateItem() {
      this.$axios
        .$post("/api/basic_location", this.form)
        .then((res) => {
          this.$router.push({ name: "trolley-basic" });
        })
        .catch((errors) => {
          console.dir(errors);
        });
    },
  },
  mounted() {
    let slug = this.$route.params.slug;
    this.getItem(slug);
  },
};
</script>
<style>
body {
  background: none;
}
</style>
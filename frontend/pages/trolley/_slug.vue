
<template>
  <div class="container">
    <section>
      <!-- <card title="trolley.slug" icon="alert-decagram">
         {{ trolley.current_location }}
      </card> -->
       <div class="column" >
        <div class="card">
        <header class="card-header">
        <p class="card-header-title has-text-grey">
       {{trolley.slug}}
      </p></header> <div class="card-content">
        <div class="content has-text-centered">
          <span class="icon has-text-primary is-large"><i class="mdi mdi-alert-decagram mdi-48px"></i></span>
        </div>
          <div class="content has-text-centered">
            {{trolley.size}}
        </div>
          <div class="content has-text-centered">
            {{trolley.description}}
        </div>
        </div>
        <footer class="card-footer">
          <div class="card-footer-item"><span>
        {{ trolley.current_location }}&nbsp;
    </span></div></footer></div></div>
     <div class="buttons">
            <b-button type="is-primary" expanded   @click="isCardModalActive = true">Update Location</b-button>
        </div>
       <b-modal v-model="isCardModalActive" :width="640" scroll="keep">
             <form action="">
            <div class="modal-card" style="width: auto">
                <header class="modal-card-head">
                    <p class="modal-card-title">Update Location for  {{trolley.slug}}</p>
                    <button
                        type="button"
                        class="delete"
                        @click="$emit('close')"/>
                </header>
                <section class="modal-card-body">
                    <b-field label="Location">
                        <b-input
                            type="text"
                            v-model="trolley.current_location"
                            placeholder="Enter new position"
                            required>
                        </b-input>
                    </b-field>
                </section>
                <footer class="modal-card-foot">
                    <b-button
                        label="Submit"
                        type="is-primary"
                         @click="submitPosition(trolley)" />
                </footer>
            </div>
        </form>
        </b-modal>
    </section>
  </div>
</template>
<script>

export default {

         data() {
            return {
                isComponentModalActive: false,
                 isCardModalActive: false,
                 slug: "",
        current_location: ""
            }
        },
  mounted() {
  },
  async asyncData({ route, params, $axios }) {
    const trolley = await $axios.$get(
      `/api/current_location/` +
        route.params.slug
    );
    return { trolley: trolley.data };
    //            const trolley = await fetch(`https://pu6xhlqn96.execute-api.ap-northeast-1.amazonaws.com/v1/trolley/`+route.params.slug)
    //       .then(res => res.json());
    // console.log(trolley);
    //     return {trolley:trolley.response };

    // if (process.server) {
    //     //use route object
    //     console.log(route.params.slug)
    //     //directly use params
    //     console.log(params.slug)
    // }
  },
    methods: {
    changePosition(troll) {
      this.isProductsDialogActive = true;
      this.selectedProducts = [];
      this.troll = troll;

    },
    // Close products dialog.
    closedDialog() {
      this.isProductsDialogActive = false;
    },
    async submitPosition(data) {
      await this.$axios
        .post(
          "/api/current_location",
          {
            slug: data.slug,
            current_location: data.current_location,
          }
        )
        .then(function (response) {
//  this.$router.push({ name: "index" });
        window.location.href = "/";
        })
        .catch(function (error) {

          console.log(error);
        });
    },
  },
};

</script>
<style>
body {
  background: none;
}
</style>

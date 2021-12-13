<template>
  <div class="container">
    <section>
      <!-- <card title="trolley.slug" icon="alert-decagram">
         {{ trolley.current_location }}
      </card> -->
      <div class="column">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title has-text-grey">
              {{ trolley.slug }}
            </p>
          </header>
          <div class="card-content">
            <div class="content has-text-centered">
              <span class="icon has-text-primary is-large"
                ><i class="mdi mdi-alert-decagram mdi-48px"></i
              ></span>
            </div>
          </div>
          <footer class="card-footer">
            <div class="card-footer-item">
              <span>
                {{ trolley.current_location }}
              </span>
            </div>
          </footer>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
export default {
  mounted() {
    console.log("mounted");
    console.log(this.$route.fullPath);
    console.log(this.$route.params.slug);
  },
  async asyncData({ route, params, $axios }) {
    const trolley = await $axios.$get(
      `https://pu6xhlqn96.execute-api.ap-northeast-1.amazonaws.com/v1/trolley/` +
        route.params.slug
    );
    return { trolley: trolley.response };
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
};
</script>
<style>
body {
  background: none;
}
</style>
<template>
  <section class="section">
    <div class="columns is-mobile">
      <ProductCard
        v-for="(trolley, i) in trolleys"
        :key="i"
        :trolley="trolley"
        @update-position="changePosition"
      />
    </div>
  </section>
</template>

<script>
import Card from "~/components/Card";
import ProductCard from "~/components/ProductCard";

export default {
  name: "HomePage",

  components: {
    Card,
  },
  async asyncData({ $axios }) {
    const trolleys = await fetch(
      `https://pu6xhlqn96.execute-api.ap-northeast-1.amazonaws.com/v1/trolley`
    ).then((res) => res.json());

    return { trolleys: trolleys.response };
  },
  methods: {
    changePosition(troll) {
      console.log(troll);
      this.isProductsDialogActive = true;
      this.selectedProducts = [];
      this.troll = troll;
    },
    // Close products dialog.
    closedDialog() {
      this.isProductsDialogActive = false;
    },
    submitPosition(data) {
      this.$axios
        .post(
          "https://pu6xhlqn96.execute-api.ap-northeast-1.amazonaws.com/v1/current_location",
          {
            slug: data.slug,
            current_location: data.current_location,
          }
        )
        .then(function (response) {
        })
        .catch(function (error) {
          this.isProductsDialogActive = false;
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
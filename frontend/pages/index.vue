<template>
  <section class="section">
    <div class="columns is-mobile is-multiline">
      <ProductCard
        v-for="(trolley, i) in trolleys"
        :key="i"
        :trolley="trolley"
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
  async asyncData({ $axios, store }) {
    const trolleys = await $axios.$get(`/api/trolleys`);
    return { trolleys: trolleys.data };
  },
};
</script>
<style>
body {
  background: none;
}
.column.is-one-quarter {
  cursor: pointer;
}
</style>

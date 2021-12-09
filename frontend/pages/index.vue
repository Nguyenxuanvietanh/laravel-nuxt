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
import Card from '~/components/Card'
import ProductCard from '~/components/ProductCard'

export default {
  name: 'HomePage',

  components: {
    Card
  },
   async asyncData({ $axios }) {
    const trolleys = await fetch(`https://pu6xhlqn96.execute-api.ap-northeast-1.amazonaws.com/v1/trolley`)
      .then(res => res.json());
console.log(trolleys.response);
    return {trolleys:trolleys.response };
  },
   methods: {
    changePosition(troll){
      console.log(troll);
      this.isProductsDialogActive = true;
      this.selectedProducts = [];
      this.troll = troll;
    },
     // Close products dialog.
    closedDialog() {
      console.log("closedDialog");
      this.isProductsDialogActive = false;
    },
    submitPosition(data){
        console.log("submitPosition");
      console.log(data);
     this.$axios.post('https://pu6xhlqn96.execute-api.ap-northeast-1.amazonaws.com/v1/current_location', {
          slug: data.slug,
          current_location: data.current_location,
      })
      .then(function (response) {
        console.log("response");
          console.log(response);
          //  location.reload();
      })
      .catch(function (error) {
         console.log("error axios");
          //  location.reload();
          this.isProductsDialogActive = false;


      });
    }
  },
}
</script>

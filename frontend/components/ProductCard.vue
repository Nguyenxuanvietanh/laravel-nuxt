<template>
  <div class="column is-one-quarter" @click="detail(trolley.slug)">
    <div class="card" v-bind:class="getClass()">
      <header class="card-header">
        <p class="card-header-title has-text-grey">
          {{ trolley.slug }} <br />
          ({{ trolley.basic_location }})
        </p>
      </header>
      <div class="card-content">
        <div class="content has-text-centered">
          <span class="icon has-text-primary is-large"
            ><i class="mdi mdi-alert-decagram mdi-48px"></i
          ></span>
        </div>
        <div class="content has-text-centered">
          {{ trolley.size }}
        </div>
        <div class="content has-text-centered">
          {{ trolley.description }}
        </div>
      </div>
      <footer class="card-footer">
        <div class="card-footer-item">
          <span> {{ trolley.current_location }}&nbsp; </span>
        </div>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    trolley: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {};
  },
  methods: {
    detail(slug) {
      this.$router.push({
        path: `/trolley/${slug}`,
      });
    },
    getClass() {
      return {
        highlight:
          this.trolley.current_location !== this.trolley.basic_location,
      };
    },
  },
};
</script>

<style>
.product-card {
  padding: 1rem;
  border: 1px solid #888888 !important;
  box-shadow: 0px 0px 5px #888888;
}
.product-img:hover {
  transform: scale(1.1);
}
.select-count {
  margin-left: 5px;
  border: none;
  outline: none;
  background: transparent;
}
.general {
  position: relative;
  gap: 5px;
}
.general label {
  background: transparent;
  color: black;
}
.general label input {
  visibility: hidden !important;
  position: absolute !important;
}
.card.highlight {
  border: 1px solid #000;
  background-color: antiquewhite;
}
</style>

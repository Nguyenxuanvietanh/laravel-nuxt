<template>
  <!-- <b-card
    no-body
    class="overflow-hidden product-card pink-background"
    style="max-width: 580px; margin: 1rem"
  >
    <b-row no-gutters>
      <b-col md="12">
        <b-card-body>
          <b-card-title title-tag="h4">{{ trolley.slug }}</b-card-title>
           <b-card-text>
            {{ trolley.current_location }}
          </b-card-text>
           <b-card-text>
            {{ trolley.imported_time }}
          </b-card-text>
           <b-button variant="info"
           @click="selectPosition"
           >Update position</b-button>
        </b-card-body>
      </b-col>
    </b-row>
  </b-card> -->

  <card title="trolley.slug" icon="alert-decagram">
         {{ trolley.current_location }}
      </card>

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
    return {
    };
  },
  methods: {
  selectPosition(){
       this.$emit("update-position", {
         "slug":this.trolley.slug,
         "current_location": this.trolley.current_location,
       });
  }
  }
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
</style>

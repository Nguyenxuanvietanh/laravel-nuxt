<template>
  <section>
    <b-table
      :data="trolley"
      :paginated="isPaginated"
      :per-page="perPage"
      :current-page.sync="currentPage"
      :pagination-simple="isPaginationSimple"
      :pagination-position="paginationPosition"
      :default-sort-direction="defaultSortDirection"
      :pagination-rounded="isPaginationRounded"
      :sort-icon="sortIcon"
      :sort-icon-size="sortIconSize"
      aria-next-label="Next page"
      aria-previous-label="Previous page"
      aria-page-label="Page"
      aria-current-label="Current page"
    >
      <b-table-column field="name" label="Name" sortable numeric v-slot="props">
        {{ props.row.name }}
      </b-table-column>

      <b-table-column field="slug" label="Slug" sortable numeric v-slot="props">
        {{ props.row.slug }}
      </b-table-column>

      <b-table-column
        field="basic_location"
        label="Basic Location"
        sortable
        numeric
        v-slot="props"
      >
        {{ props.row.basic_location }}
      </b-table-column>

      <b-table-column field="size" label="Size" sortable numeric v-slot="props">
        {{ props.row.size }}
      </b-table-column>

      <b-table-column
        field="description"
        label="Description"
        sortable
        numeric
        v-slot="props"
      >
        {{ props.row.description }}
      </b-table-column>

      <b-table-column field="slug" label="Action" sortable v-slot="props">
        <b-button type="is-success" icon-right="pencil-box" @click="edit(props.row.slug)" />
        <b-button
          type="is-danger"
          @click="destroy(props.row.slug)"
          icon-right="delete"
        />
      </b-table-column>
    </b-table>
  </section>
</template>

<script>
export default {
  data() {
    return {
      isPaginated: true,
      isPaginationSimple: false,
      isPaginationRounded: false,
      paginationPosition: "bottom",
      defaultSortDirection: "asc",
      sortIcon: "arrow-up",
      sortIconSize: "is-small",
      currentPage: 1,
      perPage: 5,
      trolley: [],
    };
  },
  methods: {
    location() {
      this.$axios
        .$get("/api/basic_location")
        .then((res) => {
          if (res.data) {
            this.trolley = res.data;
          }
        })
        .catch((errors) => {
          console.dir(errors);
        });
    },
    edit(slug) {
      this.$router.push({name: 'trolley-edit', params: { slug: slug }});
    },
    destroy(slug) {
        this.$buefy.dialog.confirm({
            message: "Do you want to delete this item",
            onConfirm: () => {
                this.$axios
                .$delete("/api/basic_location" + slug)
                .then((res) => {
                    if (res.success) {
                        this.location();
                        this.$buefy.toast.open({
                            message: 'Delete item success',
                            type: 'is-success'
                        })
                    }
                })
                .catch((errors) => {
                console.dir(errors);
                });
            },
        });
      
    },
  },
  mounted() {
    this.location();
  },
};
</script>
<style>
body {
  background: none;
}
</style>
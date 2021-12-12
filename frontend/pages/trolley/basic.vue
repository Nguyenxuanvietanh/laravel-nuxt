<template scope="props">
    <b-table :data="trolley" :columns="columns"></b-table>
</template>
<script>
    export default {
        data() {
            return {
                trolley: [],
                columns: [
                    {
                        field: 'name',
                        label: 'Name',
                    },
                    {
                        field: 'slug',
                        label: 'Slug',
                    },
                    {
                        field: 'basic_location',
                        label: 'Basic Location',
                        centered: true
                    },
                    {
                        field: 'size',
                        label: 'Size',
                    },
                    {
                        field: 'description',
                        label: 'Description',
                    }
                ]
            }
        },
        methods: {
            location() {
                this.$axios.$get('/api/basic_location', this.form)
                .then((res) => {
                    if(res.status){
                        this.data.trolley = res.data
                        console.log(this.data.trolley)
                    }
                })
                .catch(errors => {
                    console.dir(errors);
                });
            }
        },
        mounted () {
            this.location()
        }
    }
</script>
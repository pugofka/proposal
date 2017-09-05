<template>
  <input type="text" placeholder="Имя шаблона"
         @keyup="update"
         v-model="name"
  >
</template>

<script>
  export default {
    components: {},

    data:
      function () {
        return {
          name: this.nameData,
        }
      },

    props: {
      nameData: {
        type: String,
        required: true
      },
      idData: {
        type: Number,
        required: true
      }
    },

    methods: {
      update: _.debounce(function() {
        axios.put(API_URL+'/templates/' + this.idData, {
          "name": this.name
        })
          .catch(function (error) {
            console.error(error);
          })
        console.log("update");
      }, 500)
    },

    watch: {},

    mounted() {

    }
  }
</script>

<style lang="scss">

</style>

<template>
  <div class="template-wrapper">
    <div class="template-task" v-for="task in tasksData">
      <input name="checkbox" type="checkbox" checked="checked">
      {{ task.name }}
    </div>
  </div>
</template>

<script>
  export default {
    components: {},

    data:
      function () {
        return {}
      },

    props: {
      tasksData: {
        type: Array,
        required: true
      }
    },

    methods: {},

    watch: {},

    mounted() {

    }
  }
</script>

<style lang="scss">

</style>

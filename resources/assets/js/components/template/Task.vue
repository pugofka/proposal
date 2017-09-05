<template>
  <div class="task-wrapper">
    <div class="task col-md-12">
      <input type="checkbox" :id="taskData.name+taskData.id"
             v-model="active"
      >
      <label :for="taskData.name+taskData.id">{{ taskData.name }}</label>
    </div>
  </div>
</template>

<script>
  export default {
    components: {},

    data:
      function () {
        return {
          active: this.activeData
        }
      },

    props: {
      taskData: {
        type: Object,
        required: true
      },
      activeData: {
        type: Boolean,
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

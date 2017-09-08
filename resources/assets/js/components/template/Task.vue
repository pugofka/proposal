<template>
  <div class="row">
    <div class="templates__task-wrapper col-md-12">
      <div class="templates__task">
        <input class="templates__task-checkbox" type="checkbox" :id="taskData.name+taskData.id"
               v-model="active"
               @change="sendActiveStatus"
        >
        <label class="templates__task-name" :for="taskData.name+taskData.id">{{ taskData.name }}</label>
      </div>
      <task-variants v-if="active"
                     :variants-data=taskData.variants
                     :template-id-data=templateId
                     :task-data=taskData
      ></task-variants>
    </div>
  </div>
</template>

<script>
  export default {
    components: {
      "task-variant": require("./Variants.vue")
    },

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
      },
      templateId: {
        type: Number,
        required: true
      },
      variantsData: {
        type: Array,
        required: true
      }
    },

    methods: {
      sendActiveStatus: function () {
        axios.put("/templates/" + this.templateId + "/edit/task-status", {
          "task_id": this.taskData.id,
          "template_id": this.templateId
        })
      }
    },

    watch: {},

    mounted() {

    }
  }
</script>

<style lang="scss">

</style>

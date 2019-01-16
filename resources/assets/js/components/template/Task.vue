<template>
  <div class="panel panel-default">
    <div class="panel-heading">
      {{ taskData.name }}
      <div class="pull-right">
        <div class="togglebutton form-group">
          <label>
            <input type="checkbox" v-model="active" @change="sendActiveStatus">
            <span class="toggle"></span>
          </label>
        </div>
      </div>
    </div>
    <div v-if="active" class="panel-body">
      <task-variants
        v-if="active"
        :variants-data="taskData.variants"
        :template-id-data="templateId"
        :task-data="taskData"
      />
    </div>
  </div>
</template>

<script>
export default {

  components: {
    "task-variant": require("./Variants.vue").default
  },

  data: function () {
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
  }

}
</script>

<style scoped>
.togglebutton.form-group {
  margin-top: 0;
}
</style>

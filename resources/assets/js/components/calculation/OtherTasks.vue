<template>
  <div class="well bs-component">
    <h2>Дополнительные задачи</h2>
    <div class="task" v-for="(task,index) in otherTasks" :key="index">
      <div class="form-group is-empty">
        <input type="text" class="form-control" placeholder="Задача" v-model="task.name">
      </div>
      <div class="form-group is-empty">
        <input
          type="number"
          class="form-control"
          min="0"
          placeholder="Часы"
          v-model.number="task.hours"
        >
      </div>
      <div class="task__price">стоимость доп. задачи: {{ task.hours * hourPriceData }} руб.</div>
    </div>
    <button class="btn btn-success btn-fab" @click="addTask">
      <i class="material-icons">add</i>
    </button>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      otherTasks: this.otherTasksData
    };
  },

  props: {
    otherTasksData: Array,
    hourPriceData: Number
  },

  methods: {
    addTask: function() {
      const clearTask = {
        name: "",
        hours: ""
      };
      this.otherTasks.push(clearTask);
    }
  }
};
</script>

<style scoped lang="scss">
.task {
  display: flex;
  justify-content: space-between;
  align-items: center;

  div {
    width: 100%;
    margin-right: 15px;

    &:last-child {
      margin-right: 0;
      text-align: right;
      color: #ccc;
    }
  }
}

.btn {
  img {
    width: 50%;
    position: relative;
    top: -2px;
  }
}
</style>

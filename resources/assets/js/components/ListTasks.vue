<template>
  <div v-if="tasks">
    <div class="questions__wrapper" v-for="task in tasks">
      <task
        :taskData='task'
        :templateData='templates'
        :callback="removeTask"
      />
    </div>
    <button class="questions__btn btn btn-warning btn-fab" @click="addTask" v-if="isShowAddBtn">
      <i class="material-icons">
        <img src='/img/plus.svg' alt="">
      </i>
    </button>
  </div>
</template>

<script>
  export default {
    components: {
      'task': require('./Task.vue')
    },

    data: function () {
      return {
        tasks: this.tasksData,
        templates: this.templatesData,
        isShowAddBtn: true
      }
    },

    props: {

      tasksData: {
        type: Array
      },

      templatesData: {
        type: Array
      },

      stageId: {
        type: Number
      }

    },

    methods: {

      initStates: function () {
        if(this.tasks.length <= 0) {
          this.tasks = [{
            id: null,
            name: null,
            stage_id: this.stageId,
            variants: [
              {
                id: null,
                name: null
              }
            ]
          }];
        }
      },

      addTask: function() {
        var clearTask = {
          id: null,
          name: null,
          stage_id: this.stageId,
          variants: [
            {
              id: null,
              name: null
            }
          ]
        };
        this.tasks.push(clearTask);
      },

      removeTask: function(data) {
        this.tasks.splice(this.tasks.indexOf(data), 1);
      }

    },

    watch: {

      tasks: {
        handler: function(e) {
          if(!e[e.length - 1].name) this.isShowAddBtn = false;
          else this.isShowAddBtn = true;
        },
        deep: true
      }

    },

    mounted() {
      this.initStates();
    }
  }
</script>

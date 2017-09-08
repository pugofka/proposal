<template>
  <div v-if="tasks">
    <div class="questions__wrapper" v-for="task in tasks">
      <task
        :taskData='task'
        :templateData='templates'
        :callback='removeTask'
      />
    </div>
    <button class="questions__btn btn btn-warning btn-fab" @click="addTask" v-if="isShowAddBtn">
      <i class="material-icons">
        <img src='/img/plus.svg'>
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
            templates_array: [],
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

<style lang="scss">
.questions {
  margin: 0;

  &__step:not(:first-child) div {
    display: none;
  }

  &__step {
    position: relative;
    display: inline-block;
    width: inherit;
    cursor: pointer;
    padding-right: 30px;
    margin-bottom: 20px;
  }

  &__step:after {
    content: "";
    position: absolute;
    background-image: url('http://localhost/img/down.svg');
    width: 20px;
    height: 20px;
    top: 50%;
    -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
    right: 0;
  }

  &__form {
    display: grid;
    -webkit-box-pack: justify;
        -ms-flex-pack: justify;
            justify-content: space-between;
    grid-template-columns: 1fr 1fr 250px 50px;
    margin-bottom: 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    padding: 10px;
  }

  &__wrap {
    margin: 0 30px !important;
  }

  &__btn.btn {
    width: 24px;
    height: 24px;
    max-width: 24px;
    min-width: 24px;
    margin: 15px;
    padding: 15px;
  }

  & .material-icons {
    position: relative;
    width: 24px;
    height: 24px;
  }

  & .material-icons img {
    width: 20px;
    position: absolute;
    height: 20px;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    fill: #fff;
  }

  & legend {
    font-style: normal;
  }
}
</style>

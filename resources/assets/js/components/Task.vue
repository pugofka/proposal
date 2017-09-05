<template>
  <div class="questions__form">
    <div class="form-group questions__wrap">
      <label class="control-label">Задачи</label>
      <div>
        <input type="text" class="form-control" v-model='taskData.name' @keyup="changeTask">
        <p v-if="isTaskInvalid" class="help-block">Название должно содержать не меньше 4 символов</p>
      </div>
    </div>
    <list-variants
      v-if="!isTaskInvalid"
      :variants="taskData.variants"
      :task-id="taskData.id"
    />
    <div class="form-group  questions__wrap">
      <label class="control-label">Шаблоны</label>
      <div class="">
        <select multiple class="form-control"
          @change="changeTemplates"
          v-model="selectedTemplates"
        >
          <option
            v-for="template in templateData"
            :key="template.id"
            :value="template.id"
          >
            {{ template.name }}
          </option>
        </select>
      </div>
    </div>
    <button href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab" @click="remove(taskData)">
      <i class="material-icons"><img src='/img/minus.svg'></i>
    </button>
  </div>
</template>

<script>
  export default {
    components: {
      'list-variants': require('./ListVariants.vue')
    },

    data: function () {
      return {
        isTaskInvalid: true,
        selectedTemplates: this.taskData.templates_array
      }
    },

    props: {

      taskData: {
        type: Object
      },

      templateData: {
        type: Array
      },

      callback: {
        type: Function
      }
    },

    methods: {

      remove: function(data) {
        this.callback(data);

        if(this.taskData.id) {
          axios.delete(API_URL+'/tasks/'+this.taskData.id, {
            "name": this.taskData.name,
            "stage": this.taskData.stage_id,
            "id": this.taskData.id
          })
            .then(function(response){
              console.log(response);
            })
            .catch(function(error){
              console.error(error);
            })
        }
      },

      validateName: function () {
        if(this.taskData.name && this.taskData.name.length >= 3) {
          this.isTaskInvalid = false;
          return true;
        } else {
          this.isTaskInvalid = true;
          return false;
        }
      },

      postTask: function () {
        var t = this;
        if(this.taskData.id) {
          axios.put(API_URL+'/tasks/'+this.taskData.id, {
            "name": this.taskData.name,
            "stage": this.taskData.stage_id,
            "templates": this.selectedTemplates,
            "id": this.taskData.id
          })
            .then(function(response){
              var id = response.data.id;
              t.taskData.id = id;
            })
            .catch(function(error){
              console.error(error);
            })
        } else {
          axios.post(API_URL+'/tasks/', {
            "name": this.taskData.name,
            "templates": this.selectedTemplates,
            "stage": this.taskData.stage_id
          })
            .then(function(response){
              var id = response.data.id;
              t.taskData.id = id;
            })
            .catch(function(error){
              console.error(error);
            })
        }
      },

      changeTask: _.debounce(function () {
        if(this.validateName()) {
          this.postTask();
        }
      }, 500),

      changeTemplates: function (e) {
        if(this.taskData.name) this.postTask();
      }

    },

    mounted() {
      this.validateName();
    }
  }
</script>

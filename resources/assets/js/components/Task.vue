<template>
  <div class="questions__form">
    <div class="form-group questions__wrap">
      <label class="control-label">Задачи</label>
      <div>
        <input type="text" class="form-control" v-model='taskData.name' @change="changeTask">
        <p v-if="isTaskInvalid" class="help-block">Название должно содержать не меньше 3 символов</p>
      </div>
    </div>
    <list-variants v-if="!isTaskInvalid" :variants='taskData.variants'></list-variants>
    <div class="form-group  questions__wrap">
      <label class="control-label">Шаблоны</label>
      <div class="">
        <select multiple="" class="form-control">
          <option v-for="item in templateData" :key="item.id" :value="item.id">{{ item.name }}</option>
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
        isTaskInvalid: true
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

      changeTask: _.debounce(function () {
        if(this.validateName()) {
          var t = this;
          if(this.taskData.id) {
            axios.put(API_URL+'/tasks/'+this.taskData.id, {
              "name": this.taskData.name,
              "stage": this.taskData.stage_id,
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
        }
      }, 500)

    },

    watch: {

      taskData: {
        handler: function() {
          this.changeTask();
        },
        deep: true
      }

    },

    mounted() {
      this.validateName();
    }
  }
</script>

<style>
.questions {
  margin: 0 30px;
}

.questions__step:not(:first-child) div {
  display: none;
}

.questions__step {
  position: relative;
  display: inline-block;
  width: inherit;
  cursor: pointer;
  padding-right: 30px;
  margin-bottom: 20px;
}

.questions__step:after {
  content: "";
  position: absolute;
  background-image: url(http://localhost/img/down.svg);
  width: 20px;
  height: 20px;
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  right: 0;
}

.questions__form {
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

.questions__wrap {
  margin: 0 30px !important;
}

.questions__del {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.questions__btn {
  width: 24px !important;
  height: 24px !important;
  max-width: 24px !important;
  min-width: 24px !important;
  margin: 15px !important;
  padding: 15px !important;
}

.questions .material-icons {
  position: relative;
  width: 24px;
  height: 24px;
}

.questions .material-icons img {
  width: 20px;
  position: absolute;
  height: 20px;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  fill: #fff;
}

.questions legend {
  font-style: normal;
}
</style>

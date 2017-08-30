<template>
  <div class="questions__form">
    <div class="form-group questions__wrap">
      <label class="control-label">Вопрос</label>
      <div class="">
        <input type="text" class="form-control" v-model='taskData.name'>
      </div>
    </div>
    <list-variants :variants='taskData.variants'></list-variants>
    <div class="form-group  questions__wrap">
      <label class="control-label">Шаблоны</label>
      <div class="">
        <select multiple="" class="form-control">
          <option v-for="item in templateData" :key=item.id :value=item.id>{{ item.name }}</option>
        </select>
      </div>
    </div>
    <button href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab" @click="click(taskData)">
      <i class="material-icons"><img src='/img/minus.svg' alt=""></i>
    </button>
    </div>
</template>

<script>
    export default {
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
        click: function(data) {
          this.callback(data);
        }
      },
      components: {
        'list-variants': require('./ListVariants.vue')
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
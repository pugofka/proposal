<template>
  <div class="well bs-component">
    <div class="form-horizontal">
      <h2>Начало</h2>
      <div class="form-group is-empty">
        <label for="name" class="col-md-4 control-label">Название расчета</label>
        <div class="col-md-6">
          <input id="name" type="text" autofocus="autofocus" class="form-control" v-model="calculate.name">
        </div>
      </div>
      <div class="form-group is-empty">
        <label for="price" class="col-md-4 control-label">Стоимость часа</label>
        <div class="col-md-6">
          <div class="input-group">
            <input id="price" type="number" class="form-control" min="0" v-model.number="calculate.hourPrice">
            <span class="input-group-addon">руб.</span>
          </div>
        </div>
      </div>
      <div class="form-group is-empty">
        <label for="price" class="col-md-4 control-label">Проблема</label>
        <div class="col-md-6">
          <div class="input-group">
            <textarea id="problem" cols="100" rows="" class="form-control" v-model="description.problem"></textarea>
          </div>
        </div>
      </div>
      <div class="form-group is-empty">
        <label for="price" class="col-md-4 control-label">Задача</label>
        <div class="col-md-6">
          <div class="input-group">
            <textarea id="task" cols="100" rows="" class="form-control" v-model="description.task"></textarea>
          </div>
        </div>
      </div>
      <div class="form-group is-empty">
        <label for="price" class="col-md-4 control-label">Цель</label>
        <div class="col-md-6">
          <div class="input-group">
            <textarea id="target" cols="100" rows="" class="form-control" v-model="description.target"></textarea>
          </div>
        </div>
      </div>
      <div class="form-group is-empty">
        <label for="fio" class="col-md-4 control-label">Клиент</label>
        <div class="col-md-6">
          <input id="fio" type="text" class="form-control" placeholder="ФИО" v-model="client.name">
        </div>
      </div>
      <div class="form-group is-empty">
        <div class="col-md-offset-4 col-md-6">
          <input type="text" class="form-control" placeholder="Телефон" v-model="client.phone">
        </div>
      </div>
      <div class="form-group is-empty">
        <div class="col-md-offset-4 col-md-6">
          <input type="email" class="form-control" placeholder="E-Mail" v-model="client.mail">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      calculate: this.calculateData,
      client: this.clientData,
      description: this.descriptionData
    };
  },

  props: {
    calculateData: Object,
    clientData: Object,
    descriptionData: Object
  }
};
</script>

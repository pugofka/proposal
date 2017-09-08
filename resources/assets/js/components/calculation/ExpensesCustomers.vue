<template>
  <div class="panel panel-default">
    <div class="panel-heading">Расходы клиента</div>
    <div class="panel-body">
      <div class="task" v-for="task in expensesCustomers">
        <div class="form-group is-empty">
          <input
            type="text"
            class="form-control"
            placeholder="Задача"
            v-model="task.name"
          >
        </div>
        <div class="form-group is-empty">
          <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="Цена"
              v-model="task.price"
            >
            <span class="input-group-addon">руб.</span>
          </div>
        </div>
      </div>
      <button class="btn btn-success btn-fab" @click="addTask"><img src='/img/plus.svg'></button>
    </div>
  </div>
</template>

<script>
  export default {
    data: function () {
      return {
        expensesCustomers: this.expensesCustomersData
      }
    },

    props: {
      expensesCustomersData: Array
    },

    methods: {
      addTask: function () {
        const clearTask = {
          name: '',
          price: ''
        };
        this.expensesCustomers.push(clearTask);
      }
    }
  }
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

<template>
  <div>

    <steps
      :stepsData="steps"
    />

    <start
      v-if="steps.current == 0"
      :calculateData="calculate"
      :clientData="client"
    />

    <pagination
      :stepsData="steps"
    />

  </div>
</template>

<script>
  export default {
    components: {
      'steps': require('./Steps.vue'),
      'pagination': require('./StepsPagination.vue'),
      'start': require('./Start.vue')
    },

    data: function () {
      return {
        steps: {
          current: 0,
          list: [
            'Начало',
            'Задачи',
            'Дополнительные задачи',
            'Расходы клиента',
            'Результат'
          ]
        },
        calculate: {
          name: '',
          hourPrice: '',
        },
        client: {
          name: '',
          phone: '',
          mail: ''
        }
      }
    }

  }
</script>

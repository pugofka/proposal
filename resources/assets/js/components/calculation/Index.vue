<template>
  <div>
  <steps
    :stepsData="steps"
  />
  </div>
</template>

<script>
  export default {
    components: {
      'steps': require('./Steps.vue')
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
        }
      }
    }

  }
</script>

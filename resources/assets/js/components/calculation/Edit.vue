<template>
  <div>

    <steps
      :stepsData="steps"
    />

    <start
      v-if="steps.current == 0"
      :calculateData="calculate"
      :clientData="client"
      :problem="problem"
      :task="task"
      :target="target"
    />

    <stages
      v-if="steps.current == 1"
      :stagesData="stages"
      :hourPriceData="calculate.hourPrice"
      :templatesData="templatesData"
      :calculateData="calculate"
      :setStagesCallback="setStages"
    />

    <other-tasks
      v-if="steps.current == 2"
      :otherTasksData="otherTasks"
      :hourPriceData="calculate.hourPrice"
    />

    <expenses-customers
      v-if="steps.current == 3"
      :expensesCustomersData="expensesCustomers"
    />

    <result
      v-if="steps.current == 4"
      :hoursData="resultHours"
      :hourPriceData="this.calculate.hourPrice"
      :getPDFData="true"
      :id="calculate.id"
    />

    <pagination
      :stepsData="steps"
      :data="{
        id: calculate.id,
        name: calculate.name,
        cost_per_hour: calculate.hourPrice,
        user_name: client.name,
        user_phone: client.phone,
        user_email: client.mail,
        problem: client.problem,
        task: client.task,
        target: client.target,
        template_id: calculate.template,
        stages: stages,
        additional_tasks: otherTasks,
        info: expensesCustomers
      }"
    />

  </div>
</template>

<script>
export default {
  components: {
    steps: require("./Steps.vue"),
    pagination: require("./StepsPagination.vue"),
    start: require("./Start.vue"),
    stages: require("./StagesList.vue"),
    "other-tasks": require("./OtherTasks.vue"),
    "expenses-customers": require("./ExpensesCustomers.vue"),
    result: require("./Result.vue")
  },

  data: function() {
    return {
      steps: {
        current: 0,
        list: [
          "Начало",
          "Задачи",
          "Дополнительные задачи",
          "Расходы клиента",
          "Результат"
        ]
      },
      calculate: {
        id: this.calculateData.id,
        name: this.calculateData.name,
        hourPrice: this.calculateData.cost_per_hour,
        template: this.calculateData.template_id
      },
      client: {
        name: this.calculateData.user_name,
        phone: this.calculateData.user_phone,
        mail: this.calculateData.user_email
      },
      problem: this.calculateData.problem,
      target: this.calculateData.target,
      task: this.calculateData.task,
      tasks: JSON.parse(this.calculateData.tasks),
      stages: null,
      otherTasks: JSON.parse(this.calculateData.additional_tasks),
      expensesCustomers: JSON.parse(this.calculateData.info)
    };
  },

  props: {
    templatesData: {
      type: Array,
      required: true
    },
    calculateData: Object,
    required: true
  },

  computed: {
    resultHours: function() {
      let tasksHours = [];

      if (this.stages) {
        for (var i = 0; i < this.stages.length; i++) {
          for (var j = 0; j < this.stages[i].tasks.length; j++) {
            if (this.stages[i].tasks[j].hours) {
              const task = {
                name: this.stages[i].tasks[j].name,
                hours: +this.stages[i].tasks[j].hours
              };
              tasksHours.push(task);
            }
          }
        }
      }

      if (this.otherTasks) {
        for (var i = 0; i < this.otherTasks.length; i++) {
          if (this.otherTasks[i].hours) {
            const task = {
              name: this.otherTasks[i].name,
              hours: +this.otherTasks[i].hours
            };
            tasksHours.push(task);
          }
        }
      }

      return tasksHours;
    }
  },

  methods: {
    setStages: function(stages) {
      Vue.set(this, "stages", stages);
      this.mapStages();
    },

    getStages: function() {
      const t = this;
      axios
        .get("/calculations/template", {
          params: {
            id: this.calculateData.template_id
          }
        })
        .then(function(response) {
          t.setStages(response.data);
        })
        .catch(function(error) {
          console.error(error);
        });
    },

    mapStages: function() {
      const t = this;
      this.stages.map(function(item) {
        for (var i = 0; i < t.tasks.stages.length; i++) {
          if (t.tasks.stages[i].stage_id === item.id) {
            item.hours = t.tasks.stages[i].stage_hours;
            item.price = t.tasks.stages[i].stage_price;
            item.workers = t.tasks.stages[i].workers;

            item.tasks.map(function(task) {
              for (var j = 0; j < t.tasks.stages[i].tasks.length; j++) {
                if (t.tasks.stages[i].tasks[j].id === task.id) {
                  task.hours = t.tasks.stages[i].tasks[j].hours;
                  task.variant_name = t.tasks.stages[i].tasks[j].variant_name;
                  task.variant_id = t.tasks.stages[i].tasks[j].variant_id;
                }
              }
            });
          }
        }
        return item;
      });

      this.stages.map(function(item) {
        for (var i = 0; i < t.tasks.deffered_tasks.length; i++) {
          item.tasks.map(function(task) {
            if (t.tasks.deffered_tasks[i].id === task.id) {
              task.deffered = true;
            }
          });
        }
        return item;
      });
    }
  },

  created() {
    this.getStages();
  }
};
</script>

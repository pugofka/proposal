<template>
  <div class="pagination">
    <button v-if="status != 'firstPage'" type="button" class="btn btn__back" @click="setPreviousPage">Назад</button>
    <button v-if="status != 'lastPage'" type="button" class="btn btn-raised btn-success btn__next" @click="setNextPage">Продолжить</button>
  </div>
</template>

<script>
  export default {

    data: function () {
      return {
        steps: this.stepsData,
        status: null
      }
    },

    props: {
      stepsData: {
        type: Object,
        required: true
      }
    },

    methods: {

      setNextPage: function () {
        this.steps.current += 1;
      },

      setPreviousPage: function () {
        this.steps.current -= 1;
      },

      checkStepPosition(e) {
        const lastIndex = e.list.length-1;
        this.status = null;
        if(e.current == 0) this.status = 'firstPage';
        if(e.current == lastIndex) this.status = 'lastPage';
      }
    },

    watch: {
      steps: {
        handler: function (e) {
          this.checkStepPosition(e);
        },
        deep: true
      }
    },

    mounted() {
      this.checkStepPosition(this.steps)
    }

  }
</script>

<style scoped lang="scss">
  .pagination {
    display: flex;

    .btn__back {
      margin-left: 0;
      margin-right: auto;
    }

    .btn__next {
      margin-right: 0;
      margin-left: auto;
    }
  }
</style>

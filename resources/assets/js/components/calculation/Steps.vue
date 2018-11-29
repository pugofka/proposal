<template>
  <div class="steps">
    <ul class="steps__list">
      <li
        class="steps__item"
        v-for="(step, index) in steps.list"
        :key="index"
        :title="step"
        :class="{'steps__item--active': index == steps.current}"
        @click="setStep(index)"
      />
    </ul>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      steps: this.stepsData
    };
  },

  props: {
    stepsData: {
      type: Object,
      required: true
    }
  },

  methods: {
    setStep: function(index) {
      this.steps.current = index;
    }
  }
};
</script>

<style lang="scss">
.steps {
  text-align: center;
  margin-top: 15px;
  margin-bottom: 15px;

  &__list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: inline-flex;
    position: relative;

    &:before {
      content: "";
      width: 100%;
      height: 1px;
      background-color: #ccc;
      position: absolute;
      z-index: 1;
      left: 0;
      top: 50%;
    }
  }

  &__item {
    background-color: #f4511d;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 30px;
    position: relative;
    z-index: 2;
    cursor: pointer;
    counter-increment: step;
    display: flex;
    align-items: center;
    justify-content: center;

    &:hover {
      background-color: #ef8561;
    }

    &:before {
      content: counter(step);
      display: inline;
      color: #fff;
      font-size: 20px;
    }

    &:last-child {
      margin-right: 0;
    }

    &--active {
      background-color: #fff !important;

      &:before {
        color: #f4511d !important;
      }
    }
  }
}
</style>

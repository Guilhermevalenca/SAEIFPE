<template>
  <canvas :id="`myChart-${index}`"></canvas>
</template>

<script>
import Chart from "chart.js/auto";

export default {
  name: "ResponseAssembleGraphs",
  props: {
    question: Object,
    index: Number,
    type: String
  },
  data() {
    return {
      labels: [],
      responses: [],
      myChart : null
    }
  },
  methods: {
    assembleGraphs() {
      const ctx = document.querySelector(`#myChart-${this.index}`);

      this.myChart = new Chart(ctx, {
        type: this.type,
        data: {
          labels: this.labels,
          datasets: [{
            label: 'Nº de votos',
            data: this.responses,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    },
    separatingInformation() {
      const separatingLabels = new Set();
      this.question.map(value => {
        value.response.selected.map(selected => {

          separatingLabels.add(selected.descriptions);

        });
      });
      const labels = [...separatingLabels];
      const response = [];

      labels.map( (value, index) => {
        response[index] = 0;
      });

      this.question.map(value => {
        value.response.selected.map(selected => {

          labels.map((value, index) => {

            if(value === selected.descriptions) {
              response[index]+=1;
            }

          })

        })
      });
      this.labels = labels;
      this.responses = response;
      this.assembleGraphs();
    }
  },
  mounted() {
    // console.log(this.question);
    this.separatingInformation();
  },
  watch: {
    type: {
      handler() {
        this.myChart.destroy();
        this.assembleGraphs();
      },
      deep: true
    }
  }
}
</script>

<style scoped>

</style>

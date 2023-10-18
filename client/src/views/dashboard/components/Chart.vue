<template>
     <article
        class="p-5 bg-white grid grid-rows-[1fr_5fr] place-content-center"
      >
      <h1 class="text-lg font-semibold flex justify-between items-center">Overview <buttton class="hover:text-stone-500 cursor-pointer" @click="openAside()"><i class="fa fa-bars"></i></buttton></h1>
    <canvas id="chart-canvas" class="mt-3"></canvas>
    </article>
</template>

<script lang="js">
import Chart from 'chart.js/auto'

const planetChartData = {
  type: "bar",
  data: {
    labels: ["Mon","Tue",'Wed',"Thu","Fri","Sat","Sun"],
    datasets: [
      {
        label: "Created quizes",
        data: [2,1,3,1,5,4,5],
        backgroundColor: "rgba(122, 116, 252,.5)",
        borderColor: "#5a51ff",
        borderWidth: 1
      },
      {
        label: "Completed quizes",
        data: [7,5,2,1,6,4,3],
        backgroundColor: "rgba(1, 88, 196,.5)",
        borderColor: "rgb(1, 88, 196)",
        borderWidth: 1
      }
    ]
  },
  options: {
    responsive: true,
    lineTension: 1,
    scales: {
        y:{
            max:8
        },
      yAxes:[
        {
          ticks: {
            beginAtZero: true,
            padding: 25
          }
        }
      ]
    }
  }
};


export default{
    name:'chart',
    
  mounted() {
    const ctx = document.getElementById('chart-canvas');
    new Chart(ctx, planetChartData);
  },
  methods:{
    openAside(){
        this.$store.commit('setShowAside')
    }
  }
}
</script>
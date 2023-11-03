<template>
  <article
    class="order-first lg:order-auto p-3 md:p-5 bg-white grid grid-rows-[1fr_5fr]"
  >
    <div>
      <h1
        class="h-full text-lg font-semibold flex justify-between items-center"
      >
        Overview
      </h1>
    </div>
    <div class="flex items-center justify-center">
      <canvas
        id="chart-canvas"
        class="max-w-[100%] max-h-[100%] lg:max-h-[90%]"
      ></canvas>
    </div>
  </article>
</template>

<script lang="js">
  import Chart from 'chart.js/auto'

  const planetChartData = {
    type: "bar",
    data: {
      labels: ["6days","5 days", "4 days", "3 days", "2 days", "Yesterday"],
      datasets: [
        {
          label: "Created quizes",
          data: [2,1,3,1,5,5],
          backgroundColor: "rgba(122, 116, 252,.5)",
          borderColor: "#5a51ff",
          borderWidth: 1,
          borderRadius:5
        },
        {
          label: "Completed quizes",
          data: [7,5,2,1,6,1],
          backgroundColor: "rgba(1, 88, 196,.5)",
          borderColor: "rgb(1, 88, 196)",
          borderWidth: 1,
          borderRadius:5
        }
      ]
    },
    options: {
      responsive: true,
      lineTension: 1,
      scales: {
          y:{
              max:8,
              grid:{
                display:true
              }

          },
          x:{
            grid:{
              display:false
            }
          }

      },
      plugins:{
     legend: {
      display: false
     }
    }
    }
  };


  export default{
      name:'chart',

    mounted() {
      const ctx = document.getElementById('chart-canvas');
      new Chart(ctx, planetChartData);
    },

  }
</script>

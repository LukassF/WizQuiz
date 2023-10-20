<template>
    <div class="bg-white rounded-xl h-full grid grid-rows-2 drop-shadow-lg overflow-hidden">

<div class="flex justify-center items-center overflow-hidden">
<div class='w-full h-full relative opacity-50' :style="'background-color:'+color+';'">
    <!-- <span class="text-white text-xs absolute left-2 top-2">20 min</span> -->
</div>
</div>
          <div class="py-2 px-4 flex flex-col justify-center">
            <h1 class="break-all text-ellipsis line-clamp-1">Countries of the world</h1>
            <span class="text-stone-700 font-light text-sm">By Dozerson</span>
            <button class="mt-4 text-sm text-main-blue hover:text-blue-300">Start</button>
          </div>
    </div>
</template>

<script lang="ts">
    export default{
        name:'quizcard',
        data(){
            return{
                hexStr:'0123456789abcdef',
                color:'#'
            }
        },
        mounted(){
            for(let i = 0; i<6; i++)
                this.color += this.hexStr[Math.floor(Math.random() * this.hexStr.length)]
        }
    }
</script>
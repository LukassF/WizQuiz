<template>
  <div
    @mousemove="setTooltip($event)"
    @mouseleave="setTooltip($event, true)"
    class="bg-white rounded-xl h-full grid grid-rows-2 drop-shadow-lg overflow-hidden cursor-pointer"
  >
    <div class="flex justify-center items-center overflow-hidden">
      <div
        class="w-full h-full relative opacity-50"
        :style="'background-color:' + color + ';'"
      >
        <!-- <span class="text-white text-xs absolute left-2 top-2">20 min</span> -->
      </div>
    </div>
    <div class="py-2 px-4 flex flex-col justify-center">
      <h1 class="break-all text-ellipsis line-clamp-1">
        Countries of the world
      </h1>
      <span class="text-stone-700 font-light text-sm">By Dozerson</span>
      <div class="flex justify-between mt-2">
        <button class="text-sm text-main-blue hover:text-blue-300">
          Start
        </button>

        <button
          v-if="isMine"
          class="text-sm text-main-blue hover:text-blue-300"
        >
          Modify
        </button>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
  export default {
    name: "quizcard",
    data() {
      return {
        hexStr: "0123456789abcdef",
        color: "#",
      };
    },
    props: ["isMine"],
    mounted() {
      for (let i = 0; i < 6; i++)
        this.color +=
          this.hexStr[Math.floor(Math.random() * this.hexStr.length)];
    },
    methods: {
      setTooltip(e: MouseEvent, hasLeft = false) {
        this.$store.commit("setTooltipParams", {
          x: e.clientX - 100,
          y: e.clientY - 50,
          show: hasLeft ? false : true,
          content: "Countries of the world",
        });
      },
    },
  };
</script>

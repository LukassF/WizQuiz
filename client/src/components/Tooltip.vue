<template>
  <div
    class="fixed z-[200] px-5 w-[180px] break-all text-center py-2 drop-shadow-lg bg-black bg-opacity-90 text-white rounded-2xl text-sm"
    ref="tooltipRef"
    :style="'visibility:' + (tooltipParams.show ? 'visible;' : 'hidden;')"
  >
    {{ $store.state.tooltipParams.content }}
  </div>
</template>

<script lang="ts">
  import gsap from "gsap";
  import { ref } from "vue";

  export default {
    name: "tooltip",
    computed: {
      tooltipParams() {
        return this.$store.state.tooltipParams;
      },
    },
    watch: {
      tooltipParams: function (old, newV) {
        gsap.to(this.tooltipRef, { duration: 0.2, x: newV.x, y: newV.y });
      },
    },
    setup() {
      const tooltipRef = ref(null);

      return {
        tooltipRef,
      };
    },
  };
</script>

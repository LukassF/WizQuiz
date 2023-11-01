<template>
  <section
    @click="closeQuizCreator($event)"
    class="fixed overflow-y-auto overflow-x-hidden left-0 top-0 w-screen h-screen bg-black bg-opacity-60 z-[1200] grid place-content-center"
  >
    <article
      ref="quizref"
      class="overflow-y-auto absolute z-20 h-full w-full box-full:h-[80%] max-h-[820px] box-full:aspect-[4/5] box-full:w-auto left-0 box-full:left-1/2 top-1/2 -translate-y-1/2 -translate-x-0 box-full:-translate-x-1/2 bg-white shadow-[4.0px_4.0px_1.0px_5px_rgba(0,0,0,0.18)] box-full:rounded-lg p-10"
    >
      <form class="grid grid-rows-[1fr_8fr] h-full relative" autocomplete="off">
        <div>
          <h1 class="text-2xl font-semibold relative">
            Quiz info
            <button
              @click="closeQuizCreator()"
              class="absolute right-0 top-0 font-semibold text-lg text-slate-400"
            >
              <i class="fa fa-arrow-left"></i>
            </button>
          </h1>
          <p class="text-sm text-stone-600 font-light">
            Give some basic info about your quiz!
          </p>
        </div>

        <div class="grid grid-rows-[1fr_2fr_2fr_2fr_1fr_2fr] gap-5">
          <div class="flex items-center">
            <div class="w-full h-[1px] bg-slate-400"></div>
          </div>
          <div class="flex items-center">
            <input
              type="text"
              placeholder="Quiz name"
              class="h-full px-3 text-slate-600 outline-none max-h-[65px] rounded-xl border border-solid border-slate-400 w-full"
            />
          </div>
          <div class="flex items-center">
            <input
              type="text"
              placeholder="Quiz description"
              class="h-full px-3 text-slate-600 outline-none rounded-xl max-h-[65px] border border-solid border-slate-400 w-full"
            />
          </div>
          <div class="flex items-center gap-3">
            <select
              class="bg-white px-4 h-full rounded-xl max-h-[65px] appearance-none text-sm border border-slate-400 text-stone-500"
            >
              <option>History</option>
              <option>Geography</option>
              <option>Nature</option>
              <option>Sports</option>
              <option>Science</option>
              <option>Others</option>
            </select>
            <span class="text-xs text-stone-700">Select category</span>
          </div>

          <div class="flex items-center">
            <div class="w-full h-px bg-slate-400"></div>
          </div>
          <div class="flex items-center">
            <button
              @click="goToQuizCreation()"
              type="submit"
              class="hover:bg-indigo-500 transition-all h-full max-h-[65px] bg-featured rounded-xl text-white font-bold w-full"
            >
              Confirm
            </button>
          </div>
        </div>
      </form>
    </article>
  </section>
</template>

<script lang="ts">
  import gsap from "gsap";
  import { ref } from "vue";

  export default {
    name: "name-quiz",
    methods: {
      closeQuizCreator(e?: Event) {
        if (e?.target === e?.currentTarget || !e)
          this.$store.commit("setShowQuizCreator", false);
      },

      goToQuizCreation() {
        this.$router.push("/create");
      },
    },
    mounted() {
      gsap.from(this.quizref, { duration: 0.3, opacity: 0 });
    },
    setup() {
      const quizref = ref(null);

      return {
        quizref,
      };
    },
  };
</script>

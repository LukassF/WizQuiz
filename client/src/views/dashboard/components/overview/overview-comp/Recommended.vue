<template>
  <article
    class="bg white p-3 md:p-5 grid h-full grid-rows-[1fr_3fr] lg/2:col-span-2 border-t border-slate-300"
  >
    <div>
      <h1 class="text-lg font-semibold flex justify-between items-center">
        Recommended for you!
      </h1>
      <p class="text-stone-600 font-light">Last 10 days</p>
      <hr class="my-3" />
    </div>
    <section
      class="overflow-y-auto lg/2:mt-0 -mt-20 sm/2:-mt-12 md:px-3 py-2 grid grid-rows-3 grid-cols-1 sm/2:grid-cols-2 sm/2:grid-rows-2 md:grid-cols-3 lg/2:grid-cols-3 lg/2:grid-rows-1 lg:grid-cols-3 auto-rows-[0fr] xl/2:grid-cols-4 gap-4 justify-center items-center place-content-center"
    >
      <QuizCard :isMine="false" />
      <QuizCard :isMine="false" />
      <QuizCard :isMine="false" />
      <QuizCard :isMine="false" />
    </section>
  </article>
</template>

<script lang="ts">
  import QuizCard from "../../../../../components/QuizCard.vue";
  export default {
    name: "recommended",
    components: {
      QuizCard,
    },
  };
</script>

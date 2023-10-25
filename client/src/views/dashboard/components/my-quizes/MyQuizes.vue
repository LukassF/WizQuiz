<template>
  <section
    class="grid grid-rows-[1fr_5.5fr] lg/2:grid-rows-[1fr_9fr] w-full h-full"
  >
    <article class="p-5 border-b border-stone-200">
      <h1 class="text-lg font-semibold w-full">Created quizes</h1>
      <p
        class="text-stone-700 mt-4 xs:mt-0 text-[10px] xs:text-xs sm:text-sm font-light"
      >
        Below displayed are all of your quizes. You can amend them or delete
        them completely from the servers. Check out the options!
      </p>

      <input
        type="text"
        placeholder="Find your quiz"
        class="bg-slate-100 py-2 mt-5 px-5 outline-none rounded-xl border border-solid border-slate-400 drop-shadow-sm text-xs sm:text-sm"
      />
    </article>

    <article
      class="p-5 h-full grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5 overflow-y-auto overflow-x-hidden max-h-[1000px] lg/2:max-h-auto"
    >
      <QuizCard :isMine="true" :minH="true" />
      <QuizCard :isMine="true" :minH="true" />
      <QuizCard :isMine="true" :minH="true" />
      <QuizCard :isMine="true" :minH="true" />
      <QuizCard :isMine="true" :minH="true" />
      <QuizCard :isMine="true" :minH="true" />
      <QuizCard :isMine="true" :minH="true" />
      <QuizCard :isMine="true" :minH="true" />
      <QuizCard :isMine="true" :minH="true" />
      <QuizCard :isMine="true" :minH="true" />
      <QuizCard :isMine="true" :minH="true" />
      <QuizCard :isMine="true" :minH="true" />
    </article>
  </section>
</template>

<script lang="ts">
  import QuizCard from "../../../../components/QuizCard.vue";
  export default {
    name: "my-quizes",
    components: {
      QuizCard,
    },
  };
</script>

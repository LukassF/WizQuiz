<template>
  <section
    class="grid grid-rows-[1fr_4fr] lg/2:grid-rows-[1fr_9fr] w-full h-full"
  >
    <article class="p-5 border-b border-stone-200">
      <h1 class="text-lg font-semibold w-full">Find quizes</h1>
      <p
        class="text-stone-700 mt-4 xs:mt-0 text-[10px] xs:text-xs sm:text-sm font-light"
      >
        Below you can find any course you wish. Search by name, author or
        filter. You can also use some filters below!
      </p>

      <div
        class="flex flex-col items-start gap-5 lg/2:flex-row lg/2:justify-between lg/2:items-center relative mt-5"
      >
        <input
          type="text"
          placeholder="Find your quiz"
          class="bg-slate-100 py-2 px-5 outline-none rounded-xl border border-solid border-slate-400 drop-shadow-sm text-xs sm:text-sm"
        />

        <ul
          class="flex flex-wrap lg/2:flex-nowrap gap-3 items-center [&>*]:bg-white [&>*]:border-slate-400 [&>*]:border [&>*]:bg-opacity-70 [&>*]:text-slate-400 [&>*]:text-[9px] md:[&>*]:text-[10px] [&>*]:px-4 lg/2:[&>*]:px-3 xl/2:[&>*]:px-4 [&>*]:py-[6px] md:[&>*]:py-2 [&>*]:rounded-full [&>*]:cursor-pointer [&>*]:transition-all [&>*]:ease-in-out"
        >
          <li
            class="hover:scale-105"
            @click="selectFilter('geography')"
            :style="
              filter === 'geography'
                ? 'border-color:rgb(31,45,65); color:rgb(31,45,65) ;border-width:1.5px;'
                : ''
            "
          >
            Geography
          </li>
          <li
            class="hover:scale-105"
            @click="selectFilter('sports')"
            :style="
              filter === 'sports'
                ? 'border-color:rgb(31,45,65); color:rgb(31,45,65) ;border-width:1.5px;'
                : ''
            "
          >
            Sports
          </li>
          <li
            class="hover:scale-105"
            @click="selectFilter('science')"
            :style="
              filter === 'science'
                ? 'border-color:rgb(31,45,65); color:rgb(31,45,65) ;border-width:1.5px;'
                : ''
            "
          >
            Science
          </li>
          <li
            class="hover:scale-105"
            @click="selectFilter('history')"
            :style="
              filter === 'history'
                ? 'border-color:rgb(31,45,65); color:rgb(31,45,65) ;border-width:1.5px;'
                : ''
            "
          >
            History
          </li>
          <li
            class="hover:scale-105"
            @click="selectFilter('nature')"
            :style="
              filter === 'nature'
                ? 'border-color:rgb(31,45,65); color:rgb(31,45,65) ;border-width:1.5px;'
                : ''
            "
          >
            Nature
          </li>
          <li
            class="hover:scale-105"
            @click="selectFilter('others')"
            :style="
              filter === 'others'
                ? 'border-color:rgb(31,45,65); color:rgb(31,45,65) ;border-width:1.5px;'
                : ''
            "
          >
            Others
          </li>
        </ul>
      </div>
    </article>

    <!-- <section class="grid grid-rows-[1fr_5fr]"> -->
    <!-- <h1 class="p-5 col-span-4 text-lg font-semibold bg-red-400">
        <span class="font-light">Results for: </span>Recommended
      </h1> -->
    <article
      class="p-5 w-full grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5 overflow-y-auto overflow-x-hidden max-h-[1000px] lg/2:max-h-auto"
    >
      <h1
        class="col-span-1 xs:col-span-2 md:col-span-3 xl:col-span-4 text-md font-semibold"
      >
        <span class="font-light">Results for: </span>Recommended
      </h1>
      <QuizCard :isMine="false" :minH="true" />
      <QuizCard :isMine="false" :minH="true" />
      <QuizCard :isMine="false" :minH="true" />
      <QuizCard :isMine="false" :minH="true" />
      <QuizCard :isMine="false" :minH="true" />
      <QuizCard :isMine="false" :minH="true" />
      <QuizCard :isMine="false" :minH="true" />
      <QuizCard :isMine="false" :minH="true" />
      <QuizCard :isMine="false" :minH="true" />
      <QuizCard :isMine="false" :minH="true" />
      <QuizCard :isMine="false" :minH="true" />
      <QuizCard :isMine="false" :minH="true" />
    </article>
    <!-- </section> -->
  </section>
</template>

<script lang="ts">
  import QuizCard from "../../../../components/QuizCard.vue";
  export default {
    name: "find",
    data() {
      return {
        filter: "",
      };
    },
    components: {
      QuizCard,
    },
    methods: {
      selectFilter(filterName: string) {
        this.filter = filterName;
      },
    },
  };
</script>

<template>
    <article
        class="p-5 grid grid-rows-[1fr_3fr] bg-white col-span-2 min-h-[300px] border-t border-slate-300"
      >
      
      <div>
      <h1 class="text-lg font-semibold flex justify-between items-center">Recommended for you!</h1>
    <p class="text-stone-600 font-light">Last 10 days</p>
    <hr class="my-3">
</div>
      <section class="px-3 py-3 grid grid-cols-2 md:grid-cols-3 lg/2:grid-cols-4 grid-rows-1 auto-rows-[0fr] xl/2:grid-cols-4 gap-3">
        <QuizCard />
        <QuizCard />
        <QuizCard />
        <QuizCard />


      </section>
      </article>
</template>

<script lang="ts">
import QuizCard from '../../../components/QuizCard.vue'
export default{
    name:'recommended',
    components:{
        QuizCard
    }
}
</script>
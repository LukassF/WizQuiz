<template>
  <section
    class="grid min-h-[625px] grid-cols-1 grid-rows-[2fr_3fr] gap-0 rounded-xl overflow-hidden"
  >
  <article class="border-b p-5">
    <div>
        <h1 class="text-lg font-semibold w-full">My subscription</h1>
        <p class="text-stone-700 text-sm font-light">Currently active billing option, you can modify it below.</p>
    </div>

</article>
<article class=" p-5">
    <div>
        <h1 class="text-lg font-semibold w-full">Choose new plan</h1>
        <p class="text-stone-700 text-sm font-light">Other billing options!</p>
    </div>
</article>
  </section>
</template>

<script lang="ts">
export default {
  name: "subscriptions",
};
</script>

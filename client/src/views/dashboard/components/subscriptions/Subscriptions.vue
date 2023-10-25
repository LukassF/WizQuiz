<!-- IMPLEMENT CANCEL FOR BOTH BUTTONS -->

<template>
  <section class="flex flex-col gap-0 rounded-xl overflow-hidden">
    <article class="border-b p-5">
      <div>
        <h1 class="text-lg font-semibold w-full">My subscription</h1>
        <p class="text-stone-700 text-sm font-light">
          Currently active billing option.
        </p>
      </div>

      <div
        class="border-[2px] border-featured w-full min-h-[140px] rounded-2xl mt-3 p-4 grid grid-cols-1 sm/2:grid-cols-2 md:grid-cols-3 lg/2:grid-cols-[2fr_3fr_3fr] gap-5"
      >
        <div class="flex flex-col justify-center items-center">
          <h1 class="text-2xl font-semibold m-0 text-featured">FREE</h1>
          <span class="text-stone-700 text-lg">0.00$/ per month</span>
        </div>

        <div class="flex flex-col justify-center items-center sm/2:items-start">
          <h3>Now active through</h3>
          <span class="text-sm font-light text-stone-700"
            >Mon, 23.10.2023 - Fri 22.11.2023</span
          >
          <div class="flex justify-center sm/2:justify-start mt-3 gap-3 w-full">
            <button
              class="px-5 py-[6px] border border-featured text-featured rounded-xl text-xs hover:bg-featured hover:text-white transition-all"
            >
              Extend
            </button>

            <button
              class="px-5 py-[6px] border border-featured text-featured rounded-xl text-xs hover:bg-featured hover:text-white transition-all block md:hidden"
            >
              Cancel
            </button>
          </div>
        </div>

        <div class="flex-col justify-end items-end gap-1 hidden md:flex">
          <button
            class="bg-featured px-5 py-[6px] text-xs text-white rounded-xl"
          >
            Cancel
          </button>
          <p class="text-xs font-light text-stone-400 pr-1">
            Beware, this action is irreversible!
          </p>
        </div>
      </div>
    </article>
    <article class="p-5 pt-3">
      <div>
        <h1 class="text-lg font-semibold w-full">Choose new plan</h1>
        <p class="text-stone-700 text-sm font-light">Other billing options!</p>
      </div>

      <div
        class="bg-white hover:shadow-[2px_2px_1px_3px_rgba(0,0,0,0.1)] hover:bg-slate-100 transition-all cursor-pointer border border-stone-400 w-full min-h-[140px] rounded-2xl mt-3 p-4 grid grid-cols-1 sm/2:grid-cols-2 md:grid-cols-[1fr_2fr] lg/2:grid-cols-[2fr_6fr] gap-5"
      >
        <div class="flex flex-col justify-center items-center">
          <h1 class="text-xl font-semibold m-0">STANDARD</h1>
          <span class="text-stone-700 text-lg">9.99$/ per month</span>
        </div>

        <div class="flex flex-col justify-center items-center sm/2:items-start">
          <h3>Best deal for you!</h3>
          <span class="text-sm font-light text-stone-700"
            >More features and support</span
          >
          <button
            class="px-5 py-[6px] border border-featured text-featured rounded-xl text-xs mt-3 hover:bg-featured hover:text-white transition-all"
          >
            Choose
          </button>
        </div>

        <!-- <div class="flex flex-col justify-start items-end gap-3">
            <button class="bg-featured px-5 py-[6px] text-xs text-white rounded-xl">Cancel</button>
        </div> -->
      </div>

      <div
        class="bg-white hover:shadow-[2px_2px_1px_3px_rgba(0,0,0,0.1)] hover:bg-slate-100 transition-all cursor-pointer border border-stone-400 w-full min-h-[140px] rounded-2xl mt-3 p-4 grid grid-cols-1 sm/2:grid-cols-2 md:grid-cols-[1fr_2fr] lg/2:grid-cols-[2fr_6fr] gap-5"
      >
        <div class="flex flex-col justify-center items-center">
          <h1 class="text-xl font-semibold m-0">PREMIUM</h1>
          <span class="text-stone-700 text-lg">14.99$/ per month</span>
        </div>

        <div class="flex flex-col justify-center items-center sm/2:items-start">
          <h3>Become a pro member!</h3>
          <span class="text-sm font-light text-stone-700"
            >Constant support and incredible features!</span
          >
          <button
            class="px-5 py-[6px] border border-featured text-featured rounded-xl text-xs mt-3 hover:bg-featured hover:text-white transition-all"
          >
            Choose
          </button>
        </div>

        <!-- <div class="flex flex-col justify-start items-end gap-3">
            <button class="bg-featured px-5 py-[6px] text-xs text-white rounded-xl">Cancel</button>
        </div> -->
      </div>
    </article>
  </section>
</template>

<script lang="ts">
  export default {
    name: "subscriptions",
  };
</script>

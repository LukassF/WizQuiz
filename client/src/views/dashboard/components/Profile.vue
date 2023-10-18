<template>
  <article
    class="p-5 overflow-hidden bg-white  grid grid-rows-[1fr_5fr] border-r border-slate-300"
  >
    <h1 class="text-lg font-semibold flex justify-between items-center">
      My profile
      <button
        class="bg-main-blue px-4 py-[7px] rounded-xl text-white text-sm font-normal"
      >
        Edit info
      </button>
    </h1>
    <article class="grid w-full">
      <div class="flex items-center py-3 gap-3">
        <div
          class="w-[90px] aspect-square rounded-full overflow-hidden drop-shadow-md"
        >
          <img
            src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png"
            class="w-full h-full object-cover"
          />
        </div>
        <ul class="flex flex-col gap-2">
          <li class="font-medium text-lg">Username</li>
          <li class="-mt-2 text-sm font-light text-stone-600">
            Email@ElementInternals.com
          </li>
          <!-- <li class="bg-yellow-300 rounded-full text-center px-2 py-[2px] text-white">Pro plan</li> -->
        </ul>
      </div>
      <div class="px-3 py-2">
        <ul
          class="grid grid-cols-3 gap-2 [&>*]:bg-stone-100 [&>*]:drop-shadow-md [&>*]:px-3 [&>*]:py-2 [&>*]:flex [&>*]:flex-col [&>*]:rounded-xl"
        >
          <li>
            <h3>0</h3>
            <p class="text-xs text-stone-700 whitespace-nowrap">Created</p>
          </li>
          <li>
            <h3>0</h3>
            <p class="text-xs text-stone-700 whitespace-nowrap">Completed</p>
          </li>
          <li>
            <h3>0</h3>
            <p class="text-xs text-stone-700 whitespace-nowrap">Shared</p>
          </li>
        </ul>
      </div>
    </article>
  </article>
</template>

<script lang="ts">
export default{
    name:'profile'
}
</script>

<template>
  <ModifyProfile v-if="$store.state.showModifyProfile" />
  <article
    class="p-3 md:p-5 items-center overflow-hidden bg-white grid grid-rows-[1fr_5fr] border-t border-l-0 lg/2:border-l lg/2:border-t-0 border-slate-300"
  >
    <div>
      <h1
        class="h-full text-lg font-semibold flex justify-between lg/2:justify-start gap-6 items-center"
      >
        My profile
        <button
          class="border border-main-blue px-4 py-[4px] rounded-xl text-main-blue hover:bg-main-blue hover:text-white transition-all text-sm font-normal"
          @click="openModifyProfile()"
        >
          Edit info
        </button>
      </h1>
    </div>
    <div class="md/2:px-3 py-2 md/2:py-0 flex flex-col justify-evenly h-full">
      <div class="flex items-center py-3 gap-3">
        <div
          class="w-[50px] md/2:w-[90px] aspect-square rounded-full overflow-hidden drop-shadow-md"
        >
          <img
            src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png"
            class="w-full h-full object-cover"
          />
        </div>
        <ul class="flex flex-col gap-2">
          <li class="font-medium text-md md:text-lg">Username</li>
          <li
            class="-mt-2 text-xs md:text-sm font-light text-stone-600 line-clamp-1"
          >
            Email@ElementInternals.com
          </li>
        </ul>
      </div>
      <div class="py-3 md/2:py-2">
        <ul
          class="grid grid-cols-3 gap-4 [&>*]:bg-stone-100 [&>*]:drop-shadow-md [&>*]:px-3 [&>*]:py-2 [&>*]:flex [&>*]:flex-col [&>*]:rounded-xl"
        >
          <li>
            <h3>0</h3>
            <p
              class="text-[10px] sm/2:text-xs text-stone-700 whitespace-nowrap"
            >
              Created
            </p>
          </li>
          <li>
            <h3>0</h3>
            <p
              class="text-[10px] sm/2:text-xs text-stone-700 whitespace-nowrap"
            >
              Completed
            </p>
          </li>
          <li>
            <h3>0</h3>
            <p
              class="text-[10px] sm/2:text-xs text-stone-700 whitespace-nowrap"
            >
              Shared
            </p>
          </li>
        </ul>
      </div>
    </div>
    <!-- <h1 class="text-lg font-semibold flex justify-between items-center">
      My profile
      <button
        class="bg-main-blue px-4 py-[7px] rounded-xl text-white text-sm font-normal"
      >
        Edit info
      </button>
    </h1>
    <article class="grid w-full">
     
    </article> -->
  </article>
</template>

<script lang="ts">
  import ModifyProfile from "./ModifyProfile.vue";
  export default {
    name: "profile",
    components: {
      ModifyProfile,
    },
    methods: {
      openModifyProfile() {
        this.$store.commit("setShowModifyProfile", true);
      },
    },
  };
</script>

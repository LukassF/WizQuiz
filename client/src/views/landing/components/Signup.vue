<template>
  <section
    @click="closeSignup($event)"
    class="fixed overflow-y-auto overflow-x-hidden left-0 top-0 w-screen h-screen bg-black bg-opacity-60 z-[1200] grid place-content-center"
  >
    <article
      ref="boxref"
      class="overflow-y-auto absolute z-20 h-full w-full xs:h-[80%] xs:aspect-[4/5] xs:w-auto left-0 xs:left-1/2 top-0 xs:top-14 -translate-x-0 xs:-translate-x-1/2 bg-white shadow-[4.0px_4.0px_1.0px_5px_rgba(0,0,0,0.18)] xs:rounded-lg p-10"
    >
      <form class="grid grid-rows-[1fr_8fr] h-full">
        <div>
          <h1 class="text-2xl font-semibold relative">
            Sign up
            <button
              @click="closeSignup()"
              class="absolute right-0 top-0 font-semibold text-lg"
            >
              <i class="fa fa-arrow-left"></i>
            </button>
          </h1>
          <p class="text-sm text-stone-600 font-light">
            Join our great community!
          </p>
        </div>

        <div class="grid grid-rows-[1fr_2fr_2fr_2fr_1.5fr_1fr_2fr] gap-3">
          <div class="flex items-center">
            <div class="w-full h-[1px] bg-slate-400"></div>
          </div>
          <div class="flex items-center">
            <input
              type="text"
              placeholder="Username"
              class="h-full px-3 outline-none rounded-xl max-h-[65px] border border-solid border-slate-400 w-full"
            />
          </div>
          <div class="flex items-center">
            <input
              type="email"
              placeholder="Email"
              class="h-full px-3 outline-none rounded-xl max-h-[65px] border border-solid border-slate-400 w-full"
            />
          </div>
          <div class="flex items-center">
            <input
              type="password"
              placeholder="Password"
              class="h-full px-3 outline-none rounded-xl max-h-[65px] border border-solid border-slate-400 w-full"
            />
          </div>
          <div class="flex items-center">
            <div class="flex gap-2 px-2">
              <input type="checkbox" id="rememberme" class="scale-110" />
              <label for="rememberme" class="text-stone-600 font-light text-sm"
                >Accept terms of use</label
              >
            </div>
          </div>
          <div class="flex items-center">
            <div class="w-full h-[1px] bg-slate-400"></div>
          </div>
          <div class="flex items-center">
            <button
              type="submit"
              class="hover:bg-indigo-500 transition-all h-full max-h-[65px] bg-featured rounded-xl text-white font-bold w-full"
            >
              Create account
            </button>
          </div>
        </div>

        <!-- <hr />
        <div class="flex flex-col gap-5">
          <input
            type="text"
            placeholder="Username"
            class="bg-slate-100 h-[45px] px-3 outline-none rounded-2xl border border-solid border-slate-400 drop-shadow-md"
          />
          <input
            type="email"
            placeholder="Email"
            class="bg-slate-100 h-[45px] px-3 outline-none rounded-2xl border border-solid border-slate-400 drop-shadow-md"
          />
          <input
            type="password"
            placeholder="Password"
            class="bg-slate-100 h-[45px] px-3 outline-none rounded-2xl border border-solid border-slate-400 drop-shadow-md"
          />
          <div class="flex gap-2 px-2">
            <input type="checkbox" id="rememberme" class="scale-110" />
            <label for="rememberme" class="text-stone-600 font-light text-sm"
              >Accept terms of use</label
            >
          </div>

          <button
            type="submit"
            class="mt-5 hover:bg-indigo-500 transition-all h-[45px] bg-featured rounded-2xl text-white font-bold"
          >
            Create account
          </button>
        </div> -->
      </form>
    </article>
  </section>
</template>

<script lang="ts">
  import gsap from "gsap";
  import { ref } from "vue";

  export default {
    name: "signup",
    methods: {
      closeSignup(e?: Event) {
        if (e?.target === e?.currentTarget || !e)
          this.$store.commit("setShowSignup", false);
      },
    },
    mounted() {
      gsap.from(this.boxref, { duration: 0.3, opacity: 0 });
    },
    setup() {
      const boxref = ref(null);

      return {
        boxref,
      };
    },
  };
</script>

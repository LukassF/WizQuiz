<template>
  <div
    @click="closeModifyProfile($event)"
    class="fixed overflow-y-auto overflow-x-hidden left-0 top-0 w-screen h-screen bg-black bg-opacity-60 z-[1200] grid place-content-center"
  >
    <div
      id="box"
      class="overflow-y-auto absolute z-20 h-full w-full box-full:h-[80%] max-h-[820px] box-full:aspect-[4/5] box-full:w-auto left-0 box-full:left-1/2 top-1/2 -translate-y-1/2 -translate-x-0 box-full:-translate-x-1/2 bg-white shadow-[4.0px_4.0px_1.0px_5px_rgba(0,0,0,0.18)] box-full:rounded-lg p-10"
    >
      <div class="w-full">
        <h1 class="w-full text-2xl font-semibold relative">
          Modify profile
          <button
            @click="closeModifyProfile()"
            class="absolute right-0 top-0 font-semibold text-lg text-slate-400"
          >
            <i class="fa fa-arrow-left"></i>
          </button>
        </h1>
        <p class="text-xs sm/2:text-sm text-stone-600 font-light">
          Change your name, profile image and more!
        </p>
      </div>
      <div
        class="h-full w-full grid grid-rows-[1fr_4fr_2fr_2fr_1fr_2fr] gap-5 relative"
      >
        <div class="flex items-center">
          <div class="w-full h-[1px] bg-slate-400"></div>
        </div>
        <div class="relative items-stretch justify-center flex bg-cover">
          <div
            class="aspect-square rounded-full relative overflow-hidden bg-cover bg-center cursor-pointer"
            :style="'background-image:url(' + imageBase64 + ');'"
            @click="chooseFile()"
          >
            <input
              type="file"
              ref="fileRef"
              @change="setNewImage($event)"
              class="hidden text-slate-600"
            />
          </div>
        </div>
        <div class="flex items-center">
          <input
            value="Username"
            type="text"
            placeholder="Username"
            class="h-full px-3 text-slate-600 outline-none rounded-xl max-h-[65px] border border-solid border-slate-400 w-full"
          />
        </div>
        <div class="flex items-center">
          <input
            value="Email@ElementInternals.com"
            type="email"
            placeholder="Email"
            class="h-full text-slate-600 px-3 outline-none rounded-xl max-h-[65px] border border-solid border-slate-400 w-full"
          />
        </div>
        <div class="flex items-center">
          <div class="w-full h-[1px] bg-slate-400"></div>
        </div>
        <div class="">
          <button
            type="submit"
            class="hover:bg-indigo-500 transition-all h-full max-h-[65px] bg-featured rounded-xl text-white font-bold w-full"
          >
            Confirm
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
  import gsap from "gsap";
  import { ref } from "vue";

  const ALLOWED_TYPES = ["jpeg", "webp", "png", "svg+xml"];

  export default {
    name: "modify-profile",
    data() {
      return {
        imageBase64: "https://cdn-icons-png.flaticon.com/512/3177/3177440.png",
      };
    },
    methods: {
      closeModifyProfile(e?: Event) {
        if (e?.target === e?.currentTarget || !e)
          this.$store.commit("setShowModifyProfile", false);
      },

      chooseFile() {
        if (this.fileRef) (this.fileRef as any).click();
      },

      setNewImage(e: Event) {
        if (!e.target || (e.target as HTMLInputElement).files!.length === 0)
          return;
        const file = (e.target as HTMLInputElement).files![0];
        const extension = file.type.split("/").pop();
        console.log(file);

        if (!ALLOWED_TYPES.includes(extension!)) return;

        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
          this.imageBase64 = reader.result ? (reader.result as string) : "";
        };
      },
    },
    mounted() {
      gsap.from("#box", { duration: 0.3, opacity: 0 });
    },
    setup() {
      const fileRef = ref(null);

      return {
        fileRef,
      };
    },
  };
</script>

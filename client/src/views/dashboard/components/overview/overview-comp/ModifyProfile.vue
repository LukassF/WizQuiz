<template>
  <div
    @click="closeModifyProfile($event)"
    class="fixed overflow-y-auto overflow-x-hidden left-0 top-0 w-screen h-screen bg-black bg-opacity-60 z-50 grid place-content-center"
  >
    <div
      id="box"
      class="overflow-y-auto absolute grid grid-rows-[1fr_8fr] items-center gap-3 z-[3000] h-full w-full xs:h-[80%] xs:aspect-[4/5] xs:w-auto left-0 xs:left-1/2 top-0 xs:top-14 xs:-translate-x-1/2 bg-white shadow-[4.0px_4.0px_1.0px_5px_rgba(0,0,0,0.18)] xs:rounded-lg p-8"
    >
      <div class="w-full">
        <h1 class="w-full text-2xl font-semibold relative">
          Modify profile
          <button
            @click="closeModifyProfile()"
            class="absolute right-0 top-0 font-semibold text-lg"
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
        <div class="relative items-stretch justify-center flex">
          <div
            class="min-h-[100px] aspect-square rounded-full relative overflow-hidden bg-cover bg-center cursor-pointer"
            :style="'background-image:url(' + imageBase64 + ');'"
            @click="chooseFile()"
          >
            <input
              type="file"
              ref="fileRef"
              @change="setNewImage($event)"
              class="hidden"
            />
          </div>
        </div>
        <div class="flex items-center">
          <input
            value="Username"
            type="text"
            placeholder="Username"
            class="h-full px-3 outline-none rounded-xl max-h-[65px] border border-solid border-slate-400 w-full"
          />
        </div>
        <div class="flex items-center">
          <input
            value="Email@ElementInternals.com"
            type="email"
            placeholder="Email"
            class="h-full px-3 outline-none rounded-xl max-h-[65px] border border-solid border-slate-400 w-full"
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

      <!-- <div>
        <div
          @click="chooseFile()"
          class="cursor-pointer w-[120px] aspect-square rounded-full overflow-hidden drop-shadow-lg mt-5 transition-all hover:shadow-[0.0px_0.0px_10.0px_3px_rgba(0,0,0,0.08)]"
        >
          <img :src="imageBase64" class="w-full h-full object-cover" />
          <input type="file" ref="fileRef" @change="setNewImage($event)" />
        </div>
      </div>

      <form class="flex flex-col gap-6 w-full justify-center h-full">
        <div class="flex flex-col gap-5">
          <input
            value="Username"
            type="text"
            placeholder="Username"
            class="bg-slate-100 h-[45px] px-3 outline-none rounded-2xl border border-solid border-slate-400 drop-shadow-md"
          />
          <input
            value="Email@ElementInternals.com"
            type="email"
            placeholder="Email"
            class="bg-slate-100 h-[45px] px-3 outline-none rounded-2xl border border-solid border-slate-400 drop-shadow-md"
          />

          <button
            type="submit"
            class="hover:bg-indigo-500 transition-all h-[45px] bg-featured rounded-2xl text-white font-bold"
          >
            Confirm
          </button>
        </div>
      </form> -->
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

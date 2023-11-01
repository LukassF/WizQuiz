<template>
  <section
    @click="closeSignup($event)"
    class="fixed overflow-y-auto overflow-x-hidden left-0 top-0 w-screen h-screen bg-black bg-opacity-60 z-[1000] grid place-content-center"
  >
    <article
      ref="boxref"
      class="overflow-y-auto absolute z-20 h-full w-full box-full:h-[80%] max-h-[820px] box-full:aspect-[4/5] box-full:w-auto left-0 box-full:left-1/2 top-1/2 -translate-y-1/2 -translate-x-0 box-full:-translate-x-1/2 bg-white shadow-[4.0px_4.0px_1.0px_5px_rgba(0,0,0,0.18)] box-full:rounded-lg p-10"
    >
      <form
        class="grid grid-rows-[1fr_8fr] h-full"
        @submit.prevent="signUp"
        autocomplete="off"
      >
        <div>
          <h1 class="text-2xl font-semibold relative">
            Sign up
            <button
              @click="closeSignup()"
              class="absolute right-0 top-0 font-semibold text-lg text-slate-400"
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
          <div class="flex items-center overflow-hidden relative">
            <input
              @input="removeErrorStyles($event)"
              ref="username_ref"
              type="text"
              placeholder="Username"
              name="username"
              class="h-full px-3 text-slate-600 outline-none rounded-xl max-h-[65px] border border-solid border-slate-400 w-full"
            />
            <i
              :style="'right:' + (username_error ? '0.75rem' : '-20px')"
              class="fa fa-close absolute right-3 top-1/2 transition-all -translate-y-1/2 bg-[rgb(252_90_90)] bg-opacity-50 text-white text-[8px] grid place-content-center h-[17px] rounded-full aspect-square"
            ></i>
          </div>
          <div class="flex items-center relative overflow-hidden">
            <input
              @input="removeErrorStyles($event)"
              ref="email_ref"
              type="text"
              placeholder="Email"
              name="email"
              class="h-full px-3 outline-none text-slate-600 rounded-xl max-h-[65px] border border-solid border-slate-400 w-full"
            />
            <i
              :style="'right:' + (email_error ? '0.75rem' : '-20px')"
              class="fa fa-close absolute right-3 top-1/2 transition-all -translate-y-1/2 bg-[rgb(252_90_90)] bg-opacity-50 text-white text-[8px] grid place-content-center h-[17px] rounded-full aspect-square"
            ></i>
          </div>
          <div class="flex items-center relative overflow-hidden">
            <input
              @input="removeErrorStyles($event)"
              ref="password_ref"
              type="password"
              placeholder="Password"
              name="password"
              class="h-full px-3 outline-none text-slate-600 rounded-xl max-h-[65px] border border-solid border-slate-400 w-full"
            />
            <i
              :style="'right:' + (password_error ? '0.75rem' : '-20px')"
              class="fa fa-close absolute right-3 top-1/2 transition-all -translate-y-1/2 bg-[rgb(252_90_90)] bg-opacity-50 text-white text-[8px] grid place-content-center h-[17px] rounded-full aspect-square"
            ></i>
          </div>
          <div class="flex items-center">
            <div class="flex gap-2 px-2 items-center">
              <div class="relative">
                <input
                  @input="removeErrorStyles($event)"
                  type="checkbox"
                  id="accept"
                  class="scale-110 appearance-none h-3 aspect-square border-[1.2px] rounded-[3px] border-slate-400 bg-white checked:bg-transparent cursor-pointer z-20 relative"
                  name="accept"
                  ref="accept_ref"
                />
                <i
                  class="fa fa-check absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-[8px] text-slate-400 z-10"
                ></i>
              </div>
              <label for="accept" class="text-stone-600 font-light text-sm"
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
      </form>
    </article>
  </section>
</template>

<script lang="ts">
  import gsap from "gsap";
  import { ref } from "vue";
  import { ERROR_COLOR, ERROR_COLOR_OPACITY } from "@/assets/constants";

  export default {
    name: "signup",

    data() {
      return {
        username: "",
        email: "",
        password: "",
        username_error: false,
        email_error: false,
        password_error: false,
        accept: false,
        result: false,
        logs: [] as string[],
      };
    },

    computed: {
      logs(): string[] {
        return this.logs;
      },
    },

    methods: {
      closeSignup(e?: Event) {
        if (e?.target === e?.currentTarget || !e)
          this.$store.commit("setShowSignup", false);
      },

      async signUp(e: any) {
        this.username = e.target.elements.username.value;
        this.email = e.target.elements.email.value;
        this.password = e.target.elements.password.value;
        this.accept = e.target.elements.accept.checked;

        if (!this.validateForm()) return;

        const [result, logs_result] = await this.$store.dispatch("SIGN_UP", {
          username: this.username,
          email: this.email,
          password: this.password,
        });

        this.logs = logs_result;
        this.result = result;
        if (!result) this.validateForm();
      },

      validateForm() {
        let canProceed = true;

        if (
          this.username.length < 3 ||
          this.email.length < 3 ||
          this.password.length < 3 ||
          !this.accept
        ) {
          this.logs = this.logs.filter((item) => item != "Fill all fields!");
          this.logs.push("Fill all fields!");
        }
        if (
          this.username.length < 3 ||
          this.logs.includes("Username is taken!")
        ) {
          this.logs = this.logs.filter((item) => item);
          this.addErrorStyles(this.username_ref);
          this.username_error = true;
          canProceed = false;
        }

        if (
          this.email.length < 3 ||
          !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email) ||
          this.logs.includes("Email is invalid or taken!")
        ) {
          this.logs = this.logs.filter((item) => item);
          this.addErrorStyles(this.email_ref);
          this.email_error = true;
          canProceed = false;

          if (!this.logs.includes("Email is invalid or taken!")) {
            this.logs = this.logs.filter((item) => item != "Email invalid!");
            this.logs.push("Email invalid!");
          }
        }

        if (this.password.length < 3) {
          this.addErrorStyles(this.password_ref);

          this.password_error = true;
          canProceed = false;
        }

        if (this.accept === false) {
          this.addErrorStyles(this.accept_ref);
          canProceed = false;
        }

        return canProceed;
      },

      addErrorStyles(elem: any) {
        if (elem) {
          (elem as HTMLInputElement).style.borderColor = ERROR_COLOR;
          (elem as HTMLInputElement).style.color = ERROR_COLOR_OPACITY;
        }
      },

      removeErrorStyles(e: any) {
        (e.target as HTMLInputElement).style.borderColor = "rgb(148,163,184)";
        (e.target as HTMLInputElement).style.color = "rgb(71,85,105)";
        this.logs.length != 0 ? (this.logs = []) : "";

        switch (e.target.name) {
          case "username":
            this.username_error = false;
            break;

          case "email":
            this.email_error = false;
            break;

          case "password":
            this.password_error = false;
            break;

          default:
            break;
        }
      },
    },

    mounted() {
      gsap.from(this.boxref, { duration: 0.3, opacity: 0 });
    },

    setup() {
      const boxref = ref(null);
      const username_ref = ref(null);
      const password_ref = ref(null);
      const email_ref = ref(null);
      const accept_ref = ref(null);

      return {
        boxref,
        username_ref,
        password_ref,
        email_ref,
        accept_ref,
      };
    },

    watch: {
      logs: {
        handler(newV, old) {
          newV.forEach((string: string) => {
            if (this.result) {
              this.$toast.add({
                severity: "success",
                summary: "Success!",
                detail: string,
                life: 2000,
              });
              this.closeSignup();
            } else
              this.$toast.add({
                severity: "error",
                summary: "Error!",
                detail: string,
                life: 2000,
              });
          });
        },
        deep: true,
      },
    },
  };
</script>

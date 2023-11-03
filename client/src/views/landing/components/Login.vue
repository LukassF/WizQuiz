<template>
  <section
    @click="closeLogin($event)"
    class="fixed overflow-y-auto overflow-x-hidden left-0 top-0 w-screen h-screen bg-black bg-opacity-60 z-[1000] grid place-content-center"
  >
    <article
      ref="boxref"
      class="overflow-y-auto absolute z-20 h-full w-full box-full:h-[80%] max-h-[820px] box-full:aspect-[4/5] box-full:w-auto left-0 box-full:left-1/2 top-1/2 -translate-y-1/2 -translate-x-0 box-full:-translate-x-1/2 bg-white shadow-[4.0px_4.0px_1.0px_5px_rgba(0,0,0,0.18)] box-full:rounded-lg p-10"
    >
      <form
        class="grid grid-rows-[1fr_8fr] h-full"
        @submit.prevent="logIn"
        autocomplete="off"
      >
        <div>
          <h1 class="text-2xl font-semibold relative">
            Log in
            <button
              @click="closeLogin()"
              class="absolute right-0 top-0 font-semibold text-lg text-slate-400"
            >
              <i class="fa fa-arrow-left"></i>
            </button>
          </h1>
          <p class="text-sm text-stone-600 font-light">
            And use our app seamlessly!
          </p>
        </div>

        <div class="grid grid-rows-[1fr_2fr_2fr_1.5fr_2fr_1fr_3fr] gap-3">
          <div class="flex items-center">
            <div class="w-full h-[1px] bg-slate-400"></div>
          </div>
          <div class="flex items-center relative overflow-hidden">
            <input
              @input="removeErrorStyles($event)"
              ref="username_ref_login"
              type="text"
              placeholder="Username"
              name="username"
              class="h-full text-slate-600 px-3 outline-none rounded-xl max-h-[65px] border border-solid border-slate-400 w-full"
            />
            <i
              :style="'right:' + (username_error ? '0.75rem' : '-20px')"
              class="fa fa-close absolute right-3 top-1/2 transition-all -translate-y-1/2 bg-[rgb(252_90_90)] bg-opacity-50 text-white text-[8px] grid place-content-center h-[17px] rounded-full aspect-square"
            ></i>
          </div>
          <div class="flex items-center relative overflow-hidden">
            <input
              @input="removeErrorStyles($event)"
              ref="password_ref_login"
              type="password"
              placeholder="Password"
              name="password"
              class="h-full text-slate-600 px-3 outline-none rounded-xl max-h-[65px] border border-solid border-slate-400 w-full pr-[4rem]"
            />
            <i
              @click="togglePassword()"
              :style="'right:' + (password_error ? '2.5rem' : '0.75rem')"
              class="fa fa-eye absolute cursor-pointer right-3 top-1/2 transition-all -translate-y-1/2 bg-opacity-50 text-slate-400 text-[17px] grid place-content-center h-[17px] rounded-full aspect-square"
            ></i>
            <i
              :style="'right:' + (password_error ? '0.75rem' : '-20px')"
              class="fa fa-close absolute right-3 top-1/2 transition-all -translate-y-1/2 bg-[rgb(252_90_90)] bg-opacity-50 text-white text-[8px] grid place-content-center h-[17px] rounded-full aspect-square"
            ></i>
          </div>
          <div class="flex items-center">
            <div class="flex gap-2 px-2">
              <div class="relative">
                <input
                  :checked="remember"
                  @change="rememberMe($event)"
                  type="checkbox"
                  id="rememberme"
                  name="remember"
                  class="scale-110 appearance-none h-3 aspect-square border-[1.2px] rounded-[3px] border-slate-400 bg-white checked:bg-transparent cursor-pointer z-20 relative"
                />
                <i
                  class="fa fa-check absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-[8px] text-slate-400 z-10"
                ></i>
              </div>
              <label for="rememberme" class="text-stone-600 font-light text-sm"
                >Remember me</label
              >
            </div>
          </div>
          <div class="flex items-center">
            <button
              type="submit"
              class="hover:bg-indigo-500 transition-all h-full max-h-[65px] bg-featured rounded-xl text-white font-bold w-full"
            >
              Log In
            </button>
          </div>
          <div class="flex items-center">
            <div class="w-full h-[1px] bg-slate-400"></div>
          </div>
          <div
            class="flex flex-col items-center justify-center gap-3 [&>*]:text-stone-600 [&>*]:text-sm"
          >
            <span class="hover:text-featured cursor-pointer"
              >Forgot password?</span
            >
            <span
              @click="openSignup()"
              class="hover:text-featured cursor-pointer"
              >Create account</span
            >
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
    name: "login",
    data() {
      return {
        username: "" as string,
        password: "" as string,
        remember: false as boolean,
        logs: [] as string[],
        status: false,
        username_error: false,
        password_error: false,
      };
    },

    computed: {
      logs(): string[] {
        return this.logs;
      },
    },

    mounted() {
      gsap.from(this.boxref, { duration: 0.3, opacity: 0 });

      if (!window.localStorage.getItem("remembered_user")) return;

      const local_storage = JSON.parse(
        window.localStorage.getItem("remembered_user")!
      );

      this.remember = true;
      this.username = local_storage.username;
      this.password = local_storage.password;

      //@ts-ignore
      this.username_ref_login.value = this.username;
      //@ts-ignore
      this.password_ref_login.value = this.password;
    },
    methods: {
      closeLogin(e?: Event) {
        if (e?.target === e?.currentTarget || !e)
          this.$store.commit("setShowLogin", false);
      },

      openSignup() {
        this.$store.commit("setShowSignup", true);
      },

      async logIn(e: any): Promise<void> {
        this.username = e.target.elements.username.value;
        this.password = e.target.elements.password.value;
        this.remember = e.target.elements.remember.checked;

        if (!this.validateForm()) return;

        const result = await this.$store.dispatch("LOG_IN", {
          username: this.username,
          password: this.password,
        });

        this.logs = result.logs;
        this.status = result.status;

        if (!result.status) this.validateForm();
        else {
          window.localStorage.setItem(
            "current_user",
            JSON.stringify(result.user)
          );

          if (this.remember)
            window.localStorage.setItem(
              "remembered_user",
              JSON.stringify({
                username: this.username,
                password: this.password,
              })
            );

          if (result.token[0]) {
            this.$cookies.set("token", result.token[1]);
            this.$store.commit("setIsAuthenticated", true);
          }
        }
      },

      validateForm(): boolean {
        let canProceed = true;

        if (this.username.length < 1 || this.password.length < 1) {
          this.logs = this.logs.filter((item) => item != "Fill all fields!");
          this.logs.push("Fill all fields!");
        }

        if (
          this.username.length < 1 ||
          this.logs.includes("No username found!")
        ) {
          this.logs = this.logs.filter((item) => item);

          this.addErrorStyles(this.username_ref_login);
          this.username_error = true;
          canProceed = false;
        }

        if (
          this.password.length < 1 ||
          this.logs.includes("Password is incorrect!")
        ) {
          this.logs = this.logs.filter((item) => item);

          this.addErrorStyles(this.password_ref_login);
          this.password_error = true;
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

          case "password":
            this.password_error = false;
            break;

          default:
            break;
        }
      },

      togglePassword() {
        const type = (this.password_ref_login! as HTMLInputElement).type;
        (this.password_ref_login! as HTMLInputElement).type =
          type === "text" ? "password" : "text";
      },

      rememberMe(e: any) {
        this.remember = e.target.checked;

        if (!e.target.checked)
          window.localStorage.removeItem("remembered_user");
      },
    },
    setup() {
      const boxref = ref(null);
      const username_ref_login = ref(null);
      const password_ref_login = ref(null);

      return {
        boxref,
        username_ref_login,
        password_ref_login,
      };
    },

    watch: {
      logs: {
        handler(newV, old) {
          newV.forEach((string: string) => {
            if (this.status) {
              this.$toast.add({
                severity: "success",
                summary: "Success!",
                detail: string,
                life: 2000,
              });

              this.closeLogin();
            } else
              this.$toast.add({
                severity: "error",
                summary: "Error",
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

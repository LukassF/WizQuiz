<template>
  <Tooltip />
  <NameQuiz v-if="$store.state.showQuizCreator" />
  <ModifyProfile v-if="$store.state.showModifyProfile" />
  <main
    id="main-main"
    @click="setAside($event)"
    class="group bg-white m-0 xs:m-3 xs:rounded-xl grid lg:grid-cols-[2fr_7fr] gap-3 relative z-[20] p-3 sm/2:p-5 shadow-[2.0px_2.0px_1.0px_3px_rgba(0,0,0,0.18)]"
  >
    <aside
      id="aside"
      :style="
        $store.state.showAside
          ? 'visibility:visible;'
          : position === 'absolute'
          ? 'visibility:hidden;'
          : 'visibility:visible;'
      "
      class="clickable bg-main-blue absolute min-h-[400px] min-w-[250px] right-1/2 translate-x-1/2 xs:translate-x-0 xs:right-20 top-24 lg:right-auto lg:top-auto z-30 lg:relative px-5 py-10 rounded-xl"
    >
      <nav class="clickable flex flex-col justify-between h-[370px] lg:h-full">
        <ul
          class="clickable flex flex-col gap-3 [&>*]:px-5 [&>*]:py-2 [&>*]:cursor-pointer [&>*]:flex [&>*]:items-center [&>*]:gap-3"
        >
          <li
            @click="openQuizCreator()"
            class="clickable cursor-pointer hover:bg-stone-200 transition-colors bg-white text-main-blue px-5 py-2 rounded-full"
          >
            <i class="clickable fa fa-add"></i> Create quiz
          </li>
          <li
            @click="setComponent('overview')"
            class="clickable hover:text-stone-300 transition-colors text-white"
          >
            <i class="clickable fa fa-line-chart"></i> Overview
          </li>
          <li
            @click="setComponent('myQuizes')"
            class="clickable hover:text-stone-300 transition-colors text-white"
          >
            <i class="clickable fa fa-question"></i> My quizes
          </li>
          <li
            @click="setComponent('subscriptions')"
            class="clickable hover:text-stone-300 transition-colors text-white"
          >
            <i class="clickable fa fa-credit-card"></i> Subscriptions
          </li>
          <li
            @click="setComponent('find')"
            class="clickable hover:text-stone-300 transition-colors text-white"
          >
            <i class="clickable fa fa-magnifying-glass"></i> Find
          </li>
        </ul>

        <div
          class="px-5 cursor-pointer hover:text-stone-300 transition-colors text-white flex items-center gap-3"
        >
          <i class="fa fa-cogs"></i> Settings
        </div>
      </nav>
    </aside>
    <section class="lg/2:h-screen relative overflow-hidden">
      <button
        @click="setAside($event)"
        class="btn group-hover:translate-y-0 group-hover:opacity-100 opacity-0 transition-all -translate-y-12 absolute lg:hidden right-2 top-2 bg-main-blue text-white aspect-square w-12 grid place-content-center rounded-full drop-shadow-lg"
      >
        <i class="btn fa fa-bars"></i>
      </button>

      <Overview v-if="component === 'overview'" />
      <MyQuizes v-if="component === 'myQuizes'" />
      <Subscriptions v-if="component === 'subscriptions'" />
      <Find v-if="component === 'find'" />
    </section>
  </main>
</template>

<script lang="ts">
  import Overview from "./components/overview/Overview.vue";
  import Subscriptions from "./components/subscriptions/Subscriptions.vue";
  import MyQuizes from "./components/my-quizes/MyQuizes.vue";
  import Find from "./components/find/Find.vue";
  import Tooltip from "../../components/Tooltip.vue";
  import NameQuiz from "./components/create/NameQuiz.vue";
  import ModifyProfile from "./components/overview/overview-comp/ModifyProfile.vue";

  export default {
    name: "dashboard",
    data() {
      return {
        position: "",
        aside: "",
        component: "overview",
      };
    },
    components: {
      Overview,
      Subscriptions,
      MyQuizes,
      Find,
      Tooltip,
      NameQuiz,
      ModifyProfile,
    },
    mounted() {
      //@ts-ignore
      this.aside = document.getElementById("aside");
      const style = window.getComputedStyle(this.aside as any);
      this.position = style.position;
    },
    created() {
      window.addEventListener("resize", this.myEventHandler);
    },
    destroyed() {
      window.removeEventListener("resize", this.myEventHandler);
    },
    methods: {
      myEventHandler() {
        const style = window.getComputedStyle(this.aside as any);
        this.position = style.position;
      },

      setComponent(value: any) {
        this.component = value;
      },

      setAside(e: any) {
        const classes = e.target.classList;

        if (classes.contains("clickable")) return;

        if (classes.contains("btn") && e.currentTarget.id !== "main-main")
          this.$store.commit("setShowAside", !this.$store.state.showAside);
        else if (classes.contains("btn") && e.currentTarget.id === "main-main")
          return;
        else this.$store.commit("setShowAside", false);
      },
      openQuizCreator() {
        this.$store.commit("setShowQuizCreator", true);
      },
    },
  };
</script>

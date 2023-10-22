<template>
  <Tooltip />
  <main
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
      class="bg-main-blue absolute min-h-[400px] min-w-[250px] right-1/2 translate-x-1/2 xs:translate-x-0 xs:right-20 top-24 lg:right-auto lg:top-auto z-30 lg:relative px-5 py-10 rounded-xl"
    >
      <nav class="flex flex-col justify-between h-[370px] lg:h-full">
        <ul
          class="flex flex-col gap-3 [&>*]:px-5 [&>*]:py-2 [&>*]:cursor-pointer [&>*]:flex [&>*]:items-center [&>*]:gap-3"
        >
          <li
            class="cursor-pointer hover:bg-stone-200 transition-colors bg-white text-main-blue px-5 py-2 rounded-full"
          >
            <i class="fa fa-add"></i> Create quiz
          </li>
          <li
            @click="setComponent('overview')"
            class="hover:text-stone-300 transition-colors text-white"
          >
            <i class="fa fa-line-chart"></i> Overview
          </li>
          <li
            @click="setComponent('myQuizes')"
            class="hover:text-stone-300 transition-colors text-white"
          >
            <i class="fa fa-question"></i> My quizes
          </li>
          <li
            @click="setComponent('subscriptions')"
            class="hover:text-stone-300 transition-colors text-white"
          >
            <i class="fa fa-credit-card"></i> Subscriptions
          </li>
          <li
            @click="setComponent('find')"
            class="hover:text-stone-300 transition-colors text-white"
          >
            <i class="fa fa-magnifying-glass"></i> Find
          </li>
        </ul>

        <div
          class="px-5 cursor-pointer hover:text-stone-300 transition-colors text-white flex items-center gap-3"
        >
          <i class="fa fa-cogs"></i> Settings
        </div>
      </nav>
    </aside>
    <section class="lg/2:h-[625px] relative">
      <button
        @click="openAside()"
        class="group-hover:translate-y-0 group-hover:opacity-100 opacity-0 transition-all -translate-y-12 absolute lg:hidden right-2 top-2 bg-main-blue text-white aspect-square w-12 grid place-content-center rounded-full drop-shadow-lg"
      >
        <i class="fa fa-bars"></i>
      </button>

      <Overview v-if="component === 'overview'" />
      <MyQuizes v-if="component === 'myQuizes'" />
      <Subscriptions v-if="component === 'subscriptions'" />
      <Find v-if="component === 'find'" />
    </section>
  </main>
</template>

<script lang="js">
  import Overview from './components/overview/Overview.vue'
  import Subscriptions from './components/subscriptions/Subscriptions.vue'
  import MyQuizes from './components/my-quizes/MyQuizes.vue'
  import Find from './components/find/Find.vue'
  import Tooltip from '../../components/Tooltip.vue'

  export default {
    name: "dashboard",
    data(){
      return{
        position:'',
        aside:'',
        component:'overview'
      }
    },
    components: {
     Overview,
     Subscriptions,
     MyQuizes,
     Find,
     Tooltip
    },
    mounted(){
      this.aside = document.getElementById('aside')
      const style = window.getComputedStyle(this.aside)
      this.position = style.position
    },
    created() {
    window.addEventListener("resize", this.myEventHandler);
  },
  destroyed() {
    window.removeEventListener("resize", this.myEventHandler);
  },
  methods: {
    myEventHandler() {
      const style = window.getComputedStyle(this.aside)
      this.position = style.position
    },

    setComponent(value){
      this.component = value
    },

      openAside(){
          this.$store.commit('setShowAside')
      }

  }

  };
</script>

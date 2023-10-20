

<template>
  <main class=" bg-white m-0 xs:m-3 xs:rounded-xl grid lg:grid-cols-[2fr_7fr] gap-3 relative z-50 p-3 sm/2:p-5 shadow-[2.0px_2.0px_1.0px_3px_rgba(0,0,0,0.18)]">
    <aside
    id="aside"
    :style="$store.state.showAside ? 'visibility:visible;' : position === 'absolute'?'visibility:hidden;':'visibility:visible;'"
      class="bg-main-blue absolute min-h-[400px] min-w-[250px] right-1/2 translate-x-1/2 xs:translate-x-0 xs:right-20 top-24 lg:right-auto lg:top-auto z-30 lg:relative px-5 py-10 rounded-xl "
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
          <li @click="setComponent('overview')"  class="hover:text-stone-300 transition-colors text-white">
            <i class="fa fa-line-chart"></i> Overview
          </li>
          <li @click="setComponent('myQuizes')" class="hover:text-stone-300 transition-colors text-white">
            <i class="fa fa-question"></i> My quizes
          </li>
          <li @click="setComponent('subscriptions')" class="hover:text-stone-300 transition-colors text-white">
            <i class="fa fa-credit-card"></i> Subscriptions
          </li>
          <li @click="setComponent('find')" class="hover:text-stone-300 transition-colors text-white">
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
    <Overview v-if="component === 'overview'"/>
    <Subscriptions v-if="component === 'subscriptions'"/>
  </main>
</template>

<script lang="js">
import Overview from './components/overview/Overview.vue'
import Subscriptions from './components/subscriptions/Subscriptions.vue'

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
   Subscriptions
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
  }
}

};
</script>

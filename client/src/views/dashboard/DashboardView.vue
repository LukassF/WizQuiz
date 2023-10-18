
import LoginVue from '../login/components/Login.vue';

import { watch } from 'vue';

<template>
  <main class="min-h-screen grid lg:grid-cols-[2fr_7fr] gap-3 relative z-20 p-3">
    <aside
    :style="$store.state.showAside ? 'visibility:visible;' : 'visibility:hidden;'"
      class="bg-white absolute min-h-[400px] min-w-[250px] right-20 top-10 lg:right-auto lg:top-auto z-30 lg:relative px-5 py-10 rounded-xl shadow-[2.0px_2.0px_1.0px_4px_rgba(0,0,0,0.18)]"
    >
      <nav class="flex flex-col justify-between h-[370px] lg:h-full">
        <ul
          class="flex flex-col gap-3 [&>*]:px-5 [&>*]:py-2 [&>*]:cursor-pointer [&>*]:flex [&>*]:items-center [&>*]:gap-3"
        >
          <li
            class="cursor-pointer hover:bg-blue-500 transition-colors bg-main-blue text-white px-5 py-2 rounded-full"
          >
            <i class="fa fa-add"></i> Create quiz
          </li>
          <li class="hover:text-main-blue transition-colors">
            <i class="fa fa-line-chart"></i> Overview
          </li>
          <li class="hover:text-main-blue transition-colors">
            <i class="fa fa-question"></i> My quizes
          </li>
          <li class="hover:text-main-blue transition-colors">
            <i class="fa fa-credit-card"></i> Subscriptions
          </li>
          <li class="hover:text-main-blue transition-colors">
            <i class="fa fa-magnifying-glass"></i> Find
          </li>
        </ul>

        <div
          class="px-5 cursor-pointer hover:text-main-blue transition-colors flex items-center gap-3"
        >
          <i class="fa fa-cogs"></i> Settings
        </div>
      </nav>
    </aside>
    <section class="grid min-h-full grid-cols-2 grid-rows-[4fr_5fr] gap-0 rounded-xl overflow-hidden shadow-[2.0px_2.0px_1.0px_4px_rgba(0,0,0,0.18)]">

      <Profile />
      <Chart />
      <Recommended />

    </section>
  </main>
</template>

<script lang="ts">
import Profile from "./components/Profile.vue";
import Recommended from "./components/Recommended.vue";
import Chart from "./components/Chart.vue";

export default {
  name: "dashboard",
  components: {
    Profile,
    Recommended,
    Chart,
  },

};
</script>

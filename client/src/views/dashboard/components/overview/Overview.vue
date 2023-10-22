<template>
    <section class="grid grid-cols-1 grid-rows-[2fr_2fr_6fr] sm/2:grid-rows-[2fr_2fr_4fr] lg/2:grid-cols-2 lg/2:grid-rows-[minmax(0,4fr)_minmax(0,5fr)] gap-0 rounded-xl overflow-hidden">

<Profile />
<Chart />
<Recommended />

</section>
</template>

<script lang="ts">
import Profile from "./overview-comp/Profile.vue";
import Recommended from "./overview-comp/Recommended.vue";
import Chart from "./overview-comp/Chart.vue";

export default{
    name:'overview',
    components:{
        Profile,
        Recommended,
        Chart
    }
}
</script>
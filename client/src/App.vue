
<template >
  <main id="main" class="overflow-hidden w-screen relative">
  <svg class="absolute right-0 -top-16 h-80 md:h-auto md:-top-10 z-0 w-[200%] xs:w-[65%] md:w-[80%] lg:w-[70%]" viewBox="0 0 1116 624" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1628 216.5C1628 342.697 1348.63 623.5 1004 623.5C659.374 623.5 380 342.697 380 216.5C380 90.3029 659.374 -12 1004 -12C1348.63 -12 1628 90.3029 1628 216.5Z" fill="#0158C4"/>
<rect y="-247.956" width="1108" height="722.341" rx="260" transform="rotate(-20.1148 0 -247.956)" fill="#0158C4"/>
</svg>

<Navbar />

<router-view></router-view>

<Footer />
<svg class="absolute w-[480%] xs/2:w-[300%] sm/2:w-[210%] sm:w-[180%] lg/2:w-[120%] bottom-0 lg:-bottom-40 z-0" width="120%" viewBox="0 0 1512 991" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1051 337.289C1051 513.627 646.042 906 146.5 906C-353.042 906 -758 513.627 -758 337.289C-758 160.95 -353.042 17.9999 146.5 17.9999C646.042 17.9999 1051 160.95 1051 337.289Z" fill="#0158C4"/>
<rect x="-406" y="1028.4" width="2094.42" height="1328.84" rx="260" transform="rotate(-29.4075 -406 1028.4)" fill="#0158C4"/>
</svg>
</main>

</template>

<script lang="ts">

import Navbar from './components/Navbar.vue';
import Footer from './components/Footer.vue';

export default{
  components:{
    Navbar,
    Footer
  }
}
</script>

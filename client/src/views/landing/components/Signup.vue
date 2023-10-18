<template>
    <section @click="closeSignup($event)" class="fixed overflow-y-auto overflow-x-hidden left-0 top-0 w-screen h-screen bg-black bg-opacity-60 z-50 grid place-content-center">
     <article ref="boxref" class="absolute z-20 h-full w-full xs:h-[80%] xs:aspect-[4/5] xs:w-auto left-0 xs:left-1/2 top-0 xs:top-14 xs:-translate-x-1/2 bg-white shadow-[4.0px_4.0px_1.0px_5px_rgba(0,0,0,0.18)] xs:rounded-lg p-10">
            <form class="flex flex-col gap-6  justify-center h-full">
                <div>
                    <h1 class="text-2xl font-semibold relative">Sign up
                        <button @click="closeSignup()" class=" absolute right-0 top-0 font-semibold text-lg"><i class="fa fa-arrow-left"></i></button>

                    </h1>
                    <p class="text-sm text-stone-600 font-light">Join our great community!</p>
                </div>

                <hr>
                <div class="flex flex-col gap-5">
                    <input type="text" placeholder="Username" class="bg-slate-100 h-[45px] px-3 outline-none rounded-2xl border border-solid border-slate-400 drop-shadow-md"/>
                    <input type="email" placeholder="Email" class="bg-slate-100 h-[45px] px-3 outline-none rounded-2xl border border-solid border-slate-400 drop-shadow-md"/>
                    <input type="password" placeholder="Password" class="bg-slate-100 h-[45px] px-3 outline-none rounded-2xl border border-solid border-slate-400 drop-shadow-md"/>
                    <div class="flex gap-2 px-2">
                        <input type="checkbox" id="rememberme" class="scale-110"/>
                        <label for="rememberme" class="text-stone-600 font-light text-sm">Accept terms of use</label>
                    </div>
                  
                   <button type="submit" class="mt-5 hover:bg-indigo-500 transition-all h-[45px] bg-featured rounded-2xl text-white font-bold">Create account</button>
                </div>
            </form>
        </article>
    </section>
</template>

<script lang="ts">
import gsap from 'gsap'
import { ref } from 'vue';

export default{
    name:"signup",
    methods:{
        
        closeSignup(e?:Event){
            if(e?.target === e?.currentTarget || !e)
            this.$store.commit('setShowSignup',false)
        }
    },
    mounted(){
        gsap.from(this.boxref,{duration:0.3,y:-100,opacity:0})
    },
    setup() {
    const boxref = ref(null);

    return {
      boxref,
    };
  },
}
</script>
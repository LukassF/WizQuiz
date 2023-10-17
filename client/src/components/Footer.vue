<template>
    <div class=" mx-10 mt-20 h-[1px] bg-white z-20 relative"></div>
    <footer class="w-full flex z-20 relative flex-col items-center gap-3 sm:gap-5 px-5 sm:px-20 py-10 text-white">
        <section class="grid grid-cols-1 xs/2:grid-cols-2 md:grid-cols-3 lg/2:grid-cols-4 lg:grid-cols-5 w-full ">
      
            <div class="p-5 xl:p-10">
                <h4 class="text-md md:text-lg font-bold">Company</h4>
                <ul class="text-stone-300 mt-2 md:mt-4 [&>*]:cursor-pointer text-sm md:text-md">
                    <li class="hover:underline">About</li>
                    <li class="hover:underline">Jobs</li>
                    <li class="hover:underline">For the Record</li>
                </ul>
            </div>
            <div  class="p-5 xl:p-10">
                <h4 class="text-md md:text-lg font-bold">Communities</h4>
                <ul class="text-stone-300 mt-2 md:mt-4 [&>*]:cursor-pointer text-sm md:text-md">
                    <li class="hover:underline">For Creators</li>
                    <li  class="hover:underline">Developers</li>
                    <li class="hover:underline">Advertising</li>
                    <li class="hover:underline">Investors</li>
                    <li class="hover:underline">Vendors</li>
                </ul>
            </div>
            <div class="p-5 xl:p-10">
                <h4 class="text-md md:text-lg font-bold">Useful links</h4>
                <ul class="text-stone-300 mt-2 md:mt-4 [&>*]:cursor-pointer text-sm md:text-md">
                    <li class="hover:underline">Support</li>
                    <li class="hover:underline">Free mobile app</li>
                </ul>
            </div>
            <div class="p-5 xl:p-10">
                <h4 class="text-md md:text-lg font-bold">Quiz tutorial</h4>
                <ul class="text-stone-300 mt-2 md:mt-4 [&>*]:cursor-pointer text-sm md:text-md">
                    <li class="hover:underline">Creation</li>
                    <li class="hover:underline">Solving</li>
                    <li class="hover:underline">Question types</li>
                    <li class="hover:underline">Wrong answers</li>
                    <li class="hover:underline">Display</li>
                </ul>
            </div>

            <div class="flex gap-5 p-5 xl:p-10">
                <a><i class="fa fa-instagram"></i></a>
                <a><i class="fa fa-twitter"></i></a>
                <a><i class="fa fa-facebook"></i></a>
            </div>
  
        </section>
        <hr>
    <p>© 2023 WizQuiz CA</p>
    </footer>
</template>

<script lang="ts">
export default{
    name:'footer'
}
</script>
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,ts,vue,jsx,tsx}"],
  theme: {
    extend: {
   colors:{
    "main-blue":'#0158C4',
    "light-grey":'#F0F0F0',
    "featured":'#807AEA'
   },
   screens:{
    "lg/2":'900px',
    "sm/2":"560px",
    "xs":"400px",
    "xs/2":"320px"
   }
    },
  },
  plugins: [],
}


<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
    
    <!-- Carousel -->
    <div x-data="carousel()" x-init="init()"
        class="relative w-full h-[400px] overflow-hidden rounded-lg shadow-lg bg-white">
        <template x-for="(img, idx) in images" :key="idx">
            <div x-show="current === idx" x-transition:enter="transition-opacity duration-500"
                x-transition:leave="transition-opacity duration-500"
                class="absolute inset-0 flex items-center justify-center opacity-0"
                :class="{ 'opacity-100': current === idx }">
                <img :src="img" class="object-cover w-full h-full rounded-lg" alt="">
            </div>
        </template>

        <button @click="prev()"
            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white hover:bg-gray-100 rounded-full p-2 shadow-md text-xl z-10">‹</button>
        <button @click="next()"
            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white hover:bg-gray-100 rounded-full p-2 shadow-md text-xl z-10">›</button>

        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
            <template x-for="(img, idx) in images" :key="idx">
                <div @click="go(idx)" :class="current === idx ? 'bg-white' : 'bg-gray-500'"
                    class="w-3 h-3 rounded-full cursor-pointer shadow-inner transition-colors duration-300">
                </div>
            </template>
        </div>
    </div>

    <!-- Ads -->
    <div class="flex flex-col gap-4">
        <img src="https://imgs.search.brave.com/hF4AL4WAkyXsZRui0l5JMatSMreaJTnATDoGetRBEOs/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/cHJvZC53ZWJzaXRl/LWZpbGVzLmNvbS82/Njg3OTY0OTUxM2Ux/OGM4NGZkODcwOTYv/NjY4Nzk2NDk1MTNl/MThjODRmZDg3M2Ji/Xzc2ZjViYl9mZGVj/OWYzZmI0OWI0Mzdh/YTNlMWNlMjEyYzM5/N2M1Y35tdjIud2Vi/cA"
            alt="ads" class="rounded-lg shadow-lg w-full object-cover h-48">
        <img src="https://imgs.search.brave.com/V2UIMiohKcbxWdKlug_M8KuUOM7L9FwbEuRJSR8qFOs/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90b3Bn/cm93dGhtYXJrZXRp/bmcuY29tL3dwLWNv/bnRlbnQvdXBsb2Fk/cy8yMDIzLzEwLzFf/VEdNX0Zvb2RBbmRC/ZXZlcmFnZV9CbG9n/X0Jhbm5lci5wbmc"
            alt="ads" class="rounded-lg shadow-lg w-full object-cover h-48">
    </div>
</div>
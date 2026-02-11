<!-- Testimonial carousel -->
<section class="bg-black pt-10 px-2 md:px-10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="pb-12 md:pb-10">

            <!-- Carousel area -->
            <div class="max-w-5xl mx-auto">

                <!-- Carousel -->
                <div x-data="carousel()" class="relative" data-aos="fade-down">

                    <!-- Testimonials -->
                    <div class="relative flex flex-col items-start z-10 transition-all duration-300 ease-in-out" x-ref="testimonials">

                        <!-- Alpine.js template for testimonials: https://github.com/alpinejs/alpine#x-for -->
                        <template x-for="(item, index) in items" :key="index" hidden>
                            <div
                                x-show="active === index"
                                class="w-full  text-center px-12 py-8"
                                x-transition:enter="transition ease-in-out duration-700 transform order-first"
                                x-transition:enter-start="opacity-0 -translate-y-8"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in-out duration-300 transform absolute"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-8"
                            >
                                
                                <blockquote class="tinos-regular text-xl md:text-2xl font-bold text-white mb-4" x-text="item.quote"></blockquote>
                                <div class="font-medium text-lg">
                                    <cite class="not-italic text-l text-white font-bold" x-text="item.name"></cite>
                                    <span class="text-white"> - </span>
                                    <span class="text-gray-200" x-text="item.role"></span> <a class="text-gray-200 hover:underline" :href="item.link" x-text="item.team"></a>
                                </div>
                            </div>
                        </template>

                    </div>

                    <!-- Skewed borders -->
                    <div class="absolute inset-0 transform -skew-x-3 border-2 border-gray-700 pointer-events-none" aria-hidden="true"></div>

                    <!-- Arrows -->
                    <div class="absolute inset-0 flex items-center justify-between">
                        <button
                            class="btn-sm rounded-none relative z-20 w-12 h-12 p-1 box-content flex items-center justify-center group transform -translate-x-2 md:-translate-x-1/2 bg-gray-800 hover:bg-gray-600 transition duration-150 ease-in-out"
                            @click="active = active === 0 ? items.length - 1 : active - 1; stopAutorotate();"
                        >
                            <span class="sr-only">Previous</span>
                            <svg class="w-4 h-4 fill-current text-white group-hover:text-white transition duration-150 ease-in-out" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.7 14.7l1.4-1.4L3.8 9H16V7H3.8l4.3-4.3-1.4-1.4L0 8z" />
                            </svg>
                        </button>
                        <button
                            class="btn-sm rounded-none relative z-20 w-12 h-12 p-1 box-content flex items-center justify-center group transform translate-x-2 md:translate-x-1/2 bg-gray-800 hover:bg-gray-600 transition duration-150 ease-in-out"
                            @click="active = active === items.length - 1 ? 0 : active + 1; stopAutorotate();"
                        >
                            <span class="sr-only">Next</span>
                            <svg class="w-4 h-4 fill-current text-white dark:text-gray-400 group-hover:text-white dark:group-hover:text-teal-500 transition duration-150 ease-in-out" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.3 14.7l-1.4-1.4L12.2 9H0V7h12.2L7.9 2.7l1.4-1.4L16 8z" />
                            </svg>
                        </button>
                    </div>

                </div>

                

            </div>
        </div>
    </div>
</section>

<div class="py-12 px-12 md:px-0 mx-auto max-w-screen-md">
    <div x-data="{ isOpen: false, delay: 5000 }" x-show.transition.duration.500ms="isOpen"
        x-on:show-ContactUs-success.window="isOpen = true; delay = $event.detail.delay ?? 5000; setTimeout(() => { isOpen = false }, delay);"
        x-on:close-ContactUs-success.window="isOpen = false" x-cloak
        class="fixed top-14 right-0 mt-4 mr-4 w-full max-w-sm bg-green-500 text-white p-4 rounded-lg shadow-lg z-20"
        role="alert">
        <div class="flex items-center justify-between">
            <div>
                <p>{{ $success_message }}</p>
            </div>
            <button x-on:click="$dispatch('close-ContactUs-success')" class="ml-4 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <div x-data="{ isOpen: false, delay: 5000 }" x-show.transition.duration.500ms="isOpen"
        x-on:show-ContactUs-error.window="isOpen = true; delay = $event.detail.delay ?? 5000; setTimeout(() => { isOpen = false }, delay);"
        x-on:close-ContactUs-error.window="isOpen = false" x-cloak
        class="fixed top-14 right-0 mt-4 mr-4 w-full max-w-sm bg-red-500 text-white p-4 rounded-lg shadow-lg z-20"
        role="alert">
        <div class="flex items-center justify-between">
            <div>
                <p>{{ $error_message }}</p>
            </div>
            <button x-on:click="$dispatch('close-ContactUs-error')" class="ml-4 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <div class="flex flex-col items-center  text-center">
        <h1 class="text-xl md:text-4xl font-bold leading-none tracking-tight text-gray-900 dark:text-white">
            Contact Us 
        </h1>
        <p class="mt-4 mb-8 text-lg font-normal text-gray-500 dark:text-gray-400">
            Reach out to us today for more information or to provide feedback.
        </p>
    </div>
    <form wire:submit.prevent="sendEmail" class="space-y-8">
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                email</label>
            <input type="email" id="email" wire:model="email"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#49A078] focus:border-[#49A078] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#49A078] dark:focus:border-primary-[#49A078] dark:shadow-sm-light"
                placeholder="name@gmail.com" />
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="subject"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
            <input type="text" id="subject" wire:model='subject'
                class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-[#49A078] focus:border-[#49A078] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#49A078] dark:focus:border-[#49A078]dark:shadow-sm-light"
                placeholder="Let us know how we can help you" />
            @error('subject')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your
                message</label>
            <textarea id="message" rows="6" wire:model='message'
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-[#49A078] focus:border-[#49A078] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#49A078] dark:focus:border-[#49A078]"
                placeholder="Leave a comment..."></textarea>
            @error('message')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-end h-full w-full relative">
            <button type="submit" wire:loading.attr="disabled"
                class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-[#000000] hover:bg-[#1d1e1e] sm:w-fit "
                wire:target="sendEmail">
                <span wire:loading wire:target="sendEmail">Sending...</span>
                <span wire:loading.remove wire:target="sendEmail">Send Message</span>
            </button>
        </div>
    </form>
</div>

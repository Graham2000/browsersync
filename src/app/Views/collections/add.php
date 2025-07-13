<div class="flex flex-row gap-2">
    <div class="flex flex-row w-full justify-between items-center">
        <a href="/collections" id="backButton" class="bg-gray-200 text-black px-4 py-2 rounded-md flex flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            Back to collections
        </a>
    </div>
</div>

<h1 class="text-2xl font-bold mb-4 mt-10">Add Collection</h1>

<form class="mt-4 flex flex-col" action="/collections" method="post">
    <label class="text-gray-600 mb-2 mt-5 block" for="title">Title</label>
    <input type="text" name="title" placeholder="Enter Title" class="w-full p-4 border border-gray-300 rounded-md">

    <button type="submit" class="mt-8 inline-block bg-gray-200 text-black font-semibold py-3 px-6 rounded-xl">Add Collection</button>
</form>  
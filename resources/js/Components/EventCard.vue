<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <h3 class="text-xl font-bold text-gray-900 mb-2">
                <slot name="title" />
            </h3>

            <p class="text-gray-700 text-base">
                <slot name="description" />
            </p>
        </div>

        <div class="px-6 pt-4 pb-2">
            <slot name="span" />
        </div>
    </div>
</template>

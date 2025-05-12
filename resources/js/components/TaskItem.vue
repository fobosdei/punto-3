<template>
  <div class="bg-white p-2 md:p-3 rounded-md shadow border border-gray-200 hover:shadow-lg transition-shadow">
    <div class="flex justify-between items-center">
      <input v-model="task.title" @blur="emit('update-task', task)" class="text-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-400 focus:bg-gray-50 p-1 rounded w-full" placeholder="Título de la tarea" />
      <button @click="emit('delete-task', task.id)" class="text-gray-400 hover:text-red-500 ml-2 p-1 rounded-full hover:bg-red-100 transition-colors flex-shrink-0" title="Eliminar tarea">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
</template>

<script setup>
const props = defineProps(['task'])
const emit = defineEmits(['update-task', 'delete-task'])
</script>

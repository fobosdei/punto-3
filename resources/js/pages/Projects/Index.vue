<template>
  <div class="bg-blue-600 p-4 md:p-6 min-h-screen">
    <h1 class="text-2xl md:text-3xl font-bold mb-6 text-white">Mis Proyectos</h1>
    <div class="flex overflow-x-auto space-x-4 md:space-x-6 pb-4 custom-scrollbar-container">
      <!-- Formulario para crear un nuevo proyecto -->
      <ProjectCreator :newProject="newProject" @create-project="createProject" />

      <!-- Listado de proyectos -->
      <ProjectCard
        v-for="project in projects"
        :key="project.id"
        :project="project"
        :newTasks="newTasks"
        @add-task="addTask"
        @update-project="updateProject"
        @delete-project="deleteProject"
        @update-task="updateTask"
        @delete-task="deleteTask"
      />
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import ProjectCard from '@/components/ProjectCard.vue'
import ProjectCreator from '@/components/ProjectCreator.vue'

const props = defineProps({ projects: Array })

const newProject = ref({ name: '', description: '' })
const newTasks = ref({})
props.projects.forEach(p => (newTasks.value[p.id] ??= ''))

const createProject = () => {
  router.post('/projects', newProject.value, {
    onSuccess: () => {
      newProject.value.name = ''
      newProject.value.description = ''
    }
  })
}

const addTask = (projectId) => {
  const title = newTasks.value[projectId]
  if (!title || !title.trim()) return

  router.post('/tasks', {
    title: title.trim(),
    project_id: projectId,
  }, {
    onSuccess: () => { newTasks.value[projectId] = '' }
  })
}

const updateProject = (project) => {
  router.put(`/projects/${project.id}`, {
    name: project.name,
    description: project.description,
  })
}

const deleteProject = (id) => {
  if (confirm('¿Estás seguro de que deseas eliminar este proyecto y todas sus tareas?')) {
    router.delete(`/projects/${id}`)
  }
}

const updateTask = (task) => {
  router.put(`/tasks/${task.id}`, {
    title: task.title,
    project_id: task.project_id,
  })
}

const deleteTask = (id) => {
  if (confirm('¿Estás seguro de que deseas eliminar esta tarea?')) {
    router.delete(`/tasks/${id}`)
  }
}
</script>

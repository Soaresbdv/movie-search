<script setup lang="ts">
import { ref, onMounted } from 'vue';
import MovieCard from './components/MovieCard.vue';
import type { Movie } from './types/movie';

const movies = ref<Movie[]>([]);
const isLoading = ref(true);

const searchQuery = ref('');

const fetchMovies = async (query = '') => {
  isLoading.value = true;
  
  try {
    const url = query 
      ? `http://localhost:8000/filmes?search=${encodeURIComponent(query)}` 
      : 'http://localhost:8000/filmes';
      
    const response = await fetch(url);
    const data = await response.json();
    
    movies.value = data.results || []; 
  } catch (error) {
    console.error('Erro ao buscar os filmes na API:', error);
  } finally {
    isLoading.value = false;
  }
};

const handleSearch = () => {
  fetchMovies(searchQuery.value);
};

onMounted(() => {
  fetchMovies();
});
</script>

<template>
  <div class="min-h-screen bg-gray-900 text-white p-8">
    <div class="max-w-7xl mx-auto">
      
      <header class="mb-8 text-center md:text-left">
        <h1 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400 mb-2">
          Movie Search Portfolio
        </h1>
        <p class="text-gray-400">Descubra os filmes mais populares ou busque pelos seus favoritos</p>
      </header>

      <div class="mb-12 flex flex-col sm:flex-row items-center gap-4">
        <input 
          v-model="searchQuery" 
          @keyup.enter="handleSearch"
          type="text" 
          placeholder="Buscar filmes (ex: Batman, Matrix)..." 
          class="w-full sm:max-w-md px-4 py-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 border border-gray-700 placeholder-gray-500"
        />
        <button 
          @click="handleSearch" 
          class="w-full sm:w-auto bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-3 rounded-lg font-bold transition-colors"
        >
          Pesquisar
        </button>
      </div>

      <div v-if="isLoading" class="text-center text-gray-400 py-20 flex flex-col items-center">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-emerald-500 mb-4"></div>
        Buscando filmes...
      </div>
      
      <div v-else-if="movies.length === 0" class="text-center text-gray-400 py-20">
        Nenhum filme encontrado para "{{ searchQuery }}".
      </div>

      <div v-else class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <MovieCard 
          v-for="movie in movies" 
          :key="movie.id" 
          :movie="movie" 
        />
      </div>

    </div>
  </div>
</template>
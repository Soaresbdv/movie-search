<script setup lang="ts">
import type { Movie } from '../types/movie';

// Recebe os dados do filme como propriedade
defineProps<{
  movie: Movie;
}>();

// Constante com a URL base das imagens do TMDB
const TMDB_IMAGE_BASE_URL = 'https://image.tmdb.org/t/p/w500';
</script>

<template>
  <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg transition-transform hover:scale-105 flex flex-col">
    <img 
      v-if="movie.poster_path"
      :src="TMDB_IMAGE_BASE_URL + movie.poster_path" 
      :alt="movie.title"
      class="w-full h-auto object-cover aspect-[2/3]"
    />
    <div v-else class="w-full aspect-[2/3] bg-gray-700 flex items-center justify-center">
      <span class="text-gray-500">Sem imagem</span>
    </div>

    <div class="p-5 flex flex-col flex-grow">
      <h3 class="font-bold text-xl text-white mb-1 line-clamp-1" :title="movie.title">
        {{ movie.title }}
      </h3>
      <p class="text-sm text-gray-400 mb-4">{{ movie.release_date.split('-')[0] }}</p>
      
      <p class="text-gray-300 text-sm line-clamp-3 mb-4 flex-grow" :title="movie.overview">
        {{ movie.overview || 'Sinopse não disponível.' }}
      </p>

      <div class="flex justify-between items-center mt-auto">
        <div class="flex items-center gap-1">
          <span class="text-yellow-400">★</span>
          <span class="text-white font-bold">{{ movie.vote_average.toFixed(1) }}</span>
        </div>
        
        <button class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
          Favoritar
        </button>
      </div>
    </div>
  </div>
</template>
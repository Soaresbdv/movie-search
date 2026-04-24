<script setup lang="ts">
import { ref } from 'vue';
import MovieCard from './components/MovieCard.vue';
import type { Movie } from './types/movie';

// Dados falsos extraídos da sua requisição real
const mockMovies = ref<Movie[]>([
  {
    "id": 1226863,
    "title": "Super Mario Galaxy: O Filme",
    "overview": "Depois de salvar o Reino dos Cogumelos, Mario e seus amigos se encontram em uma missão intergaláctica para deter um novo vilão ameaçador.",
    "poster_path": "/b3WeTp42eJSRuE4UZfyPCOJW4c.jpg",
    "release_date": "2026-04-01",
    "vote_average": 6.75
  },
  {
    "id": 1198994,
    "title": "Socorro!",
    "overview": "Após um acidente aéreo, um chefe e uma funcionária que se odeiam são os únicos sobreviventes. Isolados numa ilha deserta, eles precisam decidir se cooperam ou competem para escapar, mas é difícil deixar para trás os conflitos do escritório.",
    "poster_path": "/furPD78BZsKAWZoGvoqArIJYPy2.jpg",
    "release_date": "2026-01-22",
    "vote_average": 7.041
  },
  {
    "id": 83533,
    "title": "Avatar: Fogo e Cinzas",
    "overview": "Após a devastadora guerra contra a RDA e a perda de seu filho mais velho, Jake Sully e Neytiri enfrentam uma nova ameaça em Pandora: o Povo das Cinzas, uma tribo Na'vi violenta e sedenta por poder, liderada pela implacável Varang.",
    "poster_path": "/9k2zKeUfcKkAz1dGt5MP6dZMm4G.jpg",
    "release_date": "2025-12-17",
    "vote_average": 7.372
  },
  {
    "id": 1613798,
    "title": "Vingança Brutal",
    "overview": "Quando sua esposa é brutalmente assassinada, Carlos Estrada, herói condecorado das forças especiais, passa a viver com apenas um propósito: vingança. Depois que uma reviravolta do destino o torna um milionário, Carlos transforma sua fortuna em um arsenal.",
    "poster_path": "/88P3qzWBRYvI0K5fNtqwwXQsvwi.jpg",
    "release_date": "2026-02-26",
    "vote_average": 6.713
  }
]);
</script>

<template>
  <div class="min-h-screen bg-gray-900 text-white p-8">
    <div class="max-w-7xl mx-auto">
      
      <header class="mb-12 text-center md:text-left">
        <h1 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400 mb-2">
          Movie Search Portfolio
        </h1>
        <p class="text-gray-400">Descubra os filmes mais populares do momento</p>
      </header>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <MovieCard 
          v-for="movie in mockMovies" 
          :key="movie.id" 
          :movie="movie" 
        />
      </div>

    </div>
  </div>
</template>
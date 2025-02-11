import { defineStore } from 'pinia'
import {http} from '@utils/http.mjs'

export const useGenreStore = defineStore('genre-store', {
  state() {
    return {
      genres: []
    }
  },
  actions: {
    async getGenres() {
      let resp = await http.get('genres');
      this.genres = resp.data.data;
    },
    async getGenre(id){
      let resp = await http.get(`genres/${id}`);
      return resp.data.data;
    }
  },
  getters: {
    genreOptions() {
      var options = {};
      for(let genre of this.genres){
        options[genre.id] = genre.name;
      }
      return options;
    }
  }
})

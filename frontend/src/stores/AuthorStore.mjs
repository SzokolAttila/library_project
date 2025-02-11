import { defineStore } from 'pinia'
import {http} from '@utils/http.mjs'

export const useAuthorStore = defineStore('author-store', {
  state() {
    return {
      authors: []
    }
  },
  actions: {
    async getAuthors() {
      let resp = await http.get('authors');
      this.authors = resp.data.data;
    },
    async getAuthor(id){
      let resp = await http.get(`authors/${id}`);
      return resp.data.data;
    }
  },
  getters: {
    authorOptions() {
      var options = {};
      for(let author of this.authors){
        options[author.id] = author.name;
      }
      return options;
    }
  }
})

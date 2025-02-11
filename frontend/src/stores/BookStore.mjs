import { defineStore } from 'pinia'
import {http} from '@utils/http.mjs'

export const useBookStore = defineStore('book-store', {
  state() {
    return {
      books: []
    }
  },
  actions: {
    async getBooks() {
      let resp = await http.get('books');
      this.books = resp.data.data;
    },
    async postBook(data){
      let resp = await http.post('books', data);
      this.books.push(resp.data.data);
    },
    async getBook(id){
      let resp = await http.get(`books/${id}`);
      return resp.data.data;
    },
    async putBook(id, data){
      let resp = await http.put(`books/${id}`, data);
      this.books.splice(this.books.findIndex((book) => book.id === id), 1, resp.data.data);
    },
    async deleteBook(id){
      await http.delete(`books/${id}`);
      this.books.splice(this.books.findIndex((book) => book.id === id), 1);
    }
  }
})

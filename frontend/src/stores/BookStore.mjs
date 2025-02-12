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
    async getBook(isbn){
      let resp = await http.get(`books/${isbn}`);
      return resp.data.data;
    },
    async putBook(isbn, data){
      console.log(data)
      let resp = await http.put(`books/${isbn}`, JSON.stringify(data));
      this.books.splice(this.books.findIndex((book) => book.isbn === isbn), 1, resp.data.data);
    },
    async deleteBook(isbn){
      await http.delete(`books/${isbn}`);
      this.books.splice(this.books.findIndex((book) => book.isbn === isbn), 1);
    }
  }
})

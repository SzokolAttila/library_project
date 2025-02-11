import { defineStore } from 'pinia'
import {http} from '@utils/http.mjs'

export const usePublisherStore = defineStore('publisher-store', {
  state() {
    return {
      publishers: []
    }
  },
  actions: {
    async getPublishers() {
      let resp = http.get('publishers');
      this.publishers = resp.data.data;
    },
    async getPublisher(id){
      let resp = http.get(`publishers/${id}`);
      return resp.data.data;
    }
  },
  getters: {
    publisherOptions() {
      var options = {};
      for(let publisher of this.publishers){
        options[publisher.id] = publisher.name;
      }
      return options;
    }
  }
})

<script>

import axios from 'axios';

import Header from './components/Header.vue'

export default {
  components: {
    Header
  },

  data() {
    return {
      postsData: () => {
        axios.get('http://localhost:3000/vueserv/app.php/getData')
          .then(response => {
            console.log(response.data);
            
            return response.data
          })
      }
    }
  }
}

</script>

<template>
  <div class="contaner">
    <Header />
  </div>
</template>
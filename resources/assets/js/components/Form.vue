<template lang="html">
  <form action="" @submit.stop.prevent="saveData()">
    <div class="form-group">
      <label for="title">タイトル</label>
      <input type="text" v-model="title" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
      <label for="content">内容</label>
      <textarea v-model="content" name="content" id="content" class="form-control"></textarea>
    </div>
    <button class="btn btn-default">登録</button>
    <transition name="fade">
      <div v-if="message" class="alert alert-success" role="alert">{{message}}</div>
    </transition>
  </form>
</template>

<script>
export default {
  data: function() {
    return {
      title:'',
      content: '',
      message:'',
    }
  },
  methods: {
    saveData : function () {
      axios.post('/api/posts', {
        title: this.title,
        content: this.content,
      })
      .then( res => {
        this.message = res.data.message
        this.$emit('save')
        this.title = ''
        this.content = ''
      });
    }
  }
}
</script>

<style lang="scss" scoped>
form {
  border:1px solid #ccc;
  border-radius:5px;
  padding:15px;
}
.alert{
  margin:10px 0;
}
</style>

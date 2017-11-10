<template lang="html">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <transition name="fade">
          <div v-if="message" class="alert alert-success">{{message}}</div>
        </transition>
        <div class="panel panel-success">
          <div class="panel-heading">
            <span v-if="mode=='view'">{{item.title}}</span>
            <input type="text" v-if="mode=='edit'" id="title" name="content" v-model="item.title">
          </div>
          <div class="panel-body post-description" v-if="mode=='view'">{{item.content}}</div>
          <div class="panel-body post-description" v-if="mode=='edit'">
            <textarea id="content" name="content" v-model="item.content">{{item.content}}</textarea>
          </div>
          <div class="panel-footer">
            <a href="#" v-if="mode=='view'" @click.prevent="modeEdit()" class="btn btn-default">編集</a>
            <a href="#" v-if="mode=='edit'" @click.prevent="update()" class="btn btn-default">登録</a>
            <a href="#" v-if="mode=='edit'" @click.prevent="modeView()" class="btn btn-default">閉じる</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <list ref="posts"></list>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      mode: 'view',
      message: '',
      item: {},
    }
  },
  methods : {
    getArticle: function() {
      axios.get('/api/posts/' + escape(this.$route.params.post_id))
      .then( res => {
        this.item = res.data.data
      } );
    },
    modeEdit: function() {
      this.mode = 'edit'
    },
    modeView: function() {
      this.getArticle()
      this.mode = 'view'
    },
    update: function() {
      axios.put('/api/posts/' + this.item.id, {
        title: this.item.title,
        content: this.item.content,
      })
      .then( res => {
        this.message = res.data.message
        this.mode = 'view'
        this.getArticle()
        this.$refs.posts.getLists()
      });
    }
  },
  created: function() {
    this.getArticle();
  },
  watch: {
    '$route' (to, from) {
      this.getArticle();
    }
  }
}
</script>

<style lang="scss" scoped>
.post-description{
  white-space: pre-line;
}
</style>

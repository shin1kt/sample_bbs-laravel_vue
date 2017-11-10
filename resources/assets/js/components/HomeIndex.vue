<template lang="html">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <post-form @save="save()"></post-form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <list ref="posts"></list>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    save: function() {
      this.$refs.posts.getLists();
    }
  }
}
</script>

<style lang="scss" scoped>
.row {
  margin-bottom:35px;
}
</style>

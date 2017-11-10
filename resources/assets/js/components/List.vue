<template lang="html">
  <div class="pannel pannel-default" @reload="reload()">
    <div class="pannel-heading">記事一覧</div>
    <div class="pannel-body">
      <div class="list-group">
        <posts v-for="item in items" :item="item" :key="item.id"></posts>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      items: {}
    }
  },
  methods: {
    getLists: function () {
      axios.get('/api/posts')
      .then(res => {
        this.items = res.data.data
      });
    }
  },
  // created: function () {
  //   this.getLists()
  // },
  mounted: function () {
    this.getLists()
  }
}
</script>

<style lang="css">
</style>

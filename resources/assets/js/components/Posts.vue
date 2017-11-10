<template lang="html">
  <transition name="fade">
    <router-link :to="{ name:'description', params: {post_id: item.id }}"  class="list-group-item">{{item.title}}</router-link>
  </transition>
</template>

<script>
export default {
  props:['item']
}
</script>

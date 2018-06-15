import Vue from 'vue'
import Router from 'vue-router'
import srank from '@/components/rank/srank'
import Rank from '@/components/rank/rank'
import more from '@/components/more/more'
import all from '@/components/all/all'
import book from '@/components/book/book'
import read from '@/components/read/read'
import tik from '@/components/booktik/booktik'
import author from'@/components/author/author'
import search from'@/components/search/search'
import complete from'@/components/complete/complete'
import user from'@/components/user/user'
import shouye from'@/components/shouye/shouye'

Vue.use(Router)

export default new Router({
  model:'history',
  routes: [
      {
        path:'/',
        name:"shouye",
        component:shouye
      },
    {
      path: '/rank',
      name: 'rank',
      component: Rank,
      children:[
        {
          path: '/rank/',
          name: 'sran',
          component: srank
        },
        {
          path: '/rank/more',
          name: 'more',
          component: more
        },
        {
          path: '/rank/book',
          name: 'books',
          component:book
        }
      ]
    },
    {
      path: '/all',
      name: 'all',
      component: all,
    },
    {
      path: '/book',
      name: 'book',
      component: book
    },
    {
      path:'/read',
      name:'read',
      component:read
    },
    {
      path:'/booktik',
      name:'booktik',
      component:tik
    },
    {
      path:'/author',
      name:'author',
      component:author
    },
    {
      path:'/search',
      name:'search',
      component:search
    },
    {
      path:'/complete',
      name:'complete',
      component:complete
    },
      {
        path:'/user',
        name:'user',
        component:user
      }
  ]
})

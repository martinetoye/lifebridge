<template>
   <div  class="container masonry">
     <!--section-->
     <div :id="post.id" v-for="post,key in posts" class="item lb-section__item">
         <div class="lb-section">
             <div class="lb-section__head">
               <!-- {{ route('profile', $post->user->username)}}-->     <!-- {{ Storage::url('userfiles/avatars/'. $post->user->avatar)}}-->
                 <a href="" class="lb-section__avatar lb-avatar"><img class="lb-avatar" :src="'/userfiles/avatars/'+post.user.avatar" alt=""></a>
                 <div>
                   <!--{{ route('profile', $post->user->username)}} -->
                     <a href="" class="lb-section__name">{{ post.user.name }}</a>
                     <span class="lb-section__passed">{{ post.created_at | moment("from", "now")}}</span>
                 </div>
                  <!-- {{route('post.edit', $post->id)}} -->
                 <a v-if="isUser(post.user.id)" href="" class="lb-section__link lb-btn-icon"><i class="fa fa-ellipsis-v"></i></a>

             </div>
             <div class="lb-section__content">
                 <p>{{post.body}}</p>
             </div>
             <div class="lb-section__footer">
                <!-- This is the Upvote Button it will switch wether user has upvoted or not -->
                  <!--{{ route('post.vote.cancel', $post->id)}} -->
                 <a @click="downvote(post)" v-if="hasVoted(post.voters)" class="lb-section__btn-upvote lb-btn-icon like"><i class="fa fa-check"></i></a>
                 <!-- {{ route('post.vote', $post->id)}} -->
                 <a @click="upvote(post)" v-else class="lb-section__btn-upvote lb-btn-icon"><i class="icon-Upvote"></i></a>


                 <!-- {{ route('post.reshare', $post->id)}} -->
                 <a href="" class="lb-section__btn-repost lb-btn-icon"><i class="icon-Repost"></i></a>

                   <!-- This is the Like button. This will check to see if user has liked or not -->
                   <!-- {{ route('post.like', $post->id)}} -->
                       <a  @click="like(post)" class="lb-section__btn-like lb-btn-icon">
                          <i  class="icon-Favorite_Full" :class="{liked : hasLiked(post.likers)}"></i>
                          <span>{{ post.likers.length}}</span>
                        </a>



                     <!--{{ route('post.single', $post->id)}} -->
                 <a href="" class="lb-section__btn-comment lb-btn-icon"><i class="icon-Comment_Full"></i><span>{{ post.comments.length}}</span></a>
                 <a href="#" class="lb-section__btn-share lb-btn-icon"><i class="icon-Share"></i></a>
             </div>
         </div>
     </div>
   </div>
</template>

<script>
export default {
  data () {
    return {
      posts: [],
      post: {
        selected: false,
      },
      user: {},
    }
  },//End Data
  mounted() {
    this.getPosts();
    this.user = window.auth_user;
  },//End Mounted
  methods: {
    getPosts(){
      axios.get('/api/posts').then(response => {
        this.posts = response.data
        //console.log(this.posts)
      })
    },
    isUser(user){
      if(this.user.id == user)
      return true;
    },
    hasLiked(likers){
      let x = likers[0]
      if(x){
        if(x.id == this.user.id){
          return true
        }
      }
    },
    hasVoted(voters){
      let x = voters[0]
      if(x){
        if(x.id == this.user.id){
          return true
        }
      }
    },
    like(post){
      axios.post('/api/like',{
        id: post.id,
        user: this.user
      }).then((response)=>{
        this.getPosts();
      })
    },
    upvote(post){
      axios.post('/api/vote',{
        id: post.id,
        user: this.user
      }).then((response)=>{
        this.getPosts();
      })
    },
    downvote(post){
      axios.post('/api/downvote',{
        id: post.id,
        user: this.user
      }).then((response)=>{
        this.getPosts();
      })
    }
  },//End methods
}
</script>

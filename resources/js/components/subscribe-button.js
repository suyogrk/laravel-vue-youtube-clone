import numeral from 'numeral'
Vue.component('subscribe-button',{
    props: {
        channel:{
            type:Object,
            required :true,
            default:()=>[],

        },
      initialSubscriptions:{
          type: Array,
          required:true,
          default:()=>[]
      }
    },

    data:function(){
        return {
            subscriptions: this.initialSubscriptions,
        }
    },
    computed:{
        subscribed(){
            if(!__auth() || this.channel.user_id ===__auth().id) return false;

            return !!this.subscription;
        },
        owner(){
            if(__auth() && this.channel.user_id ===__auth().id) return true;

            return false;
        },
        count(){
            return numeral(this.subscriptions.length).format('0a');
        },
        subscription(){
           return this.subscriptions.find(subscription=> subscription.user_id === __auth().id)
        }
    },
methods: {
    toggleSubscription(){
        if(!__auth()){
            alert('Please login to subscribe');
        }

        if(this.owner){
            return alert('You cannot subscribe to your channel')
        }

        if(this.subscribed){
            axios.delete(`/channels/${this.channel.id}/subscriptions/${this.subscription.id}`)
                .then(()=>{
                    this.subscriptions = this.subscriptions.filter(s=>s.id !== this.subscription.id)
                });
        }else
        {
           axios.post(`/channels/${this.channel.id}/subscriptions`)
               .then(response=>{
                   this.subscriptions=[
                       ...this.subscriptions,
                       //... is spread operator
                       //https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Spread_syntax
                       response.data
                   ]
               });
        }
    }
}
});

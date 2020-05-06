import videojs from 'video.js';
Vue.component('videojs-player',{
    props: {
        source: {
            type: String,
            required: false,
            default:()=>[]
        },
    },
    data:function(){
        return {
            player:null,
            options:[],
        }
    },
    mounted(){
        this.options = {
            autoplay: true,
            controls: true,
            sources: [
                {
                    src: "/storage/"+this.source,
                    type: "application/x-mpegURL"
                }
            ]};
        this.player = videojs(this.$refs.videoPlayer, this.options, function onPlayerReady() {
            console.log('onPlayerReady', this);
        });
    },
    beforeDestroy() {
            if (this.player) {
                this.player.dispose()
            }
    },
});

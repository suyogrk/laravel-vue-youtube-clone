import videojs from 'video.js';
Vue.component('videojs-player',{
    props: {
        source: {
            type: String,
            required: false,
            default:()=>[]
        },
        currentvideo:{
            type:String,
            required: true,
            default:()=>[]
        }
    },
    data:function(){
        return {
            player:null,
            options:[],
        }
    },
    methods:{
        playerGetTime(){
           return this.player.currentTime();
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

        const vsource = this.currentvideo;
        this.player = videojs(this.$refs.videoPlayer, this.options, function onPlayerReady() {
                var myPlayer = this;
                var viewLogged = false;
                if(!viewLogged){
                    myPlayer.on('timeupdate', function(){
                        var percentagePlayed = Math.ceil(myPlayer.currentTime() / myPlayer.duration() * 100);
                        if (percentagePlayed > 15 && !viewLogged) {
                            axios.put('/videos/'+vsource );
                            viewLogged = true;
                        }
                    })
                }

        });



        this.player.on('timeupdate', function () {
            //var percentagePlayed = Math.ceil(this.player.currentTime() / this.player.duration() * 100);

            console.log(vsource);
            /*
            }*/
        });

    },
    beforeDestroy() {
            if (this.player) {
                this.player.dispose()
            }
    },
});

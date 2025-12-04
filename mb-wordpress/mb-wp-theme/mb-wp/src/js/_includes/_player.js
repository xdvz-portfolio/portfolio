function PlayerAppComponent_select(playerComponent) {
    return {
        template: '#player-select-template',
        props: {
            top10WeekTracks: Array,
            top10MonthTracks: Array,
            top10AllTracks: Array,
        },
        components: {
            'player': playerComponent
        }
    };
}

function PlayerAppComponent_genres(playerComponent) {
    return {
        template: '#player-genres-template',
        props: {
            top10WeekTracks: Array,
            top10MonthTracks: Array,
            top10AllTracks: Array,
        },
        components: {
            'player': playerComponent
        }
    };
}

function PlayerAppComponent_business(playerComponent) {
    return {
        template: '#player-business-template',
        props: {
            top10WeekTracks: Array,
            top10MonthTracks: Array,
            top10AllTracks: Array,
        },
        components: {
            'player': playerComponent
        }
    };
}

function PlayerAppComponent_artists(playerComponent) {
    return {
        template: '#player-artists-template',
        props: {
            top10WeekTracks: Array,
            top10MonthTracks: Array,
            top10AllTracks: Array,
        },
        components: {
            'player': playerComponent
        }
    };
}

function PlayerComponent(tracks) {
    return {
        template: '#player-template',
        props: {
            tracks: Array
        },
        data: function() {
            return {
                audio: null,
                circleLeft: null,
                barWidth: null,
                duration: null,
                initialized: false,
                currentTime: null,
                isTimerPlaying: false,
                currentTrack: null,
                currentTrackIndex: 0,
                transitionName: null
            };
        },
        methods: {
            play: function() {
                if (this.audio.paused) {
                    this.audio.play();
                    this.isTimerPlaying = true;
                    console.log(this);
                } else {
                    this.audio.pause();
                    this.isTimerPlaying = false;
                }
            },
            generateTime: function() {
                var width = (100 / this.audio.duration) * this.audio.currentTime;
                this.barWidth = width + "%";
                this.circleLeft = width + "%";
                var durmin = Math.floor(this.audio.duration / 60);
                var dursec = Math.floor(this.audio.duration - durmin * 60);
                var curmin = Math.floor(this.audio.currentTime / 60);
                var cursec = Math.floor(this.audio.currentTime - curmin * 60);
                if (durmin < 10) {
                    durmin = "0" + durmin;
                }
                if (dursec < 10) {
                    dursec = "0" + dursec;
                }
                if (curmin < 10) {
                    curmin = "0" + curmin;
                }
                if (cursec < 10) {
                    cursec = "0" + cursec;
                }
                this.duration = durmin + ":" + dursec;
                this.currentTime = curmin + ":" + cursec;
            },
            updateBar: function(x) {
                var progress = this.$refs.progress;
                var maxduration = this.audio.duration;
                var position = x - progress.offsetLeft;
                var percentage = (100 * position) / progress.offsetWidth;
                if (percentage > 100) {
                    percentage = 100;
                }
                if (percentage < 0) {
                    percentage = 0;
                }
                this.barWidth = percentage + "%";
                this.circleLeft = percentage + "%";
                this.audio.currentTime = (maxduration * percentage) / 100;
                this.audio.play();
            },
            clickProgress: function(e) {
                this.isTimerPlaying = true;
                this.audio.pause();
                this.updateBar(e.pageX);
            },
            prevTrack: function() {
                this.transitionName = "scale-in";
                this.isShowCover = false;
                if (this.currentTrackIndex > 0) {
                    this.currentTrackIndex--;
                } else {
                    this.currentTrackIndex = this.tracks.length - 1;
                }
                this.currentTrack = this.tracks[this.currentTrackIndex];
                this.resetPlayer();
            },
            nextTrack: function() {
                this.transitionName = "scale-out";
                this.isShowCover = false;
                if (this.currentTrackIndex < this.tracks.length - 1) {
                    this.currentTrackIndex++;
                } else {
                    this.currentTrackIndex = 0;
                }
                this.currentTrack = this.tracks[this.currentTrackIndex];
                this.resetPlayer();
            },
            resetPlayer: function() {
                this.barWidth = 0;
                this.circleLeft = 0;
                this.audio.currentTime = 0;
                this.audio.src = this.currentTrack.source;
                var that = this;
                setTimeout(function() {
                    if (that.isTimerPlaying) {
                        that.audio.play();
                    } else {
                        that.audio.pause();
                    }
                }, 300);
            },
            favorite: function() {
                this.tracks[this.currentTrackIndex].favorited = !this.tracks[
                    this.currentTrackIndex
                    ].favorited;
            },
            initialRun: function() {
                if (this.tracks === undefined) return;
                var that = this;
                this.currentTrack = this.tracks[0];
                this.audio = new Audio();
                this.audio.src = this.currentTrack.source;
                this.audio.ontimeupdate = function () {
                    that.generateTime();
                };
                this.audio.onloadedmetadata = function () {
                    that.generateTime();
                };
                this.audio.onended = function () {
                    that.nextTrack();
                    this.isTimerPlaying = true;
                };

                // this is optional (for preload covers)
                for (var index = 0; index < this.tracks.length; index++) {
                    var element = this.tracks[index];
                    var link = document.createElement('link');
                    link.rel = "prefetch";
                    link.href = element.cover;
                    link.as = "image";
                    document.head.appendChild(link);
                }

                this.initialized = true;
            }
        },
        mounted: function() {
            this.initialRun();
        },
    };
}

function Top10AllTracks() {
    return [
        {
            name: "Mekanın Sahibi",
            artist: "Norm Ender",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/1.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/1.mp3",
            url: "https://www.youtube.com/watch?v=z3wAjJXbYzA",
            favorited: false
        },
        {
            name: "Everybody Knows",
            artist: "Leonard Cohen",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/2.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3",
            url: "https://www.youtube.com/watch?v=Lin-a2lTelg",
            favorited: false
        },
        {
            name: "Extreme Ways",
            artist: "Moby",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/3.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/3.mp3",
            url: "https://www.youtube.com/watch?v=ICjyAe9S54c",
            favorited: false
        },
        {
            name: "Butterflies",
            artist: "Sia",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/4.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/4.mp3",
            url: "https://www.youtube.com/watch?v=kYgGwWYOd9Y",
            favorited: false
        },
        {
            name: "The Final Victory",
            artist: "Haggard",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/5.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/5.mp3",
            url: "https://www.youtube.com/watch?v=0WlpALnQdN8",
            favorited: true
        },
        {
            name: "Genius ft. Sia, Diplo, Labrinth",
            artist: "LSD",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/6.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/6.mp3",
            url: "https://www.youtube.com/watch?v=HhoATZ1Imtw",
            favorited: false
        },
        {
            name: "The Comeback Kid",
            artist: "Lindi Ortega",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/7.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/7.mp3",
            url: "https://www.youtube.com/watch?v=me6aoX0wCV8",
            favorited: true
        },
        {
            name: "Overdose",
            artist: "Grandson",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/8.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/8.mp3",
            url: "https://www.youtube.com/watch?v=00-Rl3Jlx-o",
            favorited: false
        },
        {
            name: "Rag'n'Bone Man",
            artist: "Human",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/9.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/9.mp3",
            url: "https://www.youtube.com/watch?v=L3wKzyIN1yk",
            favorited: false
        }
    ];
}

function Top10MonthTracks() {
    return [
        {
            name: "Everybody Knows",
            artist: "Leonard Cohen",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/2.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3",
            url: "https://www.youtube.com/watch?v=Lin-a2lTelg",
            favorited: true
        },
        {
            name: "Mekanın Sahibi",
            artist: "Norm Ender",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/1.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/1.mp3",
            url: "https://www.youtube.com/watch?v=z3wAjJXbYzA",
            favorited: false
        },
        {
            name: "Extreme Ways",
            artist: "Moby",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/3.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/3.mp3",
            url: "https://www.youtube.com/watch?v=ICjyAe9S54c",
            favorited: false
        },
        {
            name: "Butterflies",
            artist: "Sia",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/4.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/4.mp3",
            url: "https://www.youtube.com/watch?v=kYgGwWYOd9Y",
            favorited: false
        },
        {
            name: "The Final Victory",
            artist: "Haggard",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/5.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/5.mp3",
            url: "https://www.youtube.com/watch?v=0WlpALnQdN8",
            favorited: true
        },
        {
            name: "Genius ft. Sia, Diplo, Labrinth",
            artist: "LSD",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/6.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/6.mp3",
            url: "https://www.youtube.com/watch?v=HhoATZ1Imtw",
            favorited: false
        },
        {
            name: "The Comeback Kid",
            artist: "Lindi Ortega",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/7.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/7.mp3",
            url: "https://www.youtube.com/watch?v=me6aoX0wCV8",
            favorited: true
        },
        {
            name: "Overdose",
            artist: "Grandson",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/8.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/8.mp3",
            url: "https://www.youtube.com/watch?v=00-Rl3Jlx-o",
            favorited: false
        },
        {
            name: "Rag'n'Bone Man",
            artist: "Human",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/9.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/9.mp3",
            url: "https://www.youtube.com/watch?v=L3wKzyIN1yk",
            favorited: false
        }
    ];
}

function Top10WeekTracks() {
    return [
        {
            name: "Extreme Ways",
            artist: "Moby",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/3.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/3.mp3",
            url: "https://www.youtube.com/watch?v=ICjyAe9S54c",
            favorited: false
        },
        {
            name: "Mekanın Sahibi",
            artist: "Norm Ender",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/1.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/1.mp3",
            url: "https://www.youtube.com/watch?v=z3wAjJXbYzA",
            favorited: false
        },
        {
            name: "Everybody Knows",
            artist: "Leonard Cohen",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/2.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3",
            url: "https://www.youtube.com/watch?v=Lin-a2lTelg",
            favorited: true
        },
        {
            name: "Butterflies",
            artist: "Sia",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/4.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/4.mp3",
            url: "https://www.youtube.com/watch?v=kYgGwWYOd9Y",
            favorited: false
        },
        {
            name: "The Final Victory",
            artist: "Haggard",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/5.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/5.mp3",
            url: "https://www.youtube.com/watch?v=0WlpALnQdN8",
            favorited: true
        },
        {
            name: "Genius ft. Sia, Diplo, Labrinth",
            artist: "LSD",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/6.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/6.mp3",
            url: "https://www.youtube.com/watch?v=HhoATZ1Imtw",
            favorited: false
        },
        {
            name: "The Comeback Kid",
            artist: "Lindi Ortega",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/7.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/7.mp3",
            url: "https://www.youtube.com/watch?v=me6aoX0wCV8",
            favorited: true
        },
        {
            name: "Overdose",
            artist: "Grandson",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/8.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/8.mp3",
            url: "https://www.youtube.com/watch?v=00-Rl3Jlx-o",
            favorited: false
        },
        {
            name: "Rag'n'Bone Man",
            artist: "Human",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/9.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/9.mp3",
            url: "https://www.youtube.com/watch?v=L3wKzyIN1yk",
            favorited: false
        }
    ];
}

function Top10DeepTracks() {
    return [
        {
            name: "Butterflies",
            artist: "Sia",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/4.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/4.mp3",
            url: "https://www.youtube.com/watch?v=kYgGwWYOd9Y",
            favorited: false
        },
        {
            name: "Mekanın Sahibi",
            artist: "Norm Ender",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/1.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/1.mp3",
            url: "https://www.youtube.com/watch?v=z3wAjJXbYzA",
            favorited: false
        },
        {
            name: "Everybody Knows",
            artist: "Leonard Cohen",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/2.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3",
            url: "https://www.youtube.com/watch?v=Lin-a2lTelg",
            favorited: true
        },
        {
            name: "Extreme Ways",
            artist: "Moby",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/3.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/3.mp3",
            url: "https://www.youtube.com/watch?v=ICjyAe9S54c",
            favorited: false
        },
        {
            name: "The Final Victory",
            artist: "Haggard",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/5.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/5.mp3",
            url: "https://www.youtube.com/watch?v=0WlpALnQdN8",
            favorited: true
        },
        {
            name: "Genius ft. Sia, Diplo, Labrinth",
            artist: "LSD",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/6.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/6.mp3",
            url: "https://www.youtube.com/watch?v=HhoATZ1Imtw",
            favorited: false
        },
        {
            name: "The Comeback Kid",
            artist: "Lindi Ortega",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/7.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/7.mp3",
            url: "https://www.youtube.com/watch?v=me6aoX0wCV8",
            favorited: true
        },
        {
            name: "Overdose",
            artist: "Grandson",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/8.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/8.mp3",
            url: "https://www.youtube.com/watch?v=00-Rl3Jlx-o",
            favorited: false
        },
        {
            name: "Rag'n'Bone Man",
            artist: "Human",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/9.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/9.mp3",
            url: "https://www.youtube.com/watch?v=L3wKzyIN1yk",
            favorited: false
        }
    ];
}

function Top10ChilloutTracks() {
    return [
        {
            name: "The Final Victory",
            artist: "Haggard",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/5.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/5.mp3",
            url: "https://www.youtube.com/watch?v=0WlpALnQdN8",
            favorited: true
        },
        {
            name: "Mekanın Sahibi",
            artist: "Norm Ender",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/1.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/1.mp3",
            url: "https://www.youtube.com/watch?v=z3wAjJXbYzA",
            favorited: false
        },
        {
            name: "Everybody Knows",
            artist: "Leonard Cohen",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/2.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3",
            url: "https://www.youtube.com/watch?v=Lin-a2lTelg",
            favorited: true
        },
        {
            name: "Extreme Ways",
            artist: "Moby",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/3.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/3.mp3",
            url: "https://www.youtube.com/watch?v=ICjyAe9S54c",
            favorited: false
        },
        {
            name: "Butterflies",
            artist: "Sia",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/4.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/4.mp3",
            url: "https://www.youtube.com/watch?v=kYgGwWYOd9Y",
            favorited: false
        },
        {
            name: "Genius ft. Sia, Diplo, Labrinth",
            artist: "LSD",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/6.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/6.mp3",
            url: "https://www.youtube.com/watch?v=HhoATZ1Imtw",
            favorited: false
        },
        {
            name: "The Comeback Kid",
            artist: "Lindi Ortega",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/7.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/7.mp3",
            url: "https://www.youtube.com/watch?v=me6aoX0wCV8",
            favorited: true
        },
        {
            name: "Overdose",
            artist: "Grandson",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/8.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/8.mp3",
            url: "https://www.youtube.com/watch?v=00-Rl3Jlx-o",
            favorited: false
        },
        {
            name: "Rag'n'Bone Man",
            artist: "Human",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/9.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/9.mp3",
            url: "https://www.youtube.com/watch?v=L3wKzyIN1yk",
            favorited: false
        }
    ];
}

function Top10PopTracks() {
    return [
        {
            name: "Genius ft. Sia, Diplo, Labrinth",
            artist: "LSD",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/6.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/6.mp3",
            url: "https://www.youtube.com/watch?v=HhoATZ1Imtw",
            favorited: false
        },
        {
            name: "Mekanın Sahibi",
            artist: "Norm Ender",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/1.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/1.mp3",
            url: "https://www.youtube.com/watch?v=z3wAjJXbYzA",
            favorited: false
        },
        {
            name: "Everybody Knows",
            artist: "Leonard Cohen",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/2.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3",
            url: "https://www.youtube.com/watch?v=Lin-a2lTelg",
            favorited: true
        },
        {
            name: "Extreme Ways",
            artist: "Moby",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/3.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/3.mp3",
            url: "https://www.youtube.com/watch?v=ICjyAe9S54c",
            favorited: false
        },
        {
            name: "Butterflies",
            artist: "Sia",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/4.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/4.mp3",
            url: "https://www.youtube.com/watch?v=kYgGwWYOd9Y",
            favorited: false
        },
        {
            name: "The Final Victory",
            artist: "Haggard",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/5.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/5.mp3",
            url: "https://www.youtube.com/watch?v=0WlpALnQdN8",
            favorited: true
        },
        {
            name: "The Comeback Kid",
            artist: "Lindi Ortega",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/7.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/7.mp3",
            url: "https://www.youtube.com/watch?v=me6aoX0wCV8",
            favorited: true
        },
        {
            name: "Overdose",
            artist: "Grandson",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/8.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/8.mp3",
            url: "https://www.youtube.com/watch?v=00-Rl3Jlx-o",
            favorited: false
        },
        {
            name: "Rag'n'Bone Man",
            artist: "Human",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/9.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/9.mp3",
            url: "https://www.youtube.com/watch?v=L3wKzyIN1yk",
            favorited: false
        }
    ];
}

function Top10Food() {
    return [
        {
            name: "The Comeback Kid",
            artist: "Lindi Ortega",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/7.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/7.mp3",
            url: "https://www.youtube.com/watch?v=me6aoX0wCV8",
            favorited: true
        },
        {
            name: "Mekanın Sahibi",
            artist: "Norm Ender",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/1.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/1.mp3",
            url: "https://www.youtube.com/watch?v=z3wAjJXbYzA",
            favorited: false
        },
        {
            name: "Everybody Knows",
            artist: "Leonard Cohen",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/2.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3",
            url: "https://www.youtube.com/watch?v=Lin-a2lTelg",
            favorited: true
        },
        {
            name: "Extreme Ways",
            artist: "Moby",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/3.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/3.mp3",
            url: "https://www.youtube.com/watch?v=ICjyAe9S54c",
            favorited: false
        },
        {
            name: "Butterflies",
            artist: "Sia",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/4.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/4.mp3",
            url: "https://www.youtube.com/watch?v=kYgGwWYOd9Y",
            favorited: false
        },
        {
            name: "The Final Victory",
            artist: "Haggard",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/5.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/5.mp3",
            url: "https://www.youtube.com/watch?v=0WlpALnQdN8",
            favorited: true
        },
        {
            name: "Genius ft. Sia, Diplo, Labrinth",
            artist: "LSD",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/6.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/6.mp3",
            url: "https://www.youtube.com/watch?v=HhoATZ1Imtw",
            favorited: false
        },
        {
            name: "Overdose",
            artist: "Grandson",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/8.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/8.mp3",
            url: "https://www.youtube.com/watch?v=00-Rl3Jlx-o",
            favorited: false
        },
        {
            name: "Rag'n'Bone Man",
            artist: "Human",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/9.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/9.mp3",
            url: "https://www.youtube.com/watch?v=L3wKzyIN1yk",
            favorited: false
        }
    ];
}

function Top10Retail() {
    return [
        {
            name: "Overdose",
            artist: "Grandson",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/8.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/8.mp3",
            url: "https://www.youtube.com/watch?v=00-Rl3Jlx-o",
            favorited: false
        },
        {
            name: "Mekanın Sahibi",
            artist: "Norm Ender",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/1.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/1.mp3",
            url: "https://www.youtube.com/watch?v=z3wAjJXbYzA",
            favorited: false
        },
        {
            name: "Everybody Knows",
            artist: "Leonard Cohen",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/2.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3",
            url: "https://www.youtube.com/watch?v=Lin-a2lTelg",
            favorited: true
        },
        {
            name: "Extreme Ways",
            artist: "Moby",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/3.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/3.mp3",
            url: "https://www.youtube.com/watch?v=ICjyAe9S54c",
            favorited: false
        },
        {
            name: "Butterflies",
            artist: "Sia",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/4.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/4.mp3",
            url: "https://www.youtube.com/watch?v=kYgGwWYOd9Y",
            favorited: false
        },
        {
            name: "The Final Victory",
            artist: "Haggard",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/5.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/5.mp3",
            url: "https://www.youtube.com/watch?v=0WlpALnQdN8",
            favorited: true
        },
        {
            name: "Genius ft. Sia, Diplo, Labrinth",
            artist: "LSD",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/6.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/6.mp3",
            url: "https://www.youtube.com/watch?v=HhoATZ1Imtw",
            favorited: false
        },
        {
            name: "The Comeback Kid",
            artist: "Lindi Ortega",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/7.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/7.mp3",
            url: "https://www.youtube.com/watch?v=me6aoX0wCV8",
            favorited: true
        },
        {
            name: "Rag'n'Bone Man",
            artist: "Human",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/9.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/9.mp3",
            url: "https://www.youtube.com/watch?v=L3wKzyIN1yk",
            favorited: false
        }
    ];
}

function Top10Sport() {
    return [
        {
            name: "Rag'n'Bone Man",
            artist: "Human",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/9.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/9.mp3",
            url: "https://www.youtube.com/watch?v=L3wKzyIN1yk",
            favorited: false
        },
        {
            name: "Mekanın Sahibi",
            artist: "Norm Ender",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/1.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/1.mp3",
            url: "https://www.youtube.com/watch?v=z3wAjJXbYzA",
            favorited: false
        },
        {
            name: "Everybody Knows",
            artist: "Leonard Cohen",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/2.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3",
            url: "https://www.youtube.com/watch?v=Lin-a2lTelg",
            favorited: true
        },
        {
            name: "Extreme Ways",
            artist: "Moby",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/3.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/3.mp3",
            url: "https://www.youtube.com/watch?v=ICjyAe9S54c",
            favorited: false
        },
        {
            name: "Butterflies",
            artist: "Sia",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/4.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/4.mp3",
            url: "https://www.youtube.com/watch?v=kYgGwWYOd9Y",
            favorited: false
        },
        {
            name: "The Final Victory",
            artist: "Haggard",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/5.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/5.mp3",
            url: "https://www.youtube.com/watch?v=0WlpALnQdN8",
            favorited: true
        },
        {
            name: "Genius ft. Sia, Diplo, Labrinth",
            artist: "LSD",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/6.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/6.mp3",
            url: "https://www.youtube.com/watch?v=HhoATZ1Imtw",
            favorited: false
        },
        {
            name: "The Comeback Kid",
            artist: "Lindi Ortega",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/7.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/7.mp3",
            url: "https://www.youtube.com/watch?v=me6aoX0wCV8",
            favorited: true
        },
        {
            name: "Overdose",
            artist: "Grandson",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/8.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/8.mp3",
            url: "https://www.youtube.com/watch?v=00-Rl3Jlx-o",
            favorited: false
        },

    ];
}

function Top10AllTracksArt() {
    return [
        {
            name: "Butterflies",
            artist: "Sia",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/4.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/4.mp3",
            url: "https://www.youtube.com/watch?v=kYgGwWYOd9Y",
            favorited: false
        },
        {
            name: "Mekanın Sahibi",
            artist: "Norm Ender",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/1.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/1.mp3",
            url: "https://www.youtube.com/watch?v=z3wAjJXbYzA",
            favorited: false
        },
        {
            name: "Everybody Knows",
            artist: "Leonard Cohen",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/2.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3",
            url: "https://www.youtube.com/watch?v=Lin-a2lTelg",
            favorited: true
        },
        {
            name: "Extreme Ways",
            artist: "Moby",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/3.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/3.mp3",
            url: "https://www.youtube.com/watch?v=ICjyAe9S54c",
            favorited: false
        },
        {
            name: "The Final Victory",
            artist: "Haggard",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/5.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/5.mp3",
            url: "https://www.youtube.com/watch?v=0WlpALnQdN8",
            favorited: true
        },
        {
            name: "Genius ft. Sia, Diplo, Labrinth",
            artist: "LSD",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/6.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/6.mp3",
            url: "https://www.youtube.com/watch?v=HhoATZ1Imtw",
            favorited: false
        },
        {
            name: "The Comeback Kid",
            artist: "Lindi Ortega",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/7.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/7.mp3",
            url: "https://www.youtube.com/watch?v=me6aoX0wCV8",
            favorited: true
        },
        {
            name: "Overdose",
            artist: "Grandson",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/8.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/8.mp3",
            url: "https://www.youtube.com/watch?v=00-Rl3Jlx-o",
            favorited: false
        },
        {
            name: "Rag'n'Bone Man",
            artist: "Human",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/9.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/9.mp3",
            url: "https://www.youtube.com/watch?v=L3wKzyIN1yk",
            favorited: false
        }
    ];
}

function Top10MonthTracksArt() {
    return [
        {
            name: "Mekanın Sahibi",
            artist: "Norm Ender",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/1.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/1.mp3",
            url: "https://www.youtube.com/watch?v=z3wAjJXbYzA",
            favorited: false
        },
        {
            name: "Everybody Knows",
            artist: "Leonard Cohen",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/2.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3",
            url: "https://www.youtube.com/watch?v=Lin-a2lTelg",
            favorited: true
        },
        {
            name: "Extreme Ways",
            artist: "Moby",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/3.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/3.mp3",
            url: "https://www.youtube.com/watch?v=ICjyAe9S54c",
            favorited: false
        },
        {
            name: "Butterflies",
            artist: "Sia",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/4.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/4.mp3",
            url: "https://www.youtube.com/watch?v=kYgGwWYOd9Y",
            favorited: false
        },
        {
            name: "The Final Victory",
            artist: "Haggard",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/5.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/5.mp3",
            url: "https://www.youtube.com/watch?v=0WlpALnQdN8",
            favorited: true
        },
        {
            name: "Genius ft. Sia, Diplo, Labrinth",
            artist: "LSD",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/6.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/6.mp3",
            url: "https://www.youtube.com/watch?v=HhoATZ1Imtw",
            favorited: false
        },
        {
            name: "The Comeback Kid",
            artist: "Lindi Ortega",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/7.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/7.mp3",
            url: "https://www.youtube.com/watch?v=me6aoX0wCV8",
            favorited: true
        },
        {
            name: "Overdose",
            artist: "Grandson",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/8.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/8.mp3",
            url: "https://www.youtube.com/watch?v=00-Rl3Jlx-o",
            favorited: false
        },
        {
            name: "Rag'n'Bone Man",
            artist: "Human",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/9.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/9.mp3",
            url: "https://www.youtube.com/watch?v=L3wKzyIN1yk",
            favorited: false
        }
    ];
}

function Top10WeekTracksArt() {
    return [
        {
            name: "The Comeback Kid",
            artist: "Lindi Ortega",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/7.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/7.mp3",
            url: "https://www.youtube.com/watch?v=me6aoX0wCV8",
            favorited: true
        },
        {
            name: "Mekanın Sahibi",
            artist: "Norm Ender",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/1.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/1.mp3",
            url: "https://www.youtube.com/watch?v=z3wAjJXbYzA",
            favorited: false
        },
        {
            name: "Everybody Knows",
            artist: "Leonard Cohen",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/2.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3",
            url: "https://www.youtube.com/watch?v=Lin-a2lTelg",
            favorited: true
        },
        {
            name: "Extreme Ways",
            artist: "Moby",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/3.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/3.mp3",
            url: "https://www.youtube.com/watch?v=ICjyAe9S54c",
            favorited: false
        },
        {
            name: "Butterflies",
            artist: "Sia",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/4.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/4.mp3",
            url: "https://www.youtube.com/watch?v=kYgGwWYOd9Y",
            favorited: false
        },
        {
            name: "The Final Victory",
            artist: "Haggard",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/5.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/5.mp3",
            url: "https://www.youtube.com/watch?v=0WlpALnQdN8",
            favorited: true
        },
        {
            name: "Genius ft. Sia, Diplo, Labrinth",
            artist: "LSD",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/6.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/6.mp3",
            url: "https://www.youtube.com/watch?v=HhoATZ1Imtw",
            favorited: false
        },
        {
            name: "Overdose",
            artist: "Grandson",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/8.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/8.mp3",
            url: "https://www.youtube.com/watch?v=00-Rl3Jlx-o",
            favorited: false
        },
        {
            name: "Rag'n'Bone Man",
            artist: "Human",
            cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/9.jpg",
            source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/9.mp3",
            url: "https://www.youtube.com/watch?v=L3wKzyIN1yk",
            favorited: false
        }
    ];
}

